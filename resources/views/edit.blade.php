@extends('layouts.app')
@section('title', 'Users Edit')
@section('content')
<form class="form-group" method="POST" action="{{action('DifUserController@update', $User->id)}}" enctype="multipart/form-data"> 
    @method('PUT')
    <div clas='form-group'>
    @csrf
            <label for=''>Nombre Completo:</label>
            <input type='text'name="Nombre" class='form-control' value="{{$User->Nombre}}" maxlength="100"> <br>

            <label for=''>CURP:</label>
            <input type='text'name="Curp" class='form-control' value="{{$User->Curp}}" maxlength="18"> <br>

            <div class="Genero">
                <label for=''>Género:</label> <br>
                <label><input name="Genero" type="radio" value="Hombre" checked>Hombre</label>
                <label><input name="Genero" type="radio" value="Mujer">Mujer</label>
                <label><input name="Genero" type="radio" value="Otro">Otro</label>
            </div><br>

            <label for=''>Número de Hijos:</label>
            <input type='text'name="NoDeHijos" class='form-control' value="{{$User->NoDeHijos}}" maxlength="2"> <br>

            <div class="Discap">
            <label for=''>¿Tiene alguna discapacidad?</label> <br>
                <label><input name="Discap" type="radio" value="Si">Sí</label>
                <label><input name="Discap" type="radio" value="No" checked>No</label>
            </div><br>

            <label for=''>¿Que discapacidad tiene? (Si aplica):</label>
            <input type='text'name="Nomdiscap" class='form-control' value="{{$User->Nomdiscap}}" maxlength="50"> <br>

            <label for=''>¿Cuál es su ingreso mensual?:</label>
            <input type='text'name="Ing_Men" class='form-control' value="{{$User->Ing_Men}}" maxlength="6"> <br>
             
            <div class="NomApoyo">
            <label for=''>Apoyo que desea solicitar:</label> <br>
                <label><input name="NomApoyo" type="radio" value="MilDias" checked>Mil Días de Vida</label>
                <label><input name="NomApoyo" type="radio" value="CincoAños">Menores de 5 años</label>
                <label><input name="NomApoyo" type="radio" value="PersonasDiscp">Personas con Discapacidad</label>
            </div><br>
            
            <label for=''>Estatus de la solicitud</label>
            <input type='text'name="Status" class='form-control' value="{{$User->Status}}" maxlength="10"> <br>

            <label for=''>NOTA: Antes de guardar sus cambios es necesario que
                vuelva a seleccionar el Género, Discapacidad y Apoyo que solicita.</label>
        </div>
        <button type='submit'class='btn btn-secondary'>
        Guardar Cambios</button>
</form>
@endsection