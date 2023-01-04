@include('layouts.app')
@section('title','Encuestas Resultados')
@section('content')

<!-- Alumno: Vlad Enrique Aguiluz -->

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    @csrf
    <h2 style="margin-left: 20px;"> Cómo sugerencia, puede presionar Ctrl + F para buscar a un usuario en específico </h2>
    <a href="/difEncuesta/create" class="btn btn-dif">
        Nueva encuesta </a>
    <a href="/EncuestasDownload" class="btn btn-dif">
        Descargar Resultados de las Encuestas </a>
    
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Pregunta #1</th>
                <th scope="col">Pregunta #2</th>
                <th scope="col">Pregunta #3</th>
                <th scope="col">Pregunta #4</th>
                <th scope="col">Pregunta #5</th>
                <th scope="col">Pregunta #6</th>
                <th scope="col">Pregunta #7</th>
                <th scope="col">Pregunta #8</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($difEncuesta as $difEncuesta)
                <tr> 
                    <td>{{ $difEncuesta->Nombre}}</td>
                    <td>{{ $difEncuesta->Pregunta1}}</td>
                    <td>{{ $difEncuesta->Pregunta2}}</td>
                    <td>{{ $difEncuesta->Pregunta3}}</td>
                    <td>{{ $difEncuesta->Pregunta4}}</td>
                    <td>{{ $difEncuesta->Pregunta5}}</td>
                    <td>{{ $difEncuesta->Pregunta6}}</td>
                    <td>{{ $difEncuesta->Pregunta7}}</td>
                    <td>{{ $difEncuesta->Pregunta8}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
        </div>
    </div>

