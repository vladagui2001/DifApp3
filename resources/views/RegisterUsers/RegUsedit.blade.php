@extends('layouts.app')
@section('title', 'Register User Edit')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<!-- <script src="C:/xampp/htdocs/ProjectoRealDifApp/DifApp/resources/js/create.js"></script> -->
<form class="form-group" method="POST" action="{{action('DifUserAdminController@update', $RegUser->id)}}" enctype="multipart/form-data">
@method('PUT')
        <div clas='form-group'>
        @csrf
            <label for=''>Nombre:</label>
            <input type='text'name="Nombre" class='form-control'value="{{$RegUser->Nombre}}" maxlength="100"> <br>

            <label for=''>Nombre de Usuario:</label>
            <input type='text'name="Username" class='form-control' value="{{$RegUser->Username}}" maxlength="100"> <br>
            
            <label for=''>CURP:</label>
            <input type='text'name="Curp" class='form-control' value="{{$RegUser->Curp}}" maxlength="18"> <br>
            
            <label for=''>Fecha de Nacimiento:</label>
            <input type='date' name="FechaNac" class='form-control' value="{{$RegUser->FechaNac}}"> <br>

            <label for=''>Contraseña:</label>
            <input type='password' name="Password" class='form-control'value="{{$RegUser->Password}}" maxlength="32"> <br>

            <div class="Genero">
                <label for=''>Género:</label> <br>
                <label><input name="Genero" type="radio" value="Hombre">Hombre</label>
                <label><input name="Genero" type="radio" value="Mujer">Mujer</label>
                <label><input name="Genero" type="radio" value="Otro">Otro</label>
            </div><br>

            <label for="">Avatar:</label>
            <input type="file" name="Avatar" value="{{$RegUser->Avatar}}">

        </div>
        <button type='submit'class='btn btn-primary'>
        Guardar</button>
</form>
@endsection

