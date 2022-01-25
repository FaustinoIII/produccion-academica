@extends('layouts.plantilla_user')

@section('title','Produccion academica')

@php
    $id=Session::get('id_usuario');
@endphp

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-lg-2 px-sm-1 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="pointer-events: none;">
                    <span class="fs-5 d-none d-sm-inline">Usuario</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{url('/log')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Página principal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/add-article')}}"  class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Registrar articulo</span> </a>
                    </li>
                    <li>
                        <a href="{{url('/dashboard-user')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Datos de usuario</span> </a>
                    </li>
                    <li>
                        <a href="{{url('/user-logout')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-box-arrow-in-left"></i> <span class="ms-1 d-none d-sm-inline">Log out</span> </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3 px-5">
            <div class="card mb-3">
                <div class="card-body">
                <center><h5>Registrar un articulo</h5></center>
                </div>
            </div>
            <form action="{{url('/save-article')}}" method="POST" enctype="multipart/form-data">
                {{( csrf_field() )}}
                <fieldset>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Título del articulo(*)</label>
                <input type="text" class="form-control"  name="titulo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Abstract del articulo(*)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="abstract"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nombre de la revista de publicación(*)</label>
                    <input type="text" class="form-control"  name="revista">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Autor #1(*)</label>
                    <input type="text"  maxlength="130" class="form-control"  name="autor1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Autor #2</label>
                    <input type="text"  maxlength="130" class="form-control"  name="autor2">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Autor #3</label>
                    <input type="text"  maxlength="130" class="form-control"  name="autor3">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Autor #4</label>
                    <input type="text" maxlength="130" class="form-control"  name="autor4">
                </div>
                <div class="mb-3">
                    <label for="Select" class="form-label">Selecciona el tipo de articulo(*)</label>
                    <select id="Select" class="form-select" name="tipo_art">
                    <option value="1">JRC</option>
                    <option value="2">SCIMAGO</option>
                    <option value="3">Indice Scopus</option>
                    <option value="4">Conacyt</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Url de publicación(*)</label>
                    <input type="text" maxlength="130" class="form-control" name="url">
                </div>
                <div class="input-group mb-3">
                    <input type="file" accept=".pdf" class="form-control" id="inputGroupFile02" name="pdf">
                    <label class="input-group-text" for="inputGroupFile02">Cargar archivo pdf(*)</label>
                </div>
                <div id="emailHelp" class="form-text">Los campos marcados (*) son obligatorios</div>
                <button type="submit" class="btn btn-primary" style="margin-left: 1rem">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection