<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use Carbon\Carbon;
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

       $this->GusClient = new Client(['base_uri' => $this->url, ['headers' => ['User-Agent' => 'Dalvik/2.1.0 (Linux; U; Android 6.0; Ilium L910 Build/MRA58K)']]]);

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



            $response = $this->GusClient->request('get', 'api/blue-bulletin/makes?access_token=' . $this->token);

            $body = $response->getBody();

            $marcasResponse = $body->getContents();

            $marcasJson = json_decode($marcasResponse, true);

            $marcas = collect($marcasJson['content'])->pluck('make');

            foreach ($marcas as $marca) {

                DB::table('01_marcas')->insert(

                    ['marca' => $marca ], ['factor_conversion' => 1, 'imagen' => '']
                );
            }

            return response('Marcas actualizadas', 200);



    }

    // SE OBTIENEN LAS MARCAS DESDE GANVAN Y SE PASAN A DB TABLE MODELOS
    public function getModel () {

        $marcas  = DB::table('01_marcas')->get();

        foreach ($marcas as $marca) {

            $response =  $this->GusClient->request('get', 'api/blue-bulletin/models?make='. $marca->marca .'&access_token='. $this->token);

            $body = $response->getBody();

            $modelosResponse = $body->getContents();

            $modelosJson = json_decode($modelosResponse, true);

            $modelos = collect($modelosJson['content'])->pluck('model');

            foreach ($modelos as $modelo) {

                DB::table('01_modelos')->insert(
                    ['nombre' => $modelo ,'factor' => $marca->factor, 'marca_id' => $marca->id]
                );
            }

        }

        return response('Modelos actualizados', 200);
    }

    // SE OBTIENEN LAS MARCAS DESDE GANVAN Y SE PASAN A DB TABLE MODELOS
    public function gettest () {

        $res = $this->GusClient->request('get', 'api/blue-bulletin/tax-values?year=2016&fuel=G&make=PIAGGIO&model=Porter&access_token=' . $this->token);

        $body = $res->getBody();

        $versionResponse = $body->getContents();

        $versionJson = json_decode($versionResponse, true);

        return response() ->json($versionJson['content'], 200);

        try {


            $horaInit = Carbon::now();

            $marcas  = DB::table('01_marcas')->take(3)->get();

            $matriculas  = DB::table('01_matriculaciones')->get();

            foreach ($marcas as $marca) {

                $modelos  = DB::table('01_modelos')->where('marca_id', $marca->id) ->get();

                foreach ($modelos as $modelo) {

                    $response = $this->GusClient->request('get', 'api/blue-bulletin/fuels?make='. $marca->marca .'&model='. $modelo->nombre. '&access_token='. $this->token);

                    $body = $response->getBody();

                    $fuelResponse = $body->getContents();

                    $fuelJson = json_decode($fuelResponse, true);

                    $fuels = collect($fuelJson['content'])->pluck('com');

                    foreach ($fuels as $fuel) {

                        foreach ($matriculas as $matricula) {

                            $response = $this->GusClient->request('get', 'api/blue-bulletin/tax-values?year='. $matricula->nombre .'&fuel='. $fuel .'&make=' .$marca->marca. '&model='. $modelo->nombre. '&access_token='. $this->token);

                            $body = $response->getBody();

                            $versionResponse = $body->getContents();

                            $versionJson = json_decode($versionResponse, true);


                            if (isset($versionJson['content'])) {

                                foreach ($versionJson['content'] as $version) {

                                    $data = [
                                        'marca' => $marca->marca,
                                        'modelo' => $modelo->nombre,
                                        'version' => $version['version'],
                                        'tasacion' => $version['value'],
                                        'anyo' => $matricula->nombre,
                                        'combustible' => $fuel,
                                        'cilindrada' => $version['cil'],
                                        'cv' => $version['cv'],
                                        'pf' => $version['pf'],
                                        'kw' => $version['kw'],
                                        'tyla_code' => $version['tylacode'],
                                        'numero_puertas' => $version['puertas']
                                    ];

                                    DB::table('01_datos_ganvam')->insert($data);
                                }

                            }

                        }
                    }
                }

            }

            return response('Datos actualizados: Tiempo: ' . $horaInit->diffForHumans() , 200);

        } catch (\Exception $e) {

            return response($e->getMessage() , 200);
        }

    }


    // SE OBTIENEN LAS MARCAS DESDE GANVAN Y SE PASAN A DB TABLE MODELOS
    public function getFuels () {

        $horaInit = Carbon::now();

        $marcas  = DB::table('01_marcas')->get();

        $matriculas  = DB::table('01_matriculaciones')->get();

        foreach ($marcas as $marca) {

            $modelos  = DB::table('01_modelos')->where('marca_id', $marca->id) ->get();

            foreach ($modelos as $modelo) {

                $response = $this->GusClient->request('get', 'api/blue-bulletin/fuels?make='. $marca->marca .'&model='. $modelo->nombre. '&access_token='. $this->token);

                $body = $response->getBody();

                $fuelResponse = $body->getContents();

                $fuelJson = json_decode($fuelResponse, true);

                $fuels = collect($fuelJson['content'])->pluck('com');

                foreach ($fuels as $fuel) {

                      foreach ($matriculas as $matricula) {

                          $response = $this->GusClient->request('get', 'api/blue-bulletin/tax-values?year='. $matricula->nombre .'&fuel='. $fuel .'&make=' .$marca->marca. '&model='. $modelo->nombre. '&access_token='. $this->token);

                          $body = $response->getBody();

                          $versionResponse = $body->getContents();

                          $versionJson = json_decode($versionResponse, true);


                          if (isset($versionJson['content'])) {

                              foreach ($versionJson['content'] as $version) {

                                  $data = [
                                      'marca' => $marca->marca,
                                      'modelo' => $modelo->nombre,
                                      'version' => $version['version'],
                                      'tasacion' => $version['value'],
                                      'anyo' => $matricula->nombre,
                                      'combustible' => $fuel,
                                      'cilindrada' => $version['cil'],
                                      'cv' => $version['cv'],
                                      'pf' => $version['pf'],
                                      'kw' => $version['kw'],
                                      'tyla_code' => $version['tylacode'],
                                      'numero_puertas' => $version['puertas']
                                  ];

                                 DB::table('01_datos_ganvam')->insert($data);
                              }

                          }

                      }
                }
            }

        }

        return response('Datos actualizados: Tiempo: ' . $horaInit->diffForHumans() , 200);
    }
}
