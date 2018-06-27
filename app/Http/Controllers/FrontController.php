<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Datosganvam;
use App\Models\Marca;
use App\Models\Question;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

              'footer' => $footer

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

        return 'Lo sentimos :(';

      }

    }

    // FUNCIONES DE OBTENCION DE DATOS DE TASACION

    public function getFuells() {

        return response()->json(DB::table('combustibles')->select('id', 'nombre', 'codigo')->get(), 200);

    }

    public function getPlaques() {

        return response()->json(DB::table('matriculaciones')->select('id', 'nombre', 'valor')->get(), 200);

    }

    public function getVersion(Request $request) {

       $data = json_decode($request->input('data'), true);

       //return $data['marca_id'];

       $vesion =  Datosganvam::where('marca', $data['marca'])
            ->where('modelo',$data['modelo'] )
            ->where('anyo', $data['matricula'])
            ->where('anyo', $data['matricula'])
            ->where('combustible', $data['combustible'])
            ->select('id', 'version')->get();

       return response()->json($vesion, 200);

    }

    public function getkms() {

        return response()->json(DB::table('kilometraje')->select('*')->get(), 200);

    }

    // ENVIO DE EMAIL
    public function sendemail(Request $request) {


        return redirect('/home')->with('status', 'Su mensaje nos ha sido enviado, nos podremos en contacto en breve');
    }
}
