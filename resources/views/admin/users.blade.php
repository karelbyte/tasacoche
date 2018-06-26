
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="fa fa-users"></i> Modulo Usuarios</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">Usuarios</a>
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
                    <h3 class="panel-title">@{{title}}</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" v-model="item.name" placeholder="...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" v-model="item.email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" v-model="item.password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4" class="col-sm-3 control-label">Re Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" v-model="repassword" placeholder="Retype Password">
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox checkbox-primary">
                                <input v-model="item.status_id" type="checkbox">
                                <label for="checkbox2">
                                    Activo
                                </label>
                            </div>
                        </div>
                </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <button v-if="item.password === repassword" class="btn btn-success btn-sm" @click="save()">Guardar</button>
                    <button class="btn btn-default btn-sm" @click="close()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div v-if="!unlookview" class="row">
        <button class="btn btn-custom btn-inverse btn-sm" @click="add()">Nuevo</button>
        <div class="panel panel-border panel-inverse" style="margin-top: 5px">
            <!-- Default panel contents -->
            <div class="panel-heading">
            </div>

            <!-- Table -->
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="fixcellheader">Nombres</th>
                    <th class="fixcellheader">Email</th>
                    <th class="fixcellheader">Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="entity in lists" :key="entity.id">
                    <td class="fixcell">@{{entity.name}}</td>
                    <td class="fixcell">@{{entity.email}}</td>
                    <td class="fixcell">@{{entity.status}}</td>
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
                        <p>Elemento: <samp class="txtblack">@{{item.name}}</samp> </p>
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
 <script src="{{asset('admin/appjs/users.js')}}"></script>
@endsection
