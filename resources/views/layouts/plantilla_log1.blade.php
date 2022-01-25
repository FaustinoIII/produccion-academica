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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{url('/')}}">Produccion academica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <a style="text-decoration: none; color: aliceblue" href="{{URL::to('/dashboard-user')}}">{{ Session::get('nombre')}}</a>
                    </button>
                    <button class="rounded-end"><a class="dropdown-item" href="{{URL::to('/user-logout')}}">Log out</a></button>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

    <!--footer-->
</body>
</html>