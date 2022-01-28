<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./css/styles.css" rel="stylesheet" />
    <link href="./css/boostrap.min.css" rel="stylesheet" />
    <link href="./css/boostrap-responsive.min.css" rel="stylesheet" />
</head>
<body>
    @php
        $id= Session::get('id');
    @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{url('/log')}}">Produccion academica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary" disabled data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        {{ Session::get('nombre')}}
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-lg-2 px-sm-1 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="pointer-events: none;">
                        <span class="fs-5 d-none d-sm-inline">Administración</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{url('/log')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Página principal</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/admin_art')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Articulos</span> </a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
                        </li>
                        {{-- <li>
                            <a href="{{url('/add-article')}}"  class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Registrar articulo</span> </a>
                        </li> --}}
                        <li>
                            <a href="{{url('/user-logout')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-box-arrow-in-left"></i> <span class="ms-1 d-none d-sm-inline">Log out</span> </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>
    <!--footer-->
</body>
</html>