@extends('layouts.admin_lay')

@section('title','Produccion academica')

@php
    $result=DB::table('users')
        ->orderBy('id_usuario')
        ->get();
@endphp

@section('content')

<table class="table table-striped" >
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Usuario</th>
          <th scope="col">Paterno</th>
          <th scope="col">Materno</th>
          <th scope="col">Ciudad</th>
          <th scope="col">Estado</th>
          <th scope="col">Telefono</th>
          <th scope="col">Eduación</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      
      @foreach($result as $usuarios)
      <tbody>
        <tr>
          <td class="center">{{ $usuarios->id_usuario }}</td>
          <td class="center">{{ $usuarios->nombre }}</td>
          <td class="center">{{ $usuarios->ap_paterno }}</td>
          <td class="center">{{ $usuarios->ap_materno }}</td>
          <td class="center">{{ $usuarios->ciudad }}</td>
          <td class="center">{{ $usuarios->estado }}</td>
          <td class="center">{{ $usuarios->telefono}}</td>
          <td class="center">{{ $usuarios->grado_estudios }}</td>
                          
          <td class="center">
            @if ($usuarios->tipo_usuario === '0')
              <a class="btn btn-danger" href="{{URL::to('/set-user-to-admin/'.$usuarios->id_usuario)}}" id="admin">
                <i class="bi bi-person-check-fill"></i> 
              </a>
            @endif
            @if ($usuarios->tipo_usuario === '1')
              <a class="btn btn-danger" href="{{URL::to('/set-user-to-normal/'.$usuarios->id_usuario)}}" id="admin">
                <i class="bi bi-person-dash"></i> 
              </a>
            @endif
            <a class="btn btn-danger" href="{{URL::to('/delete-user/'.$usuarios->id_usuario)}}" id="delete">
              <i class="bi bi-trash"></i> 
            </a>
          </td>
        </tr>																		
      </tbody>
      @endforeach	
</table>

@endsection