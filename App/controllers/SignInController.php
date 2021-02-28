<?php
require_once '../../App/router/CONTROLLER_BASE.php';


class SignInController extends CONTROLLER_BASE{
	public function index(){
		$obj = $this->model('SignInModel');
		$resultado = $obj->index();

		$this->view('SignInFolder/SignInView',$resultado);
	}

	public function signIn(){
		if(isset($_POST['submitLogin'])){ 
			if(empty($_POST['email'])){
				header("Location:/HomeController/index");
			}elseif(empty($_POST['senha'])){
				header("Location:/HomeController/index");
			}else{ 
						$email = $_POST['email'];
						$senha = $_POST['senha'];
						$obj = $this->model('SignInModel');
						$resultado = $obj->signIn($email,$senha);		

							if($resultado == 'encontrou'){
								header("Location:/HomeController/index");
							}else{
								header("Location:/SignInController/index");
							}
						}
					}	
			}	
}