<?php

namespace App\Http\Controllers;

use App\Mail\EnvioCita;
use App\Models\Cita;
use App\Models\Cms;
use App\Models\Datosganvam;
use App\Models\Marca;
use App\Models\Question;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{

    public function index() {

      try {

          // $plantilla = Template::ObtienePlantilla()->first();

          $plantilla = Cms::where('llave', 'settemplate')->first();

          // Header datos
          $headerLlaves = (Cms::tipo('header', 'llave')->get())->pluck('llave');

          $headerValues = (Cms::tipo('header', 'valor')->get())->pluck('valor');

          $header  =  $headerLlaves->combine($headerValues);

          // Work datos
          $workLlaves = (Cms::tipo('work', 'llave')->get())->pluck('llave');

          $workValues = (Cms::tipo('work', 'valor')->get())->pluck('valor');

          $work = $workLlaves->combine($workValues);


          // Questions datos
          $questLlaves = (Cms::tipo('quest', 'llave')->get())->pluck('llave');

          $questValues = (Cms::tipo('quest', 'valor')->get())->pluck('valor');

          $quest = $questLlaves->combine($questValues);

          $questions = Question::with(['quests'])->get();


          // Contacto

          $contacLlaves = (Cms::tipo('contac', 'llave')->get())->pluck('llave');

          $contacValues = (Cms::tipo('contac', 'valor')->get())->pluck('valor');

          $contac = $contacLlaves->combine($contacValues);


          // Footer

          $footerLlaves = (Cms::tipo('footer', 'llave')->get())->pluck('llave');

          $footerValues = (Cms::tipo('footer', 'valor')->get())->pluck('valor');

          $footer = $footerLlaves->combine($footerValues);



          $data = [

              'header' => $header,

              'work' => $work,

              'quest' => $quest,

              'questions' => $questions,

              'contac' => $contac,

              'footer' => $footer,

              //'marcas' => Marca::select('id', 'nombre', 'imagen')->get()

          ];


          switch ($plantilla->valor) {

              case 1:

                  $data['numero'] = 1;

                  $show = view('front.template1.template', $data);

                  break;

              case 2:

                  $data['numero'] = 3;

                  $show = view('front.template2.template', $data);

                  break;
          }

          return $show->render();

      } catch (\Exception $exception)

      {

        return $exception->getMessage();

      }

    }

    // FUNCIONES DE OBTENCION DE DATOS DE TASACION

    public function getFuells($model) {

        $fuelCode = DB::table('datos_ganvam')->select(DB::raw('distinct combustible'))->where('modelo', $model)->get();

        $fuel = [];


        foreach ($fuelCode as $fue) {

          array_push($fuel, DB::table('combustibles')->select('*')->where('codigo', $fue->combustible)->first());

        }
        return response()->json( $fuel , 200);

    }

    public function getPlaques($model, $com) {

        $an = DB::table('datos_ganvam')->select(DB::raw('distinct anyo'))->where('modelo', $model)->where('combustible', $com)->orderby('anyo', 'asc')->get();

        return response()->json($an, 200);

    }

    public function getVersion(Request $request) {

       $data = json_decode($request->input('data'), true);


        $vesion = DB::table('datos_ganvam')
            ->where('marca',$data['marca'] )
            ->where('modelo', $data['modelo'])
            ->where('combustible', $data['combustible'])
            ->select('id', 'version')->get();

       return response()->json($vesion, 200);

    }

    public function getkms() {

        return response()->json(DB::table('kilometraje')->select('*')->orderby('id', 'asc')->get(), 200);

    }


    public function getTasa(Request $request) {

        $data = json_decode($request->input('data'), true);

        $tasa = DB::table('datos_ganvam')->select('*')
            ->where('id', $data['version'] )
            ->select('tasacion')->first();

        if ( empty($tasa) ) {    return response()->json('No existe una tasa', 500);}

        return response()->json($tasa->tasacion, 200);

    }


    public  function  cita_confirm ($token) {

        $cita = Cita::where('token', $token)->select('*')->first();

        $cita->status_id =  2;

        $cita->save();

        $nombres  = $cita->nombres;

        $url = url('/'); //$_SERVER['SERVER_NAME'];

        return view('front.cita', compact('nombres', 'url'));
    }


    public function setCita(Request $request) {

       // $data = json_decode($request->input('data'), true);

        $data = $request->all();

        $data['token'] = base64_encode(random_bytes(10));

        Cita::create($data);

        $data['url'] = $request->root() . '/cita_confirm/' . $data['token'] ;


        Mail::to($request->input('email'))->send(new EnvioCita($data));

        return response()->json('Cita agendada, lo esparamos!', 200);

    }

    // ENVIO DE EMAIL
    public function sendemail(Request $request) {


        return redirect('/home')->with('status', 'Su mensaje nos ha sido enviado, nos podremos en contacto en breve');
    }
}
