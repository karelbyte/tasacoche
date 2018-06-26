<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Quest;
use App\Models\Question;
use Illuminate\Http\Request;

class CmsController extends Controller
{

    //PLANTILLAS

    public function getTemplateOptions() {

        $llaves = (Cms::tipo('template', 'llave')->get())->pluck('llave');

        $values = (Cms::tipo('template', 'valor')->get())->pluck('valor');

        $options = $llaves->combine($values);

        return response()->json($options->all(), 200);
    }

    public function saveTemplateOptions (Request $request) {

        foreach ($request->input('options') as $key => $value) {

            Cms::where('llave', $key )->update(['valor' => $value]);
        }

        return response()->json('Datos guardados correctamente!', 200);
    }



    // Headers
   public function getHeadersOptions() {

      $llaves = (Cms::tipo('header', 'llave')->get())->pluck('llave');

      $values = (Cms::tipo('header', 'valor')->get())->pluck('valor');

      $options = $llaves->combine($values);

      return response()->json($options->all(), 200);
   }

   public function saveHeadersOptions (Request $request) {

     foreach ($request->input('options') as $key => $value) {

         Cms::where('llave', $key )->update(['valor' => $value]);
     }

       return response()->json('Datos guardados correctamente!', 200);
   }

    public function saveHeadersImg (Request $request) {

        if ($request->has('logo')) {

               $request->logo->storeAs('public/img', 'logo.' . $request->logo->extension());

               Cms::where('llave', 'logo')->update(['valor' => '/storage/img/logo.' . $request->logo->extension()]);
        }

        if ($request->has('cimg1')) {

              $request->cimg1->storeAs('public/img', 'cimg1.' . $request->cimg1->extension());

               Cms::where('llave', 'cimg1')->update(['valor' => '/storage/img/cimg1.'.$request->cimg1->extension()]);

          }

        if ($request->has('cimg2')) {

                $request->cimg2->storeAs('public/img', 'cimg2.' . $request->cimg2->extension());

                Cms::where('llave', 'cimg2')->update(['valor' => '/storage/img/cimg2.'.$request->cimg2->extension()]);

         }

        if ($request->has('cimg3')) {

            $request->cimg3->storeAs('public/img', 'cimg3.' . $request->cimg3->extension());

            Cms::where('llave', 'cimg3')->update(['valor' => '/storage/img/cimg3.'.$request->cimg3->extension()]);

        }


        if ($request->has('cimg4')) {

            $request->cimg4->storeAs('public/img', 'cimg4.' . $request->cimg4->extension());

            Cms::where('llave', 'cimg4')->update(['valor' => '/storage/img/cimg4.'.$request->cimg4->extension()]);

        }

    }

    // Como funciona

    public function getWorkOptions() {

        $llaves = (Cms::tipo('work', 'llave')->get())->pluck('llave');

        $values = (Cms::tipo('work', 'valor')->get())->pluck('valor');

        $options = $llaves->combine($values);

        return response()->json($options->all(), 200);
    }

    public function saveWorkOptions (Request $request) {

        foreach ($request->input('options') as $key => $value) {

            Cms::where('llave', $key )->update(['valor' => $value]);
        }

        return response()->json('Datos guardados correctamente!', 200);
    }

    public function saveWorkImg (Request $request) {


        if ($request->has('wimg1')) {

            $request->wimg1->storeAs('public/img', 'wimg1.' . $request->wimg1->extension());

            Cms::where('llave', 'wimg1')->update(['valor' => '/storage/img/wimg1.'.$request->wimg1->extension()]);

        }

        if ($request->has('wimg2')) {

            $request->wimg2->storeAs('public/img', 'wimg2.' . $request->wimg2->extension());

            Cms::where('llave', 'wimg2')->update(['valor' => '/storage/img/wimg2.'.$request->wimg2->extension()]);

        }

        if ($request->has('wimg3')) {

            $request->wimg3->storeAs('public/img', 'wimg3.' . $request->wimg3->extension());

            Cms::where('llave', 'wimg3')->update(['valor' => '/storage/img/wimg3.'.$request->wimg3->extension()]);

        }

        if ($request->has('wimg4')) {

            $request->wimg4->storeAs('public/img', 'wimg4.' . $request->wimg4->extension());

            Cms::where('llave', 'wimg4')->update(['valor' => '/storage/img/wimg4.'.$request->wimg4->extension()]);

        }

    }

    // Preguntas frecuentes

    public function getQuestionsOptions() {

        $llaves = (Cms::tipo('quest', 'llave')->get())->pluck('llave');

        $values = (Cms::tipo('quest', 'valor')->get())->pluck('valor');

        $options = $llaves->combine($values);

        $data = [

            'options' => $options,

            'questions' => Question::with(['quests'])->get()
        ];

        return response()->json($data , 200);
    }

    public function saveQuestionsOptions (Request $request) {

        Question::truncate();

        Quest::truncate();

        $groups = $request->input('groups');

        foreach ($request->input('options') as $key => $value) {

            Cms::where('llave', $key )->update(['valor' => $value]);
        }

        foreach ($groups as $group) {

          $idgroup = (Question::create(['title' => $group['title']]))->id;

            foreach ($group['quests'] as $quest) {

                Quest::create(['question_id' => $idgroup, 'question' => $quest['question'], 'descrip' => $quest['descrip']]);
            }

        }

        return response()->json('Datos guardados correctamente!', 200);
    }


    // Como funciona

    public function getContacOptions() {

        $llaves = (Cms::tipo('contac', 'llave')->get())->pluck('llave');

        $values = (Cms::tipo('contac', 'valor')->get())->pluck('valor');

        $options = $llaves->combine($values);

        return response()->json($options->all(), 200);
    }

    public function saveContacOptions (Request $request) {

        foreach ($request->input('options') as $key => $value) {

            Cms::where('llave', $key )->update(['valor' => $value]);
        }

        return response()->json('Datos guardados correctamente!', 200);
    }


    // FOOTER
    //
    public function getFooterOptions() {

        $llaves = (Cms::tipo('footer', 'llave')->get())->pluck('llave');

        $values = (Cms::tipo('footer', 'valor')->get())->pluck('valor');

        $options = $llaves->combine($values);

        return response()->json($options->all(), 200);
    }

    public function saveFooterOptions (Request $request) {

        foreach ($request->input('options') as $key => $value) {

            Cms::where('llave', $key )->update(['valor' => $value]);
        }

        return response()->json('Datos guardados correctamente!', 200);
    }

    public function saveFooterImg (Request $request) {


        if ($request->has('fcar1')) {

            $request->fcar1->storeAs('public/img', 'fcar1.' . $request->fcar1->extension());

            Cms::where('llave', 'fcar1')->update(['valor' => '/storage/img/fcar1.'.$request->fcar1->extension()]);

        }

        if ($request->has('fcar2')) {

            $request->fcar2->storeAs('public/img', 'fcar2.' . $request->fcar2->extension());

            Cms::where('llave', 'fcar2')->update(['valor' => '/storage/img/fcar2.'.$request->fcar2->extension()]);

        }




    }
}
