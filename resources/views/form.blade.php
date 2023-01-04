
<div class="form-group">
    {{Form::label('Nombre','Nombre:')}}
    {{Form::text('Nombre',null,['class'=>'form-control'])}}
    {{Form::label('Curp','Ingrese la CURP:')}}
    {{Form::text('Curp',null,['class'=>'form-control'])}}
    {{Form::label('Genero','Seleccione Género:')}}
    {{Form::text('Genero',null,['class'=>'form-control'])}}
    {{Form::label('NoDeHijos','Número de Hijos:')}}
    {{Form::text('NoDeHijos',null,['class'=>'form-control'])}}
    {{Form::label('Discap','¿Es usted Discapacitado?')}}
    {{Form::text('Discap',null,['class'=>'form-control'])}}
    {{Form::label('Nomdiscap','Mencione la Discapacidad en caso de tener:')}}
    {{Form::text('Nomdiscap',null,['class'=>'form-control'])}}
    {{Form::label('Ing_Men','Ingresos Mensuales: ')}}
    {{Form::text('Ing_Men',null,['class'=>'form-control'])}}
    {{Form::label('Nom_Apoyo','Nombre del Apoyo')}}
    {{Form::text('Nom_Apoyo',null,['class'=>'form-control'])}}
</div>

