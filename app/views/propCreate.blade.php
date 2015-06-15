{{ Form::open(array('files'=> false ,'url' => 'propCreate')) }}	
    {{ Form::text('precio') }}
	{{ Form::text('direccion') }}
	{{ Form::text('colonia') }}
	{{ Form::text('ciudad') }}
	{{ Form::text('tipo') }}
	{{ Form::text('estatus') }}
	{{ Form::file('pdf') }}
	{{ Form::submit('crear propiedad :)') }}	
{{ Form::close() }}