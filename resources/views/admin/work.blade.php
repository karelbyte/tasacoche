
@extends('admin.layout')

@section('style')

@endsection

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar Cómo funciona?</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Cómo funciona?</a>
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
                          <label class="control-label">Titulo general</label>
                          <input type="text" class="form-control" v-model="item.title">
                      </div>
                  </div>
              </div>
             <div class="row">


                 <div class="col-lg-12">
                     <label>Paso 1</label>
                         <div class="form-group form-horizontal">
                             <label class="control-label">Leyenda 1</label>
                             <input type="text" class="form-control" v-model="item.wstept1">
                         </div>
                     <div class="thumbnail">

                         <img :src="item.wimg1" class="img-responsive" width="150">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="wimg1" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'wimg1')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('wimg1')"><i class="fa fa-search"></i> Buscar imagen..</button>
                                </span>
                             </div>
                         </div>

                         <quill-editor v-model="item.wstep1" ref="quillEditorA"  :options="editorOption" ></quill-editor>
                         </div>
                     </div>

                 <div class="col-lg-12">
                     <label>Paso 2</label>
                     <div class="form-group form-horizontal">
                         <label class="control-label">Leyenda 2</label>
                         <input type="text" class="form-control" v-model="item.wstept2">
                     </div>
                     <div class="thumbnail">

                         <img :src="item.wimg2" class="img-responsive" width="150">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="wimg2" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'wimg2')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('wimg2')"><i class="fa fa-search"></i> Buscar imagen..</button>
                                </span>
                             </div>
                         </div>

                         <quill-editor v-model="item.wstep2" ref="quillEditorA"  :options="editorOption" ></quill-editor>
                     </div>
                 </div>

                 <div class="col-lg-12">
                     <label>Paso 3</label>
                     <div class="form-group form-horizontal">
                         <label class="control-label">Leyenda 3</label>
                         <input type="text" class="form-control" v-model="item.wstept3">
                     </div>
                     <div class="thumbnail">

                         <img :src="item.wimg3" class="img-responsive" width="150">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="wimg3" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'wimg3')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('wimg3')"><i class="fa fa-search"></i> Buscar imagen..</button>
                                </span>
                             </div>
                         </div>

                         <quill-editor v-model="item.wstep3" ref="quillEditorA"  :options="editorOption" ></quill-editor>
                     </div>
                 </div>


                 <div class="col-lg-12">
                     <label>Paso 4</label>
                     <div class="form-group form-horizontal">
                         <label class="control-label">Leyenda 4</label>
                         <input type="text" class="form-control" v-model="item.wstept4">
                     </div>
                     <div class="thumbnail">

                         <img :src="item.wimg4" class="img-responsive" width="150">
                         <div class="caption">
                             <div class="input-group m-t-10 form-group-sm">
                                 <input type="file" name="file" id="wimg4" class="form-control" style="display: none" accept="image/*" @change="getfile($event, 'wimg4')">
                                 <span class="input-group-btn">
                                <button type="button" class="btn waves-effect waves-light btn-inverse btn-sm" @click="find('wimg4')"><i class="fa fa-search"></i> Buscar imagen..</button>
                                </span>
                             </div>
                         </div>

                         <quill-editor v-model="item.wstep4" ref="quillEditorA"  :options="editorOption" ></quill-editor>
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
    <script src="{{asset('admin/appjs/work.js')}}"></script>
@endsection