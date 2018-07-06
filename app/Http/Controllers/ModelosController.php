<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelosController extends Controller
{

    public function index () {

        return view('admin.modelos');

    }

    public function getModels($id) {

        return response()->json(Modelo::select('id', 'nombre')->where('marca_id', $id)->get(), 200);

    }

    public function getlist(Request $request) {

        try {

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);

            $datos = DB::table('modelos')->leftjoin('marcas', 'modelos.marca_id', 'marcas.id');

            if ( $filters['nombre'] !== '') $datos->where('nombre', 'LIKE', '%'.$filters['nombre'].'%');

            $datos = $datos->orderby('marca_id', 'asc');

            $total = $datos->select('modelos.id', 'modelos.marca_id', 'modelos.nombre', 'modelos.factor', 'marcas.marca as marca' )->count();

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



    public function store(Request $request){

        $item = new Modelo();

        $item->nombre = $request->input('nombre');

        $item->factor = $request->input('factor');

        $item->save();

        return response()->json(['msj' => 'Datos almacenados con exitos', 'id' => $item->id], 200);

    }


    public function update(Request $request, $id){

        $item = Modelo::find($id);

        $item->nombre = $request->input('nombre');

        $item->factor = $request->input('factor');

        $item->save();

        return response()->json('Datos actualizados con exitos', 200);

    }

    public function destroy($id) {

        Modelo::destroy($id);

        return response()->json('Datos eliminados con exitos', 200);

    }


}
