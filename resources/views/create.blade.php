@extends('layouts.app')
@section('title', 'Trainers Create')
@section('content')

{!!Form::open(['route'=>'User.store','method'=>'POST','files'=>'true']) !!}
@include('form')
{{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
{!!Form::close()!!}
@endsection