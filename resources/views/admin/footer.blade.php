
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar Footer</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Footer</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-border panel-inverse ">
            <div class="panel-heading">
                <h3 class="panel-title">Datos</h3>
            </div>
            <div class="panel-body">
             <div class="row">

                     <div class="col-lg-8">
                         <div class="form-group form-horizontal">
                             <label class="control-label">Copyright</label>
                             <input type="text" class="form-control" v-model="item.copyright">
                         </div>
                     </div>

                 <div class="col-md-8">
                     <label>Imagen de fondo footer estadisticas</label>
                     <div class="thumbnail">
                         <img v-if="item.fcar1" :src="item.fcar1" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="fcar1" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'fcar1')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('fcar1')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-8">
                     <label>Imagen de fondo footer contactos</label>
                     <div class="thumbnail">
                         <img v-if="item.fcar2" :src="item.fcar2" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="fcar2" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'fcar2')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('fcar2')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


            </div>
            <div class="panel-footer">
                <button class="btn btn-success btn-sm" @click="save()">Guardar</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{asset('admin/appjs/footer.js')}}"></script>
@endsection