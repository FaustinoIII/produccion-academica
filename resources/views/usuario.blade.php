@extends('layouts.plantilla_user')

@section('title','Produccion academica')

@php
    $id=Session::get('id_usuario');
    $result=DB::table('users')
            ->where('id_usuario', $id)
            ->first();
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
            </div>
        </div>
        <div class="col py-3">
            <div class="container">
                <div class="row">
                    <div class="col"> 
                        <div class="card mt-5 mb-3">
                            <div class="card-body">
                              <center><h5>Datos de usuario</h5></center>
                            </div>
                        </div>
                        <main>
                            <div class="container" >
                                <div class="row ml-3 mr-3">
                                    <div class="col">
                                        <div class="card shadow-lg border-0 rounded-lg mt-3">
                                            <form action="{{url('/update-user-profile/'.$id)}}" method="POST" enctype="multipart/form-data">
                                                {{( csrf_field() )}}
                                                <fieldset>
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="nombre" id="inputFirstName" type="text" value="{{$result->nombre}}"/>
                                                                <label for="inputFirstName">Nombre(s)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="ap_paterno" id="inputAP" type="text" value="{{$result->ap_paterno}}" />
                                                                <label for="inputAP">Apellido paterno</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="ap_materno" id="inputAM" type="text" value="{{$result->ap_materno}}" />
                                                                <label for="inputAM">Apellido materno</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="fecha_nac" id="inputNacimiento" type="text" value="{{$result->fecha_nac}}" />
                                                                <label for="inputNacimiento">Fecha de nacimiento</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="calle" id="inputCalle" type="text" value="{{$result->calle}}" />
                                                                <label for="inputCalle">Calle</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="colonia" id="inputColonia" type="text" value="{{$result->colonia}}" />
                                                                <label for="inputColonia">Colonia</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="cp" id="inputCP" type="text" value="{{$result->cp}}" />
                                                                <label for="inputCP">Código postal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="ciudad" id="inputCiudad" type="text" value="{{$result->ciudad}}" />
                                                                <label for="inputCiudad">Ciudad</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating">
                                                                <input class="form-control" name="estado" id="inputEstado" type="text" value="{{$result->estado}}" />
                                                                <label for="inputEstado">Estado</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="telefono" id="inputTelefono" type="text" value="{{$result->telefono}}" />
                                                                <label for="inputTelefono">Telefono</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">  
                                                        <select id="inputGrado" name="grado_estudios"  class="form-select" >
                                                            <option value="Licenciatura">Licenciatura</option>
                                                            <option value="Maestria">Maestria</option>
                                                            <option value="Doctorado">Doctorado</option>
                                                        </select>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <input class="form-control" name="email" id="inputEmail" type="email" value="{{$result->email}}"/>
                                                                <label for="inputEmail">Correo electronico</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center py-3">                              
                                                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Actualizar datos</button></div>
                                                </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
@endsection