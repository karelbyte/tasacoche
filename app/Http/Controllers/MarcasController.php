<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{

  public function index () {

    return view('admin.marcas');

  }

    public function getlist(Request $request) {

        try {

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);

            $datos = DB::table('marcas');

            if ( $filters['nombre'] !== '') $datos->where('nombre', 'LIKE', '%'.$filters['nombre'].'%');

            $datos = $datos->orderby('nombre', 'asc');

            $total = $datos->select('*')->count();

            $list =  $datos->skip($skip)->take($request['take'])->get();

            $result = [

                'total' => $total,

                'list' =>  $list,

            ];

            return response()->json($result, 200);

        } catch (\Exception $e) {

            return response()->json('A ocurrido un error al obtener los datos!', 500);
        }

    }

    public function getData ()
    {

        $token = "MzM1MjE1YmRmMDZlNTVjNDE2YzlhZTY0NTJhZjI2NmJkZjhhZTM0MTBmNzNjMGQ4NzU2OTIzZWU4NzQ3NjAxYQ";

        $url = "http://app.ganvam.es";

        $client = new Client(['base_uri' => $url, ['headers' => ['User-Agent' => 'Dalvik/2.1.0 (Linux; U; Android 6.0; XT1068 Build/MPB24.65-34)']]]);

        $marcas = [];

        try {

            $response = $client->request('get', 'api/blue-bulletin/makes?access_token=' . $token);

            $body = $response->getBody();

            $marcasResponse = $body->getContents();

            $marcasJson = json_decode($marcasResponse, true);

            $marcas = collect($marcasJson['content'])->pluck('make');

            foreach ($marcas as $marca) {

                Marca::firstOrCreate(
                    ['nombre' => $marca ], ['factor_conversion' => 1, 'imagen' => '']
                );
            }

            return response('Datos actualizados', 200);


        } catch (\Exception $e) {

            return response('A ocurrido un error!', 500);

        }
    }


    public function store(Request $request){

        $item = new Marca();

        $item->nombre = $request->input('nombre');

        $item->factor = $request->input('factor_conversion');

        $item->save();

        return response()->json(['msj' => 'Datos almacenados con exitos', 'id' => $item->id], 200);

    }


    public function update(Request $request, $id){

        $item = Marca::find($id);

        $item->nombre = $request->input('nombre');

        $item->factor_conversion = $request->input('factor_conversion');

        $item->save();

        return response()->json('Datos actualizados con exitos', 200);

    }

    public function destroy($id) {

        Marca::destroy($id);

        return response()->json('Datos eliminados con exitos', 200);

    }

    public function saveImg (Request $request) {

        if ($request->has('imagen')) {

            $request->imagen->storeAs('public/makes', 'imagen' .  $request->input('id') .  '.' . $request->imagen->extension());

            Marca::where('id', $request->input('id'))->update(['imagen' => '/storage/makes/'. 'imagen' .  $request->input('id') . '.'  . $request->imagen->extension()]);

        }

  }

}
