
@extends('admin.layout')

@section('style')

@endsection

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar contacto</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
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
                                  <label class="control-label">Titulo de contacto</label>
                                  <input type="text" class="form-control" v-model="item.ctitle">
                              </div>
                          </div>
                      </div>

                  <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">
                              <label class="control-label">Direccion</label>
                              <input type="email" class="form-control" v-model="item.caddress">
                          </div>
                      </div>
                  </div>

                   <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">
                              <label class="control-label">email</label>
                              <input type="email" class="form-control" v-model="item.cemail">
                          </div>
                      </div>
                   </div>

                  <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">
                              <label class="control-label">Telef</label>
                              <input type="tel" class="form-control" v-model="item.ctel">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">
                              <label class="control-label">Horario</label>
                              <input type="text" class="form-control" v-model="item.chours">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">
                              <label class="control-label">Aviso legal</label>
                              <quill-editor v-model="item.clegal" ref="quillEditorA"  :options="editorOption" ></quill-editor>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-8">
                          <div class="form-group form-horizontal">

                              <div class="panel panel-default">
                                  <div class="panel-heading">Ubicación</div>
                                  <div class="panel-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1" >Latitud</label>
                                          <input type="text" class="form-control" v-model="item.clat" >
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Logitud</label>
                                          <input type=text class="form-control" v-model="item.clong">
                                      </div>

                                  </div>
                              </div>
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
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <!-- Quill JS Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue-quill-editor@3.0.4/dist/vue-quill-editor.js"></script>
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.4/quill.core.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">
    <script src="{{asset('admin/appjs/contac.js')}}"></script>
@endsection