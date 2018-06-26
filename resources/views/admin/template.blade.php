
@extends('admin.layout')

@section('style')

@endsection

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar plantillas</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Plantillas</a>
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
                  <div class="row" style="padding: 20px 0 20px 0; border-bottom: 1px solid grey">
                      <div class="col-sm-2" style="padding: 50px 0 0 50px">
                          <div class="radio radio-primary">
                              <input type="radio" name="radio" id="radio1" value="1" v-model="item.settemplate">
                              <label for="radio1">
                                  Orion
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <img src="{{asset('/admin/appimages/orion.jpg')}}" class="img-responsive" style="width: 150px; height: 120px">
                      </div>
                  </div>
                  <div class="row" style="padding: 20px 0 20px 0; border-bottom: 1px solid grey">
                      <div class="col-sm-2" style="padding: 20px 0 0 50px">
                          <div class="radio radio-primary">
                              <input type="radio" name="radio" id="radio2" value="2" v-model="item.settemplate" >
                              <label for="radio2">
                                  Mirto
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <img src="{{asset('/admin/appimages/mirto.jpg')}}" class="img-responsive" style="width: 150px; height: 120px">
                      </div>
                  </div>
                  <div class="row" style="padding: 20px 0 20px 0; border-bottom: 1px solid grey">
                      <div class="col-sm-2" style="padding: 20px 0 0 50px">
                          <div class="radio radio-primary">
                              <input type="radio" name="radio" id="radio3" value="3" v-model="item.settemplate">
                              <label for="radio3">
                                  Paper
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <img src="{{asset('/admin/appimages/paper.jpg')}}" class="img-responsive" style="width: 150px; height: 120px">
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
    <script src="{{asset('admin/appjs/template.js')}}"></script>
@endsection