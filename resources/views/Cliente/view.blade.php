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
        <p class="login-box-msg">Registro de Clientes</p>


@if (empty(session('guardado')))
@else 

    <div class="ui compact pink message">
    <i class="close icon"></i>
    <div class="header">
      {{  session('guardado') }}
    </div>
  </div>
  @endif
 
          
  <h1>Listado de Clientes</h1>
        
 
  <div class="ui link cards">
      @foreach ($objetoretornado as $cliente)
    <div class="card">    
      <img src="{{$cliente->foto_url}}" height="280px" width="290px">
      <div class="content">
        <a class="header">{{$cliente->nombre ." ". $cliente->apellido}}</a>
        <div class="meta">
          <span class="date">{{$cliente->documento}}</span>
        </div>
        <div class="description">
            {{$cliente->direccion}}
        </div>
        <div class="description">
            {{$cliente->telefono}}
        </div>
      </div>
  <div class="extra content">
  <a href="{{ route('DeleteCliente', $cliente) }}"><i class="glyphicon glyphicon-remove"></i></a>
  <a href="{{ route('UpdateCliente', $cliente) }}"><i class="glyphicon glyphicon-pencil"></i></a>
  <i class="eye icon"></i>Imprimir</a>
  </div>
  
</div>

@endforeach

</div>

@if ($objetoretornado->lastPage() >1)
  <tfoot>
      <tr><th colspan="5">
        <div class="ui right floated pagination menu">
        <a herf="{{ $objetoretornado->previousPageUrl() }}" class="{{($objetoretornado->currentPage() == 1) ? 'disabled ' : ''}}icon item">
            <i class="left chevron icon"></i>
          </a>
          @for ($i = 1; $i <= $objetoretornado->lastPage(); $i++)
        <a href="{{ $objetoretornado->url($i) }}" class="{{ ($objetoretornado->currentPage() == $i) ? 'active ' :  ''}} item"> {{$i}}</a>
          @endfor
        <a href="{{ $objetoretornado->nextPageUrl() }}" class="{{($objetoretornado->currentPage() ==  $objetoretornado->lastPage()) ? 'disabled ' : ''}}icon item">
            <i class="right chevron icon"></i>
          </a>
        </div>
      </th>
    </tr></tfoot>
    @endif

      </div>
    </div></body></html>
@endsection