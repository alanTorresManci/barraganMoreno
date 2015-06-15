{{ Form::open(array('url' => 'propCreate', 'files'=> true )) }}	
    {{ Form::text('precio') }}
	{{ Form::text('direccion') }}
	{{ Form::text('colonia') }}
	{{ Form::text('ciudad') }}
	{{ Form::text('tipo') }}
	{{ Form::text('estatus') }}
	{{ Form::file('file') }}
	{{ Form::submit('crear propiedad :)') }}	
{{ Form::close() }}