@extends('layouts.pdfinicio')
@section('content')
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Pregunta 1</th>
            <th>Pregunta 2</th>
            <th>Pregunta 3</th>
            <th>Pregunta 4</th>
            <th>Pregunta 5</th>
            <th>Pregunta 6</th>
            <th>Pregunta 7</th>
            <th>Pregunta 8</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($difEncuesta as $difEncuestas)
        <tr>
            <td>{{$difEncuestas->Nombre}}</td>
            <td>{{$difEncuestas->Pregunta1}}</td>
            <td>{{$difEncuestas->Pregunta2}}</td>
            <td>{{$difEncuestas->Pregunta3}}</td>
            <td>{{$difEncuestas->Pregunta4}}</td>
            <td>{{$difEncuestas->Pregunta5}}</td>
            <td>{{$difEncuestas->Pregunta6}}</td>
            <td>{{$difEncuestas->Pregunta7}}</td>
            <td>{{$difEncuestas->Pregunta8}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection