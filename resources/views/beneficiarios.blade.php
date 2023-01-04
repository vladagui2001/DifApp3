@include('layouts.app')
@section('title','Beneficiarios')
@section('content')

<form class="form-group" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm">
        <div style="width: 18rem; margin-top: 0px;">
            <button type="button" onclick="window.location='{{ route("users.create") }}'">Añadir Beneficiarios</button>
            <button type="button" onclick="window.location='{{ route("users.edit") }}'">Editar Beneficiarios</button>
        </div>
    </div>
</form>


    