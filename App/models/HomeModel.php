<?php

require_once '../../App/router/MODEL_BASE.php';
class HomeModel extends Model{
	public function index(){
		return "bem-vindo";
	}


}