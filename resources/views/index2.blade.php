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
    <div style="margin-top: 180px; margin-right: 80px;">
        <img src='recursos/Administrador.png' class="float-right" onclick="window.location='{{ route("Users") }}'">
    </div>
    <div style="margin-top: 180px; margin-left: 80px;">
        <img src='recursos/Beneficiarios.png' class="float-left" onclick="window.location='{{ route("principal") }}'"> 
</form>


    