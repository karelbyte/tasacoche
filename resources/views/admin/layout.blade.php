<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Karel Puerto">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">
        <!-- App title -->
        <title>Innotec Destellos Admin</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">

        <!-- App css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/pages.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/menu.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/responsive.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{asset('admin/plugins/switchery/switchery.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
        <script src="{{asset('admin/js/modernizr.min.js')}}"></script>
        @yield('style')
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                   <!-- <a href="index.html" class="logo"><span>Auto<span>tasacion</span></span><i class="fa fa-car"></i></a> -->
                    <!-- Image logo -->
                   <a href="{{route('back')}}" class="logo">

                            <span>Auto<span>tasacion</span></span> <!-- <img src="{{asset('admin/images/logo.png')}}" alt="" height="30"> -->

                        <i>
                         <img src="{{asset('admin/appimages/favicon.png')}}" alt="" height="28">
                        </i>
                  </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                       <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                         <!--   <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" class="menu-item">New</a>
                            </li>
                            <li class="dropdown hidden-xs">
                                <a data-toggle="dropdown" class="dropdown-toggle menu-item" href="#" aria-expanded="false">English
                                    <span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> -->
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                          <!--  <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="badge up bg-success">4</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Notifications</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-info">
                                                <i class="mdi mdi-account"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">New Signup</span>
                                                <span class="time">5 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-danger">
                                                <i class="mdi mdi-comment"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">New Message received</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-warning">
                                                <i class="mdi mdi-settings"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Settings</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="#">See all Notification</a></p>
                                    </li>
                                </ul>
                            </li> -->

                           <!-- <li>
                                <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-email"></i>
                                    <span class="badge up bg-danger">8</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li>
                                        <h5>Messages</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="{{asset('admin/images/users/avatar-2.jpg')}}" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Patricia Beach</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="{{asset('admin/images/users/avatar-3.jpg')}}" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Connie Lucas</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="{{asset('admin/images/users/avatar-4.jpg')}}" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Margaret Becker</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="#">See all Messages</a></p>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="right-bar-toggle right-menu-item">
                                    <i class="mdi mdi-settings"></i>
                                </a>
                            </li> -->

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                 <img src="{{asset('admin/appimages/avatar.png')}}" alt="user-img" class="img-circle user-img">

                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>{{auth()->user()->name}}</h5>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Perfil</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Ajustes</a></li>
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ti-power-off m-r-5"></i>
                                            {{ __('Salir..') }}
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<!--<li class="menu-title">Navigation</li> -->

                            <li class="has_sub">
                                <a href="{{route('back')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Inicio </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="{{route('ganvam')}}" class="waves-effect"><i class="mdi mdi-access-point-network"></i><span> Ganvam </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-car"></i> <span> Admin </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('makes')}}">Marcas</a></li>
                                    <li><a href="{{route('models')}}">Modelos</a></li>
                                    <li><a href="ui-panels.html">Tasaciones</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-calendar-check-o"></i><span> Citas </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="admin-sweet-alert.html">Listado de citas</a></li>
                                    <li><a href="admin-widgets.html">Seguimiento de citas</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-home"></i><span> Centros asociados </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-gears"></i><span> CMS </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('template')}}"> Plantillas</a></li>
                                    <li><a href="{{route('headers')}}"> Header</a></li>
                                    <li><a href="email-read.html"> Tasación</a></li>
                                    <li><a href="{{route('work')}}"> ¿Cómo funciona?</a></li>
                                    <li><a href="{{route('questions')}}"> Preguntas</a></li>
                                    <li><a href="{{route('contac')}}"> Contacto</a></li>
                                    <li><a href="{{route('footer')}}"> Foter</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="{{route('users')}}" class="waves-effect"><i class="fa fa-user"></i><span> Usuarios </span> </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                    <div class="help-box">
                        <h5 class="text-muted m-t-0">Ayuda?</h5>
                        <p class=""><span class="text-custom">email:</span> <br/> <span style="font-size: 10px">jet-soft@alwaysdata.net</span> </p>
                        <p class="m-b-0"><span class="text-custom">Mov:</span> <br/> (+53) 755 127 2444</p>
                    </div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container" id="app">

                        @yield('content')

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2016 - 2018 © Jet Soft.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            let resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('admin/js/detect.js')}}"></script>
        <script src="{{asset('admin/js/fastclick.js')}}"></script>
        <script src="{{asset('admin/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('admin/js/waves.js')}}"></script>
        <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('admin/plugins/switchery/switchery.min.js')}}"></script>

        <!-- Counter js  -->
        <script src="{{asset('admin/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('admin/plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!--Morris Chart-->
		<!--<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script> -->
		<!--<script src="{{asset('admin/plugins/raphael/raphael-min.js')}}"></script> -->

        <!-- Dashboard init -->
        <!-- <script src="{{asset('admin/pages/jquery.dashboard.js')}}"></script> -->

        <!-- App js -->
        <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('admin/js/jquery.core.js')}}"></script>
        <script src="{{asset('admin/js/jquery.app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
        <script src="{{asset('admin/appjs/tools.js')}}"></script>

        @yield('script')

    </body>
</html>