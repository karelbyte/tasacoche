<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function getData () {

        $token = "MzM1MjE1YmRmMDZlNTVjNDE2YzlhZTY0NTJhZjI2NmJkZjhhZTM0MTBmNzNjMGQ4NzU2OTIzZWU4NzQ3NjAxYQ";

        $url = "http://app.ganvam.es";

        $client = new Client(['base_uri' => $url, [ 'headers' => ['User-Agent' => 'Dalvik/2.1.0 (Linux; U; Android 6.0; XT1068 Build/MPB24.65-34)']]]);

        $marcas = [];

        $modelosall = [];

        try {

            $response = $client->request('get', 'api/blue-bulletin/makes?access_token=' . $token);

            $body = $response->getBody();

            $marcasResponse = $body->getContents();

            $marcasJson = json_decode($marcasResponse,true);

            $marcas = collect($marcasJson['content'])->pluck('make');


            foreach ($marcas as $marca) {

                $response = $client->request('GET', 'api/blue-bulletin/models?make=' . $marca . '&access_token=' . $token);

                $body = $response->getBody();

                $modelosResponse = $body->getContents();

                $modelosJson = json_decode($modelosResponse, true);

                $modelos = collect($modelosJson['content'])->pluck('model');

                array_push($modelosall, $modelos);

            }

            return $modelosall;

        } catch (\Exception $e) {

            return $e;

        }


   }

}
