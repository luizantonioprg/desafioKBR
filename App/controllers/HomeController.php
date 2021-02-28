<?php
require_once '../../App/router/CONTROLLER_BASE.php';
require_once '../../App/Auth.php';

class HomeController extends CONTROLLER_BASE{

	public function index(){
		Auth::checkLogin();
		$obj = $this->model('HomeModel');
		$resultado = $obj->index();

		$this->view('Home/index',$resultado);
	}

	public function logout(){
		Auth::logout();
	}
}