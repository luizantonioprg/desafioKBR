<?php
class Auth{

  public static function checkLogin(){
    if(!isset($_SESSION['logado'])){
      header("Location:/SignInController/index");
    }
  }


  public function logout(){
		session_destroy();
		header('Location:/SignInController/index');
	}
}