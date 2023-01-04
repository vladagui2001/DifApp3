@extends('layouts.pdfinicio')
@section('content')
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>ID</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>CURP</th>
            <th>Fecha de Nacimiento</th>
            <th>Genero</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($RegUser as $RegUsers)
        <tr>
            <td class="text-right">
                <img style="height: 100px; width: 100px;
                 background-color: #EFEFEF; margin: 20px;"
                 class="card-img-top rounded-circle mx-auto d-block" 
                 src="images/{{$RegUsers->Avatar}}" alt="Imagen del Card...">
            </td>
            <td>{{$RegUsers->id}}</td>
            <td>{{$RegUsers->Nombre}}</td>
            <td>{{$RegUsers->Username}}</td>
            <td>{{$RegUsers->Curp}}</td>
            <td>{{$RegUsers->FechaNac}}</td>
            <td>{{$RegUsers->Genero}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection