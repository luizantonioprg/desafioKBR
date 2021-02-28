<?php

require_once '../../App/router/MODEL_BASE.php';
class SignInModel extends Model{



	public function index(){
		return "bem-vindo";
	}
	public function signIn($email,$senha){
		$sql = "SELECT * FROM usuarios where email = ? and senha= ?";
		$stmt = Model::conectarBanco()->prepare($sql);
		$stmt->bindValue(1,$email);
		$stmt->bindValue(2,$senha);
		$stmt->execute();

		if($stmt->rowCount()>=1){
			$resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
			$_SESSION['logado'] = $email;
			$_SESSION['privilegio'] = $resultado['privilegio'];
			return 'encontrou';
			
		}else{
			return 'dados inválidos';
		}

	}
}