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
        <a href="#"><b>Sistema</b>Ventas</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Actualizar Categoria</p>
  
            <form action="{{ route('UpdateBdCategoria') }}"  method="POST" class="ui form">
              @csrf
                  <div class="ui inverted form">
                    <div class="field">
                      <div class="field">
                        <label class="ui blue ribbon label">Nombre</label>
                        @error ('nombre')
                        <div class="ui orange message">este Campo es Obligatorio!</div>
                        @enderror
                      <input type="hidden" name="id" value="{{ $updatecategoria->id }}">
                      <input  type="text" name="nombre" id="nombre" value="{{ $updatecategoria->nombre }}">
                      </div> <br>
            
            
                   
            
                      <div class="field">
                      <label class="ui blue ribbon label">Fecha</label>
                      @error ('condicion')
                        <div class="ui orange message">este Campo es Obligatorio!</div>
                        @enderror
                      <input  type="date" name="fecha" id="fecha" value="{{ $updatecategoria->fecha}}">
                      </div>
            
                    </div>

                    <div class="form-group has-feedback">
                      <label>Departamento</label>
                      @error ('departamento')
                      <div class="ui orange message">este Campo es Obligatorio!</div>
                      @enderror
                     <select name="departamento" >
                     <option value="{{ $updatecategoria->departamento}}">{{ $updatecategoria->departamento}}</option>
                     
                     <?php $infodepartamento = DB::table('departamentos')->get(); ?>
                     @foreach ($infodepartamento as $departamento)
                              <option value="{{ $departamento->departamento }}">{{$departamento->departamento}}
                              </option>
                                  @endforeach
                    </select>
                     <span class=""></span>
                   </div>
          
                   <div class="form-group has-feedback">
                    <label>Municipio</label>
                    @error ('municipio')
                    <div class="ui orange message">este Campo es Obligatorio!</div>
                    @enderror
                   <select name="municipio" >
                   <option value="{{ $updatecategoria->municipio}}">{{ $updatecategoria->municipio}}</option>

                   <?php $infomunicipios = DB::table('municipios')->get(); ?>
                     @foreach ($infomunicipios as $municipio)
                              <option value="{{ $municipio->municipio }}">{{$municipio->municipio}}
                              </option>
                                  @endforeach
                  </select>
                   <span class=""></span>
                 </div>
            
                    <center>
                
                    <input type="submit" value="Actualizar" id="guardar" class="ui submit button">
                    </center>
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

    
  </body>
</html>



@endsection