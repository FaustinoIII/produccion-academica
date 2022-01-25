<!-- The only way to do great work is to love what you do. - Steve Jobs -->
<div class="row">
    <div class="col-sm-11" style="margin-left: 4%; margin-bottom: 3%">
        <div class="card">
            <div class="card-header">
                {{$titulo}}
                </div>
            <div class="card-body">
                <div class="card-header">
                    Autores: 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$autor1}}</li>
                        <li class="list-group-item">{{$autor2}}</li>
                        <li class="list-group-item">{{$autor3}}</li>
                        <li class="list-group-item">{{$autor4}}</li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
            <h5 class="card-title" style="display: inline; margin-right:65%">Abstract</h5>
            <h5 style="display: inline;"> {{$tipo_art}} </h5>
            <br>
            <p class="card-text">{{$abstract}}.</p>
            </div>
            <div class="card-footer text-muted">
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" style="color: black">{{$revista}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{$url}}">Dirección de publicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">Descargar articulo</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>