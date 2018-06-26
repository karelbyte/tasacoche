<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$header['appName']}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}" />
    <link href="{{asset('/front/template2/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/front/template2/vendors/animate/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('/front/template2/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/front/template2/vendors/camera-slider/camera.css')}}" rel="stylesheet" />
    <link href="{{asset('/front/template2/vendors/owl_carousel/owl.carousel.css')}}" rel="stylesheet" />
    <link href="{{asset('/front/template2/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.min.css">
    <style>
        #map {
            height: 330px;
            width: 100%;
        }
    </style>
</head>
<body>

	<!-- Top Header_Area -->
	<section class="top_header_area">
	    <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i>{{$contac['ctel']}} </a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{$contac['cemail']}}</a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i>{{$contac['chours']}}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
	    </div>
	</section>
	<!-- End Top Header_Area -->

	<!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                   <a class="navbar-brand"  href="/home"><img src="{{asset($header['logo'])}}"  class="logo"/></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="#tasacion">Tasación </a> </li>
                        <li> <a href="#funcion">¿Cómo funciona?</a> </li>
                        <li> <a href="#frecuentes">Preguntas frecuentes</a>  </li>
                        <li> <a href="#contactos">Contacto</a> </li>
                        <!--<li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li> -->
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
	<!-- End Header_Area -->

    <!-- Slider area -->

    <section class="slider_area row m0">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset($header['cimg1'])}}" alt="...">

                </div>
                <div class="item">
                    <img src="{{asset($header['cimg2'])}}" alt="...">
                </div>

                <div class="item">
                    <img src="{{asset($header['cimg3'])}}" alt="...">
                </div>

                <div class="item">
                    <img src="{{asset($header['cimg4'])}}" alt="...">
                </div>


            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- End Slider area -->
    <div class="container">
     <div id="app">
         <form-wizard @on-complete="onComplete"
                      title=""
                      subtitle=""
                      shape="tab"
                      back-button-text="Go back!"
                      next-button-text="Go next!"
                      finish-button-text="We're there"
                      color="#e67e22">
             <tab-content title="Personal details"
                          icon="ti-user">
                 My first tab content
             </tab-content>
             <tab-content title="Additional Info"
                          icon="ti-settings">
                 My second tab content
             </tab-content>
             <tab-content title="Last step"
                          icon="ti-check">
                 Yuhuuu! This seems pretty damn simple
             </tab-content>
         </form-wizard>
     </div>
    </div>
    <!-- TASAR -->
       <!-- <div class="container">
            <div class="row">
                <section>
                    <div class="wizard">
                        <h3>¿Cómo obtener una tasación?</h3>
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Incio">
                                <span class="round-tab">
                                   <i class=" fa fa-car"></i>
                                </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 1">
                                <span class="round-tab">
                                    <i class="fa fa-file"></i>
                                </span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled">
                                    <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completar">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h3>Inicio</h3>
                                    <p>Obtenga la tasación de su vehículo de forma rápida, sencilla y gratuita, siguiendo los pasos descritos a continuación, no le llevara mas de 2 minutos.</p>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="button_all next-step">Siguiente</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h3>Rellenar formulario de tasación</h3>
                                    <p>Rellene el formulario de tasación de su derecha para obtener la mejor tasación del mercado para su vehículo.</p>
                                    <form  action="/api/vehiculos/tasar" id="formulario-tasacion-paso-1" novalidate="novalidate" >
                                        <div id="custom-message">
                                            No te dejes engañar por plataformas con tasaciones sobrevaloradas. Después te devaluarán hasta el 40%. Autotasacionexpress te ofrece la tasación más real y sincera. Solo devaluaremos por el estado de tu vehículo (pintura, averías). Somos profesionales.
                                        </div>
                                        <div class="alert alert-warning hide" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Se ha producido un error y no se ha podido obtener la tasación, intentelo más tarde.</div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marca">Marca</label>
                                                    <select style="width: 100%" class="form-control" id="marca" name="marca" >
                                                        <option value="">Seleccione una marca</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="modelo">Modelo</label>
                                                    <select style="width: 100%" class="form-control" id="modelo" name="modelo">
                                                        <option value="">Seleccione un modelo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="combustible">Combustible</label>
                                                    <select style="width: 100%" class="form-control" id="combustible" name="combustible">
                                                        <option value="">Seleccione un combustible</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="matriculacion">Matriculación</label>
                                                    <select style="width: 100%" class="form-control" id="matriculacion" name="matriculacion">
                                                        <option value="">Seleccione un año de matriculación</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="version">Versión</label>
                                                    <select style="width: 100%" class="form-control" id="version" name="version">
                                                        <option value="">Seleccione una versión</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kilometraje">Kilometraje</label>
                                                    <select style="width: 100%" class="form-control" id="kilometraje" name="kilometraje">
                                                        <option value="">Seleccione un kilometraje</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input  type="email" id="email" name="email" class="form-control" placeholder="Email"/>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="button_all prev-step">Anterior</button></li>
                                        <li><button type="button" class="button_all next-step">Siguiente</button></li>

                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="complete">
                                    <h3>Complete steps</h3>
                                    <p>You have successfully completed every steps.</p>
                                    <form action="#resumen-final" id="formulario-tasacion-paso-2" class="hide">
                                        <h2>Pedir cita</h2>
                                        <em class="mensaje-form">Esta es la tasación de su vehículo, rellene los datos del formulario para obtener un cita con el centro asociado más cercano.</em>

                                        <div class="alert alert-warning hide" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Se ha producido un error y no se ha podido reservar la cita, intentelo más tarde.</div>
                                        <div id="mensaje-2">

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tasación</label>

                                                <div class="well" id="tasacion">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="codigo-postal">Código postal</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="codigo-postal" name="codigo-postal"/>
                                                </div>
                                            </div>
                                            <input type="hidden" id="cita-id" name="cita-id" value=""/>
                                            <input type="hidden" id="tasacion-value" name="tasacion" value=""/>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="centro-asociado">Centro Asociado</label>
                                                <div class="form-group">
                                                    <div id="wrapper-centros-asociados">
                                                        <div class="well" id="mesanje-centros-asociados">
                                                            <span>Introduzca un <strong>código postal</strong> para obtener centros asociados cercanos</span>
                                                        </div>
                                                        <div id="centros-asociados" style="display: none;">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="fecha">Fecha</label>
                                                <div class="form-group">
                                                    <select style="width: 100%" class="form-control" id="fecha">
                                                        <option value="">Seleccione una fecha</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="hora">Hora</label>
                                                <div class="form-group">
                                                    <select style="width: 100%" class="form-control" id="hora">
                                                        <option value="">Seleccione una hora</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="marca">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="modelo">Apellidos</label>
                                                    <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" data-loading-text="Obteniendo cita..." class="btn button-custom">Pedir cita ahora</button>
                                    </form>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="button_all prev-step">Anterior</button></li>
                                        <li><button type="button" class="button_all btn-info-full next-step">Tasar</button></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div> -->
    <!-- FIN DE TASAR -->

    <section class="our_partners_area" id="funcion">
        <div class="book_now_aera" style="background-color: rgba(0,59,205,0.11)">
            <div class="container">
                <div class="row book_now" >
                    <div class="col-md-10 booking_text">
                        <h3>{!! $work['wtitle'] !!}</h3>
                        <p>Es muy facil!!, sigue los siguientes pasos que a continuacion te mostramos</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Professional Builde -->
    <section class="professional_builder row" >
        <div class="container">
           <div class="row builder_all" >
                <div class="col-md-3 col-sm-6 builder">
                    <img src="{{asset($work['wimg1'])}}" style="width: 80px" />
                    <h4>{{$work['wstept1']}}</h4>
                    <p> {!! $work['wstep1']!!}</p>
                </div>
               <div class="col-md-3 col-sm-6 builder">
                   <img src="{{asset($work['wimg2'])}}" style="width: 80px" />
                   <h4>{{$work['wstept2']}}</h4>
                   <p class="lnr-text-align-justify"> {!! $work['wstep2']!!}</p>
               </div>
               <div class="col-md-3 col-sm-6 builder">
                   <img src="{{asset($work['wimg3'])}}" style="width: 80px" />
                   <h4>{{$work['wstept3']}}</h4>
                   <p class="lnr-text-align-justify"> {!! $work['wstep3']!!}</p>
               </div>
               <div class="col-md-3 col-sm-6 builder_fix">
                   <div style="text-align: center"><img src="{{asset($work['wimg4'])}}" style="width: 80px" /> </div>
                   <h4>{{$work['wstept4']}}</h4>
                   <p> {!! $work['wstep4']!!}</p>
               </div>
           </div>
        </div>
    </section>

    <section class="our_partners_area" id="funcion" >
        <div class="book_now_aera" style="background-color: rgba(0,59,205,0.11)">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h3>{!!$quest['qtitle'] !!}</h3>
                    </div>
                    <div class="col-md-2 p0 book_bottun">
                        <a href="#" class="button_all">Preguntanos!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Services Area -->
    <section style="margin-top: 50px; margin-bottom: 50px">
        <div class="container">
            @foreach($questions as $quests)
            <h4 style="margin-bottom: 5px">{{$quests->title}}</h4>
                @foreach($quests['quests'] as $quest)
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{$quest['id']}}" style="background-color:rgba(228,166,11,0.53); ">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$quest['id']}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$quest['question']}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$quest['id']}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    {!! $quest['descrip']!!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>



    <!-- Our Achievments Area -->
    <section class="our_achievments_area" data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Nuestros numeros!!</h2>
            </div>
            <div class="achievments_row row">
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="counter">1802</span>
                    <h6>Solicitudes atendidas</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <span class="counter">1230</span>
                    <h6>Coches comprados</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="counter">1390</span>
                    <h6>Clientes recurentes</h6>
                </div>
                <div class="col-md-3 col-sm-6 p0 completed">
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <span class="counter">1251</span>
                    <h6>Recomendaciones</h6>
                </div>
            </div>
        </div>
    </section>
    <section class="our_partners_area" id="funcion">
        <div class="book_now_aera" style="background-color: rgba(0,59,205,0.11)">
            <div class="container">
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h3>{!! $contac['ctitle']!!}</h3>
                        <p>LLena el formulario con tus datos y envianos tu informacion</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- All contact Info -->
    <section class="all_contact_info">
        <div class="container">
            <div class="row contact_row">
                <div class="col-sm-7 contact_info send_message">
                    <h3>Formulario</h3>
                    <form class="form-inline contact_box">
                        <input type="text" class="form-control input_box" placeholder="Nombres">
                        <input type="text" class="form-control input_box" placeholder="Email">
                        <input type="text" class="form-control input_box" placeholder="Telef">
                        <textarea class="form-control input_box" placeholder="Mesaje"></textarea>
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </form>
                </div>
                <div class="col-sm-5">
                    <h3 style="margin-bottom: 30px">Ubicación</h3>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_partners_area" style="margin-top: 30px">
        <div class="book_now_aera" style="padding: 10px 0 10px 0">
            <div class="container">
                <div class="row book_now">
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Area -->

    <!-- Footer Area -->
    <footer class="footer_area">
        <div class="container">
            <div class="footer_row row">
                <div class="col-md-4 col-sm-6 footer_about">
                    <h2>Sobre nosotros</h2>
                    <img src="{{asset($header['logo'])}}"  class="logo"  style="height: 50px; width:150px"/>
                </div>
                <div class="col-md-4 col-sm-6 footer_about quick">
                    <h2>Enlaces</h2>
                    <ul class="quick_link">
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Tasacion</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Como funciona</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Preguntas frecuentes</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i>Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 footer_about">
                    <h2>INFORMACION DE CONTACTO</h2>
                    <address>
                        <p>Cualquier cuestión, aqui estanos nuestros datos!</p>
                        <ul class="my_address">
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>{{$contac['cemail']}}</a></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>{{$contac['ctel']}}</a></li>
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span style="padding-left: 0 ">{{$contac['caddress']}}</span></a></li>
                        </ul>
                    </address>
                </div>
            </div>
        </div>
        <div class="copyright_area">
            {{$footer['copyright']}}
        </div>
    </footer>
    <input type="text" style="display: none" id="lat" value="{{$contac['clat']}}">
    <input type="text" style="display: none" id="long" value="{{$contac['clong']}}">
    <!-- End Footer Area -->
    <script>
        function initMap() {
            var latv = document.getElementById('lat').value;

            var longv = document.getElementById('long').value;


            var uluru = {lat: parseFloat(latv) , lng: parseFloat(longv)};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM6SFeJnA9eAg0BaOMNYUQYAIpV_Vcggg&callback=initMap">
    </script>
    <script src="{{asset('/front/template2/js/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('/front/template2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/animate/wow.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/camera-slider/camera.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/Counter-Up/waypoints.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/owl_carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/front/template2/vendors/stellar/jquery.stellar.js')}}"></script>
    <script src="{{asset('/front/template2/js/theme.js')}}"></script>
    <script src="https://unpkg.com/vue@2.5.16/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>
    <script src="{{asset('js/appvue.js')}}"></script>

</body>
</html>
