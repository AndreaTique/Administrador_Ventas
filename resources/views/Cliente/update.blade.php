@extends('menu');


@section('plantilla')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Laravel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('bootstrap\css\bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fonts\font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist\css\AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins\iCheck\square\blue.css')}}">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Sistema</b>Laravel</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Actualizar de Clientes</p>
    <br>
    <form action="{{ route('UpdateBdCliente') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="ui inverted form">
        <div class="field">
          <div class="field">
            <label class="ui blue ribbon label">Nombre</label>
            <input type="hidden" name="id" value="{{ $updatecliente->id }}">
            <input placeholder="Nombre" type="text" name="nombre" id="nombre" value="{{ $updatecliente->nombre }}">
          </div>
          <div class="field">
            <label class="ui blue ribbon label">Apellido</label>
            <input placeholder="Apellido" type="text" name="apellido" id="apellido" value="{{ $updatecliente->apellido }}">
          </div>
          <div class="field">
          <label class="ui blue ribbon label">Direccion</label>
          <input placeholder="Direccion" type="text" name="direccion" id="direccion" value="{{ $updatecliente->direccion }}">
          </div>
          <div class="field">
            <label class="ui blue ribbon label">Telefono</label>
            <input placeholder="Telefono" type="number" name="telefono" id="telefono" value="{{ $updatecliente->telefono }}">
          </div>
          <div class="field">
            <label class="ui blue ribbon label">Documento</label>
            <input placeholder="Documento" type="number" name="documento" id="documento" value="{{ $updatecliente->documento }}">
          </div>
          <div class="field">
            <label class="ui blue ribbon label">Foto</label>
            <input type="file" name="foto" accept=".jpg , .png , .gif" id="foto" value="{{ $updatecliente->foto }}">
          </div>
        </div>
       
        </div>
        <center>
    
        <input type="submit" value="Actualizar" class="ui submit button">
        </center>
      </div>
      </form>
    </div>

  </body>
</html>



@endsection