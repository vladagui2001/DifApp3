@extends('layouts.app')
@section('title', 'DifCreate')
@section('content')

<!-- <script src="C:/xampp/htdocs/ProjectoRealDifApp/DifApp/resources/js/create.js"></script> -->
<form class="form-group" method="POST" action="/Users" enctype="multipart/form-data">
    @csrf
        <div clas='form-group'>
            <label for=''>Nombre Completo:</label>
            <input type='text'name="Nombre" class='form-control' maxlength="100"> <br>

            <label for=''>CURP:</label>
            <input type='text'name="Curp" class='form-control' maxlength="18"> <br>

            <div class="Genero">
                <label for=''>Género:</label> <br>
                <label><input name="Genero" type="radio" value="Hombre">Hombre</label>
                <label><input name="Genero" type="radio" value="Mujer">Mujer</label>
                <label><input name="Genero" type="radio" value="Otro">Otro</label>
            </div><br>

            <label for=''>Número de Hijos:</label>
            <input type='text'name="NoDeHijos" class='form-control' maxlength="2"> <br>

            <div class="Discap">
            <label for=''>¿Tiene alguna discapacidad?</label> <br>
                <label><input name="Discap" type="radio" value="Si">Sí</label>
                <label><input name="Discap" type="radio" value="No">No</label>
            </div><br>

            <label for=''>¿Que discapacidad tiene? (Si aplica):</label>
            <input type='text'name="Nomdiscap" class='form-control' maxlength="50"> <br>

            <label for=''>¿Cuál es su ingreso mensual?:</label>
            <input type='text'name="Ing_Men" class='form-control' maxlength="6"> <br>
             
            <div class="NomApoyo">
            <label for=''>Apoyo que desea solicitar:</label> <br>
                <label><input name="NomApoyo" type="radio" value="MilDias">Mil Días de Vida</label>
                <label><input name="NomApoyo" type="radio" value="CincoAños">Menores de 5 años</label>
                <label><input name="NomApoyo" type="radio" value="PersonasDiscp">Personas con Discapacidad</label>
            </div><br>

        </div>
        <button type='submit'class='btn btn-dif'>
        Guardar</button>
</form>

@endsection

