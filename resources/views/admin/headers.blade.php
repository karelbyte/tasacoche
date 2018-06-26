
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar Headers</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Headers</a>
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
                          <label class="control-label">Nombre de la web</label>
                          <input type="text" class="form-control" v-model="item.appName">
                      </div>
                  </div>
              </div>
             <div class="row">
                 <div class="col-md-5">
                     <label>Logo de la app</label>
                     <div class="thumbnail">
                         <img v-if="item.logo" :src="item.logo" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="logo" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'logo')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('logo')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row"><div class="col-md-5">  <h5>Imagenes del carrusel</h5></div></div>
             <div class="row">

                 <div class="col-md-12">
                     <label>Imagen 1</label>
                     <div class="thumbnail">

                         <img :src="item.cimg1" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="cimg1" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'cimg1')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('cimg1')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-12">
                     <label>Imagen 2</label>
                     <div class="thumbnail">

                         <img :src="item.cimg2" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="cimg2" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'cimg2')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('cimg2')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-12">
                     <label>Imagen 3</label>
                     <div class="thumbnail">

                         <img :src="item.cimg3" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="cimg3" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'cimg3')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('cimg3')"><i class="fa fa-search"></i> Buscar..</button>
                                </span>
                             </div>
                         </div>
                     </div>
                 </div>


                 <div class="col-md-12">
                     <label>Imagen 4</label>
                     <div class="thumbnail">

                         <img :src="item.cimg4" class="img-responsive">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="cimg4" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'cimg4')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('cimg4')"><i class="fa fa-search"></i> Buscar..</button>
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
    <script src="{{asset('admin/appjs/headers.js')}}"></script>
@endsection