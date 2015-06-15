<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function create()
	{
		try
		{
			$credentials = array();
			$credentials = Input::all();
				$user = Sentry::createUser(array(
				'email' => $credentials['email'],
				'password' => $credentials['password'],
				'first_name' => $credentials['nombre'],
				'last_name' => $credentials['apellido'],
				'activated' => true
				));
			return View::make('hello');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'falta seleccionar correo';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'falta elegir el password';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'este correo ya fue registrado';
		}
	}

}
