{{ Form::open(array('url' => '/login')) }}
	{{ Form::text('email') }}
	{{ Form::password('password') }}
	{{ Form::submit('Click Me!') }}
{{ Form::close() }}