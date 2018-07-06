<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CitasController extends Controller
{
    public function getlist(Request $request) {

       /* try { */

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);

            $datos = DB::table('citas')->leftJoin('cita_status', 'citas.status_id', 'cita_status.id');

            if ( $filters['nombres'] !== '') $datos->where('nombres', 'LIKE', '%'.$filters['nombres'].'%');

            $datos = $datos->orderby('fecha', 'desc');

            $total = $datos-> select('citas.*', 'cita_status.status as estado')->count(); // select('users.id', 'users.name', 'users.email', 'status_id', 'users_status.status')->count();

            $list =  $datos->skip($skip)->take($request['take'])->get();

            $result = [

                'total' => $total,

                'list' =>  $list,

            ];

            return response()->json($result, 200);

       /* } catch (\Exception $e) {

            return response()->json('A ocurrido un error al obtener los datos!', 500);
        }*/

    }

    public function store(Request $request){

        $item = new User();

        $item->name = $request->input('name');

        $item->email = $request->input('email');

        $item->password = Hash::make($request->input('password'));

        $item->status_id = $request->input('status_id');

        $item->save();

        return response()->json('Datos almacenados con exitos', 200);

    }

    public function update(Request $request, $id){

        $item = User::find($id);

        $item->name = $request->input('name');

        $item->email = $request->input('email');

        $item->password = Hash::make($request->input('password'));

        $item->status_id = $request->input('status_id');

        $item->save();

        return response()->json('Datos actualizados con exitos', 200);

    }

    public function destroy($id) {

        Cita::destroy($id);

        return response()->json('Datos eliminados con exitos', 200);

    }

    public function index () {

        return view('admin.citas');

    }
}
