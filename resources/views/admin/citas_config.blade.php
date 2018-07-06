
@extends('admin.layout')

@section('content')
    @parent
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title"> <i class="fa fa-users"></i> Ajustes de citas</h4>
                <ol class="breadcrumb p-0 m-0">
                    <li>
                        <a href="#">Citas</a>
                    </li>
                    <li>
                        <a href="#">Ajustes</a>
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">

       <div class="col-lg-3">
           Dias establecidos.

           <div v-for="d in  dias" :key="d.id" class="checkbox checkbox-primary">
               <input id="checkbox2" type="checkbox">
               <label for="checkbox2">
                  @{{ d.name }}
               </label>
           </div>
       </div>
        <div class="col-lg-2">
            <div class="form-group">
                Rango de horas
            </div>
            <div class="form-group">
                <label>Hora Inicio (24H)</label>
                <div class="input-group">
                    <input  type="time" class="form-control" v-model="hbegin">
                    <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label>Hora Cierre (24H)</label>
                <div class="input-group">
                    <input type="time" class="form-control" v-model="hend">
                    <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                </div>
            </div>

            <div class="form-group">
                <label for="">Intervalo (min)</label>
                <input type="text"  class="form-control" v-model.number="interval">
            </div>
        </div>

    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
                CITAS
        </div>
    </div>
    <div class="row">
        <div v-for="inter in citasxdia" :key="inter" class="col-lg-3">
            <div class="checkbox checkbox-info">
                <input type="checkbox" id="inlineCheckbox1" value="option1">
                <label for="inlineCheckbox1"> @{{ gethora(inter) }} </label>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-primary">Guardar</button>
        </div>

    </div>



@endsection


@section('script')
 @parent
 <script src="{{asset('admin/appjs/citas_config.js')}}"></script>

@endsection
