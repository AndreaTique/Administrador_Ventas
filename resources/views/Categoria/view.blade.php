@extends('menu')
<link rel="stylesheet" href="{{ asset('css/semantic.min.css')}}">
@section('plantilla')

@if (empty(session('guardado')))
@else 
<div class="ui black message" id="tamanio">
    <i class="close icon"></i>
    <div class="header">
      {{ session('guardado') }}
    </div>
</div>
@endif

<div class="container">
    <div>
</div>
    <h1 class="titulo" style="color:aliceblue">Listado de Categorias</h1>
</div>
      <br><table style="text-align: center;" class="ui orange table">
        <tr>
            <td>Categoria</td>
            <td>fecha</td>
            <td>Departamento</td>
            <td>Municipio</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    
        @foreach ($objetoretornado as $categoria)
    
        <tr>
            <td style="color:black" class="header"> {{$categoria->nombre}}</td>
                <td style="color:black" class="header"> {{$categoria->fecha}}</td>
                <td style="color:black" class="header"> {{$categoria->departamento}}</td>
                <td style="color:black" class="header"> {{$categoria->municipio}}</td>
                <td><a href="{{route('UpdateCategoria',$categoria->id)}}"><i class= "glyphicon glyphicon-pencil"></i></a></td>
                <td> <a href="{{route('DeleteCategoria',$categoria->id)}}"><i class= "glyphicon glyphicon-remove"></i></a></td>
        </tr>
    
  @endforeach
    </table>  
</div>
     
@endsection