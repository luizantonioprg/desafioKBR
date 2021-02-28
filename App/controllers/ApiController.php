<?php
require_once '../../App/router/CONTROLLER_BASE.php';


class ApiController extends CONTROLLER_BASE{

  public function showProducts(){

		$obj = $this->model('ApiModel');
		$resultado = $obj->showProducts();
    header("Content-type:application/json;charset:utf-8");
		echo json_encode($resultado);
	}

	public function consumeApi(){
		$this->view('Products/consumeApi',$resultado=[]);
	}
}