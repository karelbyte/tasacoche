<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/appimages/favicon.png')}}">
        <!-- App title -->
        <title>AUTO ATENCION ADMIN</title>

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

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.html" class="text-success">
                                            <span><img src="{{asset('admin/appimages/icono.png')}}" alt="" height="46"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" placeholder="Usuario" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup">
                                                        Recuerdame
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <!--<div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Acceder</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                         <!--   <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div> -->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <script src="{{asset('admin/js/jquery.core.js')}}"></script>
        <script src="{{asset('admin/js/jquery.app.js')}}"></script>

    </body>
</html>