<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#061948">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#061948">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('/img/favicon.png')}}" />
		<!-- Main style sheet -->
		<link href="{{asset('/front/template1/css/style.css')}}" rel="stylesheet" />
		<!-- responsive style sheet -->
		<link href="{{asset('/front/template2/css/responsive.css')}}" rel="stylesheet" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{$header['appName']}}</title>
		<style>
			.top-feature .main-content {
				text-align: justify;
				padding: 50px 40px;
				border-bottom: 4px solid transparent;
				font-size: 14px;
				height: 450px;
			}
			#map {
				height: 330px;
				width: 100%;
			}
		</style>

	</head>

	<body>
		<div class="main-page-wrapper">
			<header class="header-two">
				<div class="top-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-12">
								<ul class="social-icon">
									<li><a href="#"><i class="fa fa-phone"></i> {{$contac['ctel']}} </a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i> {{$contac['cemail']}}</a></li>
									<li><a href="#"><i class="fa fa-clock-o"></i> {{$contac['chours']}}</a></li>
								</ul>
								<ul class="social-icon">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->

				<div class="theme-menu-wrapper">
					<div class="container">
						<div class="bg-wrapper clearfix">
							<div class="logo float-left"><a href="/home"><img src="{{asset($header['logo'])}}"/></a></div>

							<!-- ============== Menu Warpper ================ -->
					   		<div class="menu-wrapper float-right">
					   			<nav id="mega-menu-holder" class="clearfix">
								   <ul class="clearfix">
									   <li class="active"> <a href="#tasacion">Tasación </a> </li>
									   <li> <a href="#funcion">¿Cómo funciona?</a> </li>
									   <li> <a href="#frecuentes">Preguntas frecuentes</a>  </li>
									   <li> <a href="#contactos">Contacto</a> </li>
								   </ul>
								</nav> <!-- /#mega-menu-holder -->
					   		</div> <!-- /.menu-wrapper -->
						</div> <!-- /.bg-wrapper -->
					</div> <!-- /.container -->
				</div> <!-- /.theme-menu-wrapper -->
			</header> <!-- /.header-two -->

			
			<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div >
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="{{asset($header['cimg1'])}}" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{asset($header['cimg2'])}}" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{asset($header['cimg3'])}}" alt="Third slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="{{asset($header['cimg4'])}}" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div> <!-- /#theme-main-banner -->
			

			<div class="callout-banner section-spacing">
				<div class="container clearfix">
					<h3 class="title">{!! $work['wtitle'] !!}</h3>
					<p>Es muy facil!!, sigue los siguientes pasos que a continuacion te mostramos</p>
					<!--<a href="#" class="theme-button-one">FREE QUOTES</a> -->
				</div>
			</div>



			<div class="top-feature section-spacing">
				<div class="top-features-slide">
					<div class="item">
						<div class="main-content" style="background:#fafafa; text-align: center">
							<img src="{{asset($work['wimg1'])}}" style="width: 80px" />
							<h4>{{$work['wstept1']}}</h4>
							<p style="background:#fafafa; text-align: justify"> {!! $work['wstep1']!!}</p>
						</div> <!-- /.main-content -->
					</div> <!-- /.item -->
					<div class="item">
						<div class="main-content" style="background:#f6f6f6;">
							<img src="{{asset($work['wimg2'])}}" style="width: 80px" />
							<h4>{{$work['wstept2']}}</h4>
							<p> {!! $work['wstep2']!!}</p>
						</div> <!-- /.main-content -->
					</div> <!-- /.item -->
					<div class="item">
						<div class="main-content" style="background:#efefef;">
							<div class="single-solution-block">
								<img src="{{asset($work['wimg3'])}}" style="width: 80px" />
								<h4>{{$work['wstept3']}}</h4>
								<p> {!! $work['wstep3']!!}</p>
							</div> <!-- /.single-solution-block -->
						</div> <!-- /.main-content -->
					</div> <!-- /.item -->
					<div class="item">
						<div class="main-content" style="background:#e9e9e9;">
							<img src="{{asset($work['wimg4'])}}" style="width: 80px" />
							<h4>{{$work['wstept4']}}</h4>
							<p> {!! $work['wstep4']!!}</p>
						</div> <!-- /.main-content -->
					</div> <!-- /.item -->
				</div> <!-- /.top-features-slide -->
			</div> <!-- /.top-feature -->

			<div class="callout-banner section-spacing">
				<div class="container clearfix">
					<h3 class="title">Tu tambien puedes preguntar</h3>
					<p>{!! $quest['qtitle'] !!}</p>
					<!--<a href="#" class="theme-button-one">FREE QUOTES</a> -->
				</div>
			</div>

			<section style="margin-top: 50px; margin-bottom: 50px">
				<div class="container">
					@foreach($questions as $quests)
						<h4 style="margin-bottom: 5px">{{$quests->title}}</h4>
						@foreach($quests['quests'] as $quest)
							<div class="card" id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 10px">
								<div class="card-body" style="padding: 10px 0 0 10px">
									<div class="card-title" role="tab" id="heading{{$quest['id']}}">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$quest['id']}}" aria-expanded="true" aria-controls="collapseOne">
												{{$quest['question']}}
											</a>
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

			<div class="callout-banner">
				<div class="container clearfix">
					<h3 class="title">Contactanos!!</h3>
					<p style="color:white">{!! $contac['ctitle']!!}</p>
					<!--<a href="#" class="theme-button-one">FREE QUOTES</a> -->
				</div>
			</div>
			<div class="about-compnay-two section-spacing">
				<div class="overlay">
					<div class="container">
						<div class="row no-gutters">
							<div class="col-lg-7 col-12 text" style="padding-right: 15px">
								<h4 style="color: white">Formulario</h4>
								<div class="quote-form">
									<form action="#" class="theme-form-one">
										<div class="row">
											<div class="col-md-6"><input type="text" class="form-control input_box" placeholder="Nombres"></div>
											<div class="col-md-6">	<input type="text" class="form-control input_box" placeholder="Email"></div>
											<div class="col-md-6"><input type="text" class="form-control input_box" placeholder="Telef"></div>
											<div class="col-12"><textarea placeholder="Message"></textarea></div>
										</div> <!-- /.row -->
										<button type="submit" class="theme-button-one">Enviar</button>
									</form>
								</div> <!-- /.quote-form -->
							</div> <!-- /.col- -->
							<div class="col-lg-5 col-12">
								<h4 style="color: white">Ubicación</h4>
								<div id="map"></div>
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.overlay -->
			</div> <!-- /.about-compnay-two -->

			<section class="our_achievments_area" data-stellar-background-ratio="0.3" style="margin-bottom: 50px">
				<div class="container">
					<div class="tittle wow fadeInUp">
						<h4>Nuestros numeros!!</h4>
					</div>
					<div class="achievments_row row" style="margin-top: 30px; text-align: center">
						<div class="col-md-3 col-sm-6 p0 completed">
							<i class="fa fa-question-circle-o fa-3x" aria-hidden="true"></i><br>
							<span class="counter">1802</span>
							<h6>Solicitudes atendidas</h6>
						</div>
						<div class="col-md-3 col-sm-6 p0 completed">
							<i class="fa fa-car fa-3x" aria-hidden="true"></i><br>
							<span class="counter">1230</span>
							<h6>Coches comprados</h6>
						</div>
						<div class="col-md-3 col-sm-6 p0 completed">
							<i class="fa fa-users fa-3x" aria-hidden="true"></i><br>
							<span class="counter">1390</span>
							<h6>Clientes recurentes</h6>
						</div>
						<div class="col-md-3 col-sm-6 p0 completed">
							<i class="fa fa-star-half-o fa-3x" aria-hidden="true"></i><br>
							<span class="counter">1251</span>
							<h6>Recomendaciones</h6>
						</div>
					</div>
				</div>
			</section>


			<div class="short-banner">
				<div class="overlay">
					<div class="container">
						<h2>Simpre confiables, siempre a su servicio!!</h2>
					</div>
				</div>
			</div>


			<footer class="theme-footer-two">
				<div class="top-footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-sm-4 col-12 footer-list">
								<h6 class="title">Sobre nosotros</h6>
								<img src="{{asset($header['logo'])}}"  class="logo"  style="height: 50px; width:150px"/>
							</div> <!-- /.footer-list -->
							<div class="col-lg-4 col-sm-4 col-12 contact-widget">
								<h6 class="title">Enlaces</h6>
								<ul>
									<li><a href="#" ><i class="fa fa-dot-circle-o"></i> Tasacion</a></li>
									<li><a href="#" ><i class="fa fa-chevron-right"></i>Como funciona</a></li>
									<li><a href="#" ><i class="fa fa-chevron-right"></i>Preguntas frecuentes</a></li>
									<li><a href="#" ><i class="fa fa-chevron-right"></i>Contacto</a></li>
								</ul>
							</div> <!-- /.footer-gallery -->
							
							<div class="col-lg-4 col-sm-4 col-12 contact-widget">
								<h6 class="title">CONTACTO</h6>
								<ul>
									<li>
										<i class="flaticon-direction-signs"></i>
										{{$contac['caddress']}}
									</li>
									<li>
										<i class="flaticon-multimedia-1"></i>
										<a href="#">{{$contac['cemail']}}</a>
									</li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<a href="#">{{$contac['ctel']}}</a>
									</li>
								</ul>
							</div> <!-- /.contact-widget -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.top-footer -->
				<div class="bottom-footer">
					<div class="container">
						<p>  {{$footer['copyright']}}</p>
					</div>
				</div> <!-- /.bottom-footer -->
			</footer> <!-- /.theme-footer-two -->
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			<input type="text" style="display: none" id="lat" value="{{$contac['clat']}}">
			<input type="text" style="display: none" id="long" value="{{$contac['clong']}}">
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

		<script src="{{asset('/front/template1/vendor/jquery.2.2.3.min.js')}}"></script>
		<script src="{{asset('/front/template1/vendor/popper.js/popper.min.js')}}"></script>
		<script src="{{asset('/front/template1/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/Camera-master/scripts/jquery.mobile.customized.min.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/Camera-master/scripts/jquery.easing.1.3.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/Camera-master/scripts/camera.min.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/menu/src/js/jquery.slimmenu.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/WOW-master/dist/wow.min.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/jquery.appear.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/jquery.countTo.js')}}"></script>

		<script src="{{asset('/front/template1/vendor/fancybox/dist/jquery.fancybox.min.js')}}"></script>

		<script src="{{asset('/front/template1/js/theme.js')}}"></script>

		<script src="https://unpkg.com/vue@2.5.16/dist/vue.min.js"></script>
		<script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>
		<script src="{{asset('js/appvue.js')}}"></script>
	</body>
</html>