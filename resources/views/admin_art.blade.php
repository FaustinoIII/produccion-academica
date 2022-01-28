@extends('layouts.admin_lay')

@section('title','Produccion academica')

@php
    $result=$data;
@endphp

@section('content')
<table class="table table-striped" style="">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Autor principal</th>
          <th scope="col">Tipo articulo</th>
          <th scope="col">Revista</th>
          <th scope="col">Url</th>
          <th scope="col">Archivo</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      @foreach($result as $articulos)
      @php
        $autores=$articulos->getAutores($articulos->autores);
        $tipo=$articulos->getTipo($articulos->tipo_art);
      @endphp
      <tbody>
        <tr>
          <td class="center">{{ $articulos->id_articulo }}</td>
          <td class="center">{{ $articulos->titulo }}</td>
          <td class="center">{{ $autores->autor1 }}</td>
          <td class="center">{{ $tipo }}</td>
          <td class="center">{{ $articulos->revista }}</td>
          <td class="center">{{ $articulos->url }}</td>
          <td class="center">
            <a class="btn btn-danger" href="{{URL::to('/download-article/'.$articulos->id_articulo)}}" id="descargar">
              <i class="bi bi-file-earmark-arrow-down"></i> 
            </a>
          </td>
                          
          <td class="center">
            <a class="btn btn-danger" href="{{URL::to('/delete-article/'.$articulos->id_articulo)}}" id="delete">
              <i class="bi bi-trash"></i> 
            </a>
          </td>
        </tr>																		
      </tbody>
      @endforeach	
</table>

@endsection