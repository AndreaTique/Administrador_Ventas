@extends('menu')

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
        <p class="login-box-msg">Registro de Articulos</p>
       
      <form action="{{route('UpdateBdArticulo')}}" method="post"  enctype="multipart/form-data">
          @csrf

          <div class="form-group has-feedback">
                <label>codigo</label>
                @error ('codigo')
                <div class="ui orange message">este Campo es Obligatorio!</div>
                @enderror
                <input type="hidden" name="id" value="{{ $updatearticulo->id }}">
                <input type="text" class="form-control" name="codigo" value="{{ $updatearticulo->codigo }}">
                <span class=""></span>
              </div>
          
          <div class="form-group has-feedback">
            <label>nombre</label>
            @error ('nombre')
            <div class="ui orange message">este Campo es Obligatorio!</div>
            @enderror
            <input type="text" class="form-control" name="nombre" value="{{ $updatearticulo->nombre }}">
            <span class=""></span>
          </div>


           <div class="form-group has-feedback">
             <label>stok</label>
             @error ('stok')
             <div class="ui orange message">este Campo es Obligatorio!</div>
             @enderror
            <input type="text" class="form-control" name="stok" value="{{ $updatearticulo->stok }}">
            <span class=""></span>
          </div>

          <div class="form-group has-feedback">
                <label>descripcion</label>
                @error ('descripcion')
                <div class="ui orange message">este Campo es Obligatorio!</div>
                @enderror
            <input type="text" class="form-control" name="descripcion" value="{{ $updatearticulo->descripcion }}" >
            <span class=""></span>
          </div>

          <div class="form-group has-feedback">
                <label for="foto">Foto</label>
                @error ('foto')
                <div class="ui orange message">este Campo es Obligatorio!</div>
                @enderror
                <input type="file"  class="form-control" name="foto" id="foto" accept=".png, .jpg, .gif, .jpeg">
                </div>

                <div class="form-group has-feedback">
                        <label>estado</label>
                        @error ('estado')
                        <div class="ui orange message">este Campo es Obligatorio!</div>
                        @enderror
                    <input type="text" class="form-control" name="estado" value="{{ $updatearticulo->estado }}">
                    <span class=""></span>
                  </div>

                  <div class="form-group has-feedback">
                        <label>Categoria</label>
                        @error ('categoria')
                        <div class="ui orange message">este Campo es Obligatorio!</div>
                        @enderror
                        <select name= "categoria" class="ui search dropdown">       
                       @foreach ($infocategoria as $categoria)
                       <option value="">Seleccione una Categoria...</option>
                        <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
                           
                       @endforeach
                        </select>
                        </div>


         
          <div class="row">
            

            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
            </div><!-- /.col -->
          </div>
         

        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
   

    <script>
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>