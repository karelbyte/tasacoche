<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/front/template2/css/bootstrap.min.css')}}" rel="stylesheet" />
    <title>Confirmación de cita</title>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-12 text-center">
            <img src="{{asset('/storage/img/logo.png')}}" alt="" style="height: 70px; margin-bottom: 50px">

            <p style="font-size: 20px; margin-bottom: 50px">Hola <strong>{{$nombres}} </strong> gracias por confirmar tu cita, te esperamos!!</p>

            <span style="font-size: 20px; margin-bottom: 50px">Ir a <a href="{{$url}}"> {!! $url !!}</a></span>
        </div>
    </div>
</div>


</body>
</html>