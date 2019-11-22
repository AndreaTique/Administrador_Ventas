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
        <p class="login-box-msg">Registro de Clientes</p>


    
    @if ($errors->any())
      <div class="ui orange message">
      @foreach ($errors->all() as $e)
          {{ $e }} <br>
      @endforeach
    </div>
    @endif
    
    <br>
    <form action="{{ route('InsertCliente') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="ui inverted form">
        <div class="field">
          <div class="field">
              @error ('nombre')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
            <label class="ui blue ribbon label">Nombre</label>
            <input placeholder="Nombre" type="text" name="nombre" id="nombre">
          </div><br>

          <div class="field">
              @error ('apellido')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
            <label class="ui blue ribbon label">Apellido</label>
            <input placeholder="Apellido" type="text" name="apellido" id="apellido">
          </div><br>

          <div class="field">
              @error ('direccion')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
          <label class="ui blue ribbon label">Direccion</label>
          <input placeholder="Direccion" type="text" name="direccion" id="direccion">
          </div><br>

          <div class="field">
              @error ('telefono')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
            <label class="ui blue ribbon label">Telefono</label>
            <input placeholder="Telefono" type="number" name="telefono" id="telefono">
          </div><br>

          <div class="field">
              @error ('documento')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
            <label class="ui blue ribbon label">Documento</label>
            <input placeholder="Documento" type="number" name="documento" id="documento">
          </div><br>

          <div class="field">
              @error ('foto')
              <div class="ui orange message">Este Campo es Obligatorio!</div>
              @enderror
            <label class="ui blue ribbon label">Foto</label>
          <input type="file" name="foto" accept=".jpg , .png , .gif" id="foto" value="{{ asset('Image')}}">
          </div>
        </div>
        <div class="inline field">
            <div class="ui checkbox">
              <input type="checkbox" id="terms" name="acepta">
              <label for="terms">acepta terminos y condiciones</label>
            </div>
       
        </div>
        <center>
    
        <input type="submit" value="Registrar" class="ui submit button">
        </center>
      </div>
      </form>
    </div>
  </body>
  </html>


@endsection