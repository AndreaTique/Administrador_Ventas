@extends('menu')

@section('plantilla')

@if (empty(session('guardado')))
@else 
   
    <div class="ui compact olive message">
    <i class="close icon"></i>
    <div class="header">
    {{  session('guardado') }}
  </div>
</div>
@endif
        
<h1 style="color:aliceblue">Listado de Articulos</h1><br>
<table style="color:aliceblue" class="ui orange table">
  <thead >
    <tr><th>Codigo</th>
    <th>Nombre</th>
    <th>Stok</th>
    <th>Descripcion</th>
    <th>Imagen</th>
    <th>Estado</th>
    <th>categoria</th>
    <th>Acciones</th>

  </tr></thead>
  <tbody>
    
     @foreach ($objetoretornado as $articulo)
         
      <tr>
      <td style="color:black">{{ $articulo->codigo }}</td>
      <td style="color:black">{{ $articulo->nombre }}</td>
      <td style="color:black">{{ $articulo->stok  }}</td>
      <td style="color:black">{{ $articulo->descripcion  }}</td>
      <td style="color:black">{{ $articulo->estado  }}</td>
      <td style="color:black">{{ $articulo->categoriaid  }}</td>
      <td style="color:black"><img src="{{ $articulo->foto }}" alt="" width="50" height="50"></td>

      <td>
          <a href="{{ route('DeleteArticulo', $articulo) }}"><i class="glyphicon glyphicon-remove"></i></a>
          <a href="{{ route('UpdateArticulo', $articulo) }}"><i class="glyphicon glyphicon-pencil"></i></a>
          <i class="eye icon"></i></a>
          </td>
          </tr>
      @endforeach
        </tbody>
      </table>

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

@endsection