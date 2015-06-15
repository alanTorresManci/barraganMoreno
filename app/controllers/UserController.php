<?php
/**
* 
*/
class UserController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
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
				echo "usuario creado exitosamente";
			return Redirect::to('/');
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
	public function login()
	{
		if(! Sentry::check())
			return View::make('login');
		else
			return Redirect::to('/index');
	}
	public function enter()
	{
		try
		{
			$credentials = array();
			$data = Input::all();
			$credentials['email'] = $data['email'];
			$credentials['password'] = $data['password'];
			$user = Sentry::authenticate($credentials, false);
			if($user->timestamps)
			{
				$usuario = Sentry::findUserById($user['id']);
				Sentry::login($usuario, false);
				return Redirect::to('index');
			}
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}
	}
	public function index()
	{
		if(Sentry::check())
			return View::make('index');
		else
			return Redirect::to('/');
	}
	public function logout()
	{
		Sentry::logout();
		return Redirect::to('/');
	}
	public function edit()
	{
		if(Sentry::check())
			return View::make('edit');
		else
			return Redirect::to('/');
	}
	public function change()
	{
		try
		{
			$data = array();
			$data = Input::all();
			$user = Sentry::getUser();
			if($data['email'] != "")
			{
				$user->email = $data['email'];
			}
			if($data['first_name'] != "")
			{
				$user->first_name = $data['first_name'];
			}
			if($data['last_name'] != "")
			{
				$user->last_name = $data['last_name'];
			}
			$user->save();
			echo "datos actualizados";
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'correo ya registrado';
		}
	}
}