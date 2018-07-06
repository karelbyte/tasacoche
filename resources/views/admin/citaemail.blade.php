<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de confirmacion</title>
</head>
<body>

 <img src="{{asset('/storage/img/logo.png')}}" alt="" style="height: 70px">

 <p>Hola <strong>{{$data['nombres']}} </strong> gracias por usar nuestra plataforma.</p>

 <p>Fecha: {{$data['fecha']}} </p>

 <p>Hora: {{$data['hora']}} </p>

 <p>Versión: {{$data['version']}} </p>

 <p>Tasa: {{$data['tasacion']}} </p>

 <p>Click en el siguiente enlace para confirmar su cita</p>

 <a href="{{$data['url']}}">Confirmación de cita</a>

</body>
</html>