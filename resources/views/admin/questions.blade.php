
@extends('admin.layout')

@section('style')
    
@endsection

@section('content')
    @parent
    <div class="row">  <!--  ESTO ES PROFUNDIDAD -->
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Configurar Preguntas frecuentes</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#">CMS</a>
                    </li>
                    <li>
                        <a href="#">Preguntas frecuentes</a>
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
              <hr>
             <div class="row">
                 <div class="col-lg-12">
                  <button class="btn btn-primary" @click="add()" >Nuevo Grupo</button>
                 </div>
             </div>
             <div v-if="groups.length > 0" class="row" v-for="group in groups">
                 <hr>
                 <div class="col-lg-12">
                   <button class="btn btn-inverse btn-sm" @click="del(group)">Eliminar Grupo</button>
                 </div>
                 <div class="col-lg-12">
                     <div class="form-group form-horizontal">
                         <label class="control-label">Grupo</label>
                         <div class="input-group">
                             <input type="text" class="form-control" v-model="group.title">
                             <span class="input-group-btn">
                              <button class="btn btn-info" @click="newquest(group)">Nueva Pregunta</button></span>
                         </div>
                     </div>

                     <div v-if="group.quests.length > 0" class="row" v-for="quest in group.quests">
                         <div class="col-lg-12">
                             <label for="">Pregunta</label>
                             <div class="input-group input-group-sm" style="padding-bottom: 10px">
                                 <input type="text" class="form-control" v-model="quest.question" >
                                 <span class="input-group-btn">
                                 <button class="btn btn-inverse" @click="delquest(group, quest)">Eliminar pregunta</button></span>
                             </div>

                             <label for="">Respuesta</label>
                             <quill-editor v-model="quest.descrip" ref="quillEditorA"  :options="editorOption" ></quill-editor>
                             <hr>
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
    <script src="{{asset('admin/appjs/questions.js')}}"></script>
@endsection