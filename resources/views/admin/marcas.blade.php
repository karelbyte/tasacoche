
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="fa fa-users"></i> Modulo Marcas</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Admin</a>
                    </li>
                    <li>
                        <a href="#">Marcas</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div v-if="unlookview" class="row">
        <div class="col-lg-7">
            <div class="panel panel-border Panel Inverse">
                <div class="panel-heading">
                    <h3 class="panel-title"><span v-html="title"></span></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" v-model="item.nombre" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Factor de conversion</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" v-model="item.factor_conversion" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Logo</label>
                            <div class="col-sm-9">
                                <div class="thumbnail">
                                    <img :src="item.imagen" class="img-responsive" style="width: 150px">
                                    <div class="caption">
                                        <div class="input-group m-t-10 form-group-sm">
                                            <input type="file" name="file" id="logo" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'imagen')">
                                            <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('logo')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success btn-sm" @click="save()">Guardar</button>
                    <button class="btn btn-default btn-sm" @click="close()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div v-if="!unlookview" class="row">
        <button class="btn btn-custom btn-inverse btn-sm" @click="add()">Nuevo</button>
        <!--<button class="btn btn-custom btn-bordered btn-sm" @click="getGAN()"><i v-if="gan" class="fa fa-spinner fa-spin"></i> GANVAM</button> -->
        <div class="panel panel-border panel-inverse" style="margin-top: 5px">
            <!-- Default panel contents -->
            <div class="panel-heading">
            </div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="fixcellheader">Nombre</th>
                    <th class="fixcellheader">Factor</th>
                    <th class="fixcellheader">Logo</th>
                    <th class="fixcellheader"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="entity in lists" :key="entity.id" style="cursor: pointer">
                    <td style="padding: 25px 0 10px 15px">@{{entity.nombre}}</td>
                    <td style="padding: 25px 0 10px 15px">@{{entity.factor_conversion}}</td>
                    <td><img :src="getimg(entity.imagen)" alt="No Logo" style="width: 50px; height: 50px"></td>
                    <td>
                        <button class="btn btn-teal btn-sm" @click="edit(entity)"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" @click="showdelete(entity)"><i class="fa fa-eraser"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="panel-footer" style="padding: 2px 0 0 10px">
                <paginator :tpage="totalpage" :pager="pager" v-on:getresult="getlist"></paginator>
            </div>
        </div>
    </div>

    <div id="modaldelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0 b-0">
                <div class="panel panel-border panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Eliminar</h3>
                    </div>
                    <div class="panel-body">
                        <p>Elemento: <samp class="txtblack">@{{item.nombre}}</samp> </p>
                        <p>Cuidado! Esta acción es irreversible. Desea proceder?</p>
                    </div>
                    <div class="panel-footer text-right">
                        <button @click="delitem()" class="btn btn-danger btn-sm">SI</button>
                        <a href="#" data-dismiss="modal" class="btn btn-default  btn-sm">No</a>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection


@section('script')
 @parent
 <script src="{{asset('admin/appjs/make.js')}}"></script>
@endsection
