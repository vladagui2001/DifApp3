@include('layouts.app')
@section('title','Mostrar User Admin')
@section('content')
    @csrf
    <h2 style="margin-left: 20px;"> Cómo sugerencia, puede presionar Ctrl + F para buscar a un usuario en específico </h2>

    <a href="/RegUser/create" class="btn btn-dif">
        Añadir nuevo usuario </a>
    <a href="UserDownload" class="btn btn-dif">
        Descargar lista de usuarios </a>
        
    <div class="row">
        @foreach ($RegUser as $RegUsers)
        <div class="col-sm">
        <div class="card text-center" style="width: 18rem; margin-top: 40px; margin-left: 40px;">

            <img style="height: 100px; width: 100px;
            background-color: #EFEFEF; margin: 20px;
            " class="card-img-top rounded-circle mx-auto d-block" 
            src="images/{{$RegUsers->Avatar}}" alt="Imagen del Card...">
            
                <div class="card-body">
                <h5 class="card-title"><b>{{$RegUsers->id}}.- {{$RegUsers->Nombre}}</b></h5>
                <p class="card-text"><b>Nombre de Usuario:</b> {{$RegUsers->Username}}</p>
                <p class="card-text"><b>Curp:</b> {{$RegUsers->Curp}}</p>
                <p class="card-text"><b>Fecha de Nacimiento:</b> {{$RegUsers->FechaNac}}</p>
                <p class="card-text"><b>Genero:</b> {{$RegUsers->Genero}}</p>
                <a href="/RegUser/{{$RegUsers->id}}/edit" class="btn btn-dif">
                Editar </a>
                <a href="/RegUser/delete/{{$RegUsers->id}}" class="btn btn-dark">
                Eliminar </a>
            </div>
        </div>
        </div>
    @endforeach
    </div>
    
