<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GanvamController extends Controller
{
    var $url;

    var $token;

    var $GusClient;

    public function __construct()
    {
       $data = DB::table('ganvam')->first();

       $this->url = $data->url;

       $this->token = $data->token;

       $this->GusClient = new Client(['base_uri' => $this->url, ['headers' => ['User-Agent' => 'Dalvik/2.1.0 (Linux; U; Android 6.0; XT1068 Build/MPB24.65-34)']]]);

    }

    public function store(Request $request) {

      DB::table('ganvam')->update(['url' => $request->input('url'), 'token' => $request->input('token')]);

       return response()->json('Datos actualizados!', 200);
    }

    public function index () {

        return view('admin.ganvam');

    }

    public function getdata () {

        return response()->json(DB::table('ganvam')->first(), 200);
    }

    public function testgan () {

        try {

            $data = $this->GusClient->request('get', 'api/blue-bulletin/makes?access_token=' . $this->token);

            return response(200);

        } catch (\Exception $e ) {

            return response($e->getMessage(), 500);
        }

    }

    // SE OBTIENEN LAS MARCAS DESDE GANVAN Y SE PASAN A DB TABLE MARCA
    public function getmake () {

        try {

            $response = $this->GusClient->request('get', 'api/blue-bulletin/makes?access_token=' . $this->token);

            $body = $response->getBody();

            $marcasResponse = $body->getContents();

            $marcasJson = json_decode($marcasResponse, true);

            $marcas = collect($marcasJson['content'])->pluck('make');

            foreach ($marcas as $marca) {

                Marca::firstOrCreate(

                    ['nombre' => $marca ], ['factor_conversion' => 1, 'imagen' => '']
                );
            }

            return response('Marcas actualizadas', 200);


        } catch (\Exception $e) {

            return response('A ocurrido un error!', 500);

        }

    }

    // SE OBTIENEN LAS MARCAS DESDE GANVAN Y SE PASAN A DB TABLE MODELOS
    public function getModel () {

        $marcas  = Marca::all();

        foreach ($marcas as $marca) {

            $response =  $this->GusClient->request('get', 'api/blue-bulletin/models?make='. $marca->nombre .'&access_token='. $this->token);

            $body = $response->getBody();

            $modelosResponse = $body->getContents();

            $modelosJson = json_decode($modelosResponse, true);

            $modelos = collect($modelosJson['content'])->pluck('model');

            foreach ($modelos as $modelo) {

               Modelo::firstOrCreate(
                    ['nombre' => $modelo ], ['factor_conversion' => $marca->factor_conversion, 'marca_id' => $marca->id]
                );
            }

        }

        return response('Modelos actualizados', 200);

    }
}
