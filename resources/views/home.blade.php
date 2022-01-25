@extends('layouts.plantilla')

@section('title','Produccion academica')

@section('content')
<div class="espacio"><br></div>
    <x-barra_busqueda/>
    @php
        $result=DB::table('articulos')
            ->orderBy('id_articulo')
            ->take(5)
            ->get();
    @endphp
    @foreach ($result as $articulos)
        <x-articulo :titulo="$articulos->titulo">
            @php
                $tipo=DB::table('tipo_art')
                ->where('id_tipo', $articulos->tipo)
                ->first();
            @endphp
            <x-slot name="tipo_art">
                {{$tipo->nombre}}
            </x-slot>
            @php
                $autores=DB::table('autores')
                ->where('id_autores', $articulos->autores)
                ->first();
            @endphp
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
                {{$articulos->abstract}}
            </x-slot>
            <x-slot name="revista">
                {{$articulos->revista}}
            </x-slot>
            <x-slot name="url">
                {{$articulos->url}}
            </x-slot>
            <x-slot name="pdf">
                {{$articulos->pdf}}
            </x-slot>
        </x-articulo>
    @endforeach
@endsection