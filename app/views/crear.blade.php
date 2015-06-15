{{ Form::open(array('url' => '/create')) }}
	{{ Form::text('email') }}
	{{ Form::text('nombre') }}
	{{ Form::text('apellido') }}
	{{ Form::password('password') }}
	{{ Form::submit('Click Me!') }}
{{ Form::close() }}