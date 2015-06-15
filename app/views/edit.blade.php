{{ Form::open(array('url' => '/edit')) }}
	{{ Form::text('email') }}
	{{ Form::text('first_name') }}
	{{ Form::text('last_name') }}
	{{ Form::submit('guardar') }}
{{ Form::close() }}
