@include('layouts.app')
@section('title','Mostrar User')
@section('content')

<!-- Alumno: Vlad Enrique Aguiluz -->

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    @csrf
    <h2 style="margin-left: 20px;"> Cómo sugerencia, puede presionar Ctrl + F para buscar a un usuario en específico </h2>
    <div class="row">
        @foreach ($User as $Difregister)
        <div class="col-sm">
            <div class="card text-center" style="width: 18rem; margin-top: 40px; margin-left: 20px;" >
                <div class="card-body">
                <h5 class="card-title"><b>{{$Difregister->id}}.- {{$Difregister->Nombre}}</b></h5>
                <p class="card-text"><b>Estatus de solicitud:</b> {{$Difregister->Status}}</p>
                <a href="/Users/{{$Difregister->id}}/edit" class="btn btn-dif">
                Editar </a>
                <a href="/Users/delete/{{$Difregister->id}}" class="btn btn-dark">
                Eliminar </a>
            </div>
        </div>
        </div>
    @endforeach
    </div>
    <a href="Users/create" class="btn btn-dif"> Añadir Beneficiario </a>
