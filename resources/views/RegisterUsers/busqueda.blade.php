@include('layouts.app')
@section('title','Trainers')
@section('content')
     
@csrf
    <div class="row">
    @foreach ($difRegister as $difRegisters)
    <div class="col-sm">
      <div class="card text-center" style="width: 18rem; margin-top: 40px; margin-left: 20px;" >
          <div class="card-body">
          <h5 class="card-title"><b>{{$difRegisters->id}}.- {{$difRegisters->Nombre}}</b></h5>
          <p class="card-text"><b>Curp:</b> {{$difRegisters->Curp}}</p>
          <p class="card-text"><b>Genero:</b> {{$difRegisters->Genero}}</p>
          <p class="card-text"><b>Número de hijos:</b> {{$difRegisters->NoDeHijos}}</p>
          <p class="card-text"><b>¿Discapacitado?:</b> {{$difRegisters->Discap}}</p>
          <p class="card-text"><b>Discapacidad:</b> {{$difRegisters->Nomdiscap}}</p>
          <p class="card-text"><b>Ingresos Mensuales:</b> {{$difRegisters->Ing_Men}}</p>
          <p class="card-text"><b>Apoyo Solicitado:</b> {{$difRegisters->Nom_Apoyo}}</p>
          <p class="card-text"><b>Estatus de solicitud:</b> {{$difRegisters->Status}}</p>
 
    
</form>
  </div>
</div>
</div>
@endforeach
</div>