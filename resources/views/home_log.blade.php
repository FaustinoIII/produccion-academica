@extends('layouts.plantilla_log1')

@section('title','Produccion academica')

@section('content')
<div class="espacio"><br></div>
    <x-barra_busqueda/>
    @foreach ($articulos as $articulo)
    @php
        $autores=$articulo->getAutores($articulo->autores);
        $tipo=$articulo->getTipo($articulo->tipo_art);
    @endphp
        <x-articulo :titulo="$articulo->titulo">
            <x-slot name="tipo_art">
                {{$tipo}}
            </x-slot>
            <x-slot name="autor1">
                {{$autores->autor1}}
            </x-slot>
            <x-slot name="autor2">
                {{$autores->autor2}}
            </x-slot>
            <x-slot name="autor3">
                {{$autores->autor3}}
            </x-slot>
            <x-slot name="autor4">
                {{$autores->autor4}}
            </x-slot>
            <x-slot name="abstract">
                {{$articulo->abstract}}
            </x-slot>
            <x-slot name="revista">
                {{$articulo->revista}}
            </x-slot>
            <x-slot name="url">
                {{$articulo->url}}
            </x-slot>
            <x-slot name="pdf">
                {{$articulo->pdf}}
            </x-slot>
        </x-articulo>
    @endforeach
@endsection