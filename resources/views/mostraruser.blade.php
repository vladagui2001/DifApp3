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
    <form action="/search1" method="get">
        <input type="text"  name="text" placeholder=""/>
        <button type="submit">Buscar</button>
    </form>
    <div class="row">
        @foreach ($User as $Difregister)
        <div class="col-sm">
            <div class="card text-center" style="width: 18rem; margin-top: 40px; margin-left: 20px;" >
                <div class="card-body">
                <h5 class="card-title"><b>{{$Difregister->id}}.- {{$Difregister->Nombre}}</b></h5>
                <p class="card-text"><b>Curp:</b> {{$Difregister->Curp}}</p>
                <p class="card-text"><b>Genero:</b> {{$Difregister->Genero}}</p>
                <p class="card-text"><b>Número de hijos:</b> {{$Difregister->NoDeHijos}}</p>
                <p class="card-text"><b>¿Discapacitado?:</b> {{$Difregister->Discap}}</p>
                <p class="card-text"><b>Discapacidad:</b> {{$Difregister->Nomdiscap}}</p>
                <p class="card-text"><b>Ingresos Mensuales:</b> {{$Difregister->Ing_Men}}</p>
                <p class="card-text"><b>Apoyo Solicitado:</b> {{$Difregister->Nom_Apoyo}}</p>
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
