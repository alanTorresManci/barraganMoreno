<?php
/**
* 
*/
class PropertyController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
	public function create()
	{
		if(Sentry::check())
			return View::make('propCreate');
		else
			return Redirect::to('/');
	}
	public function createP()
	{
		$data = array();
		$user = array();
		$user = Sentry::getUser();
		$data = Input::all();
		$pdf = $data['pdf'];
		$query = DB::insert('INSERT INTO property (id,precio,direccion,colonia,ciudad,tipo,estatus) Values (?,?,?,?,?,?,?,?)', 
			array($user['id'], $data['precio'], $data['direccion'], $data['colonia'], $data['ciudad'], 
				$data['tipo'] , $data['estatus']));

	}
	public function view()
	{
		$user = Sentry::getUser();
		$id = $user['id'];
		$data = DB::select('SELECT * FROM property WHERE id = 3');
		return View::make('muestaProp')->with('data', $data);
	}
}