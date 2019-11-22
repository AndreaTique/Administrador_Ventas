@extends('menu')

@section('plantilla')


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Ventas | Log in</title>
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
        <p class="login-box-msg">Registro de Categoria</p>
       
      <form action="{{route('InsertCategoria')}}" method="post">
          @csrf
          
          <div class="form-group has-feedback">
            <label>nombre</label>
            @error ('nombre')
            <div class="ui orange message">este Campo es Obligatorio!</div>
            @enderror
            <input type="text" class="form-control" name="nombre"  value="{{ old('nombre') }}">
            <span class=""></span>
          </div>


           <div class="form-group has-feedback">
             <label>Fecha</label>
             @error ('fecha')
             <div class="ui orange message">este Campo es Obligatorio!</div>
             @enderror
            <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">
            <span class=""></span>
          </div>

          <div class="form-group has-feedback">
            <label>Departamento (departamento)</label>
            @error ('departamento')
            <div class="ui orange message">este Campo es Obligatorio!</div>
            @enderror
           <select name="departamento" >
           <option value="{{ old('departamento') }}">SELECCIONE</option>  
           
           <?php $infodepartamento = DB::table('departamentos')->get(); ?>
           @foreach ($infodepartamento as $departamento)
                    <option id="lista1" name="lista1" value="{{ $departamento->departamento }}">{{$departamento->departamento}}
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
              <option value="{{ old('municipio') }}">SELECCIONE</option> 
          <?php $infomunicipio = DB::table('municipios')->get(); ?>
          @foreach ($infomunicipio as $municipio)
                   <option id="lista1" name="lista1" value="{{ $municipio->municipio }}">{{$municipio->municipio}}
                   </option>
                       @endforeach
                      </select>
       </div>
            
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
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
   

    <script type="text/javascript">
      
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });

      $(document).ready(function(){
        recargarlista();
        $('#lista1').change(function(){
          recargarlista();
        });
      });
    </script>

<script type="text/javascript">

  function recargarlista(){
    
    $.ajax({
      type:"POST",
      url:"Categorias/insert",
      data:"departamento=" + $('#lista1').val();
      success:function(r){
        $('#select2').html(r);
      }
    });
  });
</script>
    
  </body>
</html>



@endsection