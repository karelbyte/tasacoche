
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar api GANVAM</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">Ganvam</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <a href="https://www.ganvam.es/">www.ganvam.es</a>

    <div class="row" style="margin-top: 20px">
        <div class="col-lg-8">
        <div class="panel panel-border panel-inverse">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Url</label>
                    <input type="text" class="form-control" v-model="item.url">
                </div>
                <div class="form-group">
                    <label>Token</label>
                    <input type="text" class="form-control" v-model="item.token">
                </div>
                <button  class="btn btn-inverse" @click="save()">Guadar</button>

            </div>
        </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-border panel-inverse">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <p style="margin-bottom: 10px"> Comprobar url y token </p>
                    <button class="btn btn-brown" @click="testgan()"><i class="fa fa-wifi" ></i> Conectar</button>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
        <div class="panel panel-border panel-inverse">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <p style="margin-bottom: 10px"> Sicroniza los datos de Ganvam con la app, tenga en cuenta que este proceso puede tardar! </p>
                <button class="btn btn-danger" @click="getdata('getmake', 'make')"><i v-if="make" class="fa fa-spinner fa-spin" ></i> Marcas</button>
                <button class="btn btn-teal" @click="getdata('getmodel', 'models')"><i v-if="models" class="fa fa-spinner fa-spin" ></i> Modelos</button>
                <button class="btn btn-primary" @click="getdata('gettax', 'tax')"><i v-if="tax" class="fa fa-spinner fa-spin" ></i> Tasaciones</button>
            </div>
        </div>
@endsection

@section('script')
    @parent
    <script src="{{asset('admin/appjs/ganvam.js')}}"></script>
@endsection
