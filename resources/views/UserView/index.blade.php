@include('layouts.app')
@section('title','Difregister')
@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<form method="POST" enctype="multipart/form-data">
    @csrf
    <div style="margin-top: 100px; margin-right: 30px;">
        <img src='recursos/Estatusboton.png' class="float-right" onclick="window.location='{{ route("EncuestaDif") }}'">
    </div>
    <div style="margin-top: 100px; margin-left: 30px;">
        <img src='recursos/Solicitudboton.png' class="float-left" onclick="window.location='{{ route("users.create") }}'">
    </div>
    <div style="margin-top: 100px;">
        <img src='recursos/SoliBoton.png' class="mx-auto d-block" onclick="window.location='{{ route("mostraruser") }}'">
    </div>
</form>


    