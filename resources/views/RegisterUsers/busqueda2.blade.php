<div class="form-group">
    {{Form::label('Nombreeeeeeee','Nombre')}}
    {{Form::label('Curp','Curp')}}
    {{Form::label('Genero','Genero')}}
    {{Form::label('NoDeHijos','NoDeHijos')}}
    {{Form::label('Discap','Discap')}}
    {{Form::label('Nomdiscap','Nomdiscap')}}
    {{Form::label('Ing_Men','Ing_Men')}}
    {{Form::label('Nom_Apoyo','Nom_Apoyo')}}
    {{Form::label('Status','Status')}}
    {{ Category::pluck('Nombre', 'Curp') }}
    
  </div>
  <div class="form-group">
    {{Form::label('Avatar','Avatar')}}
  </div>