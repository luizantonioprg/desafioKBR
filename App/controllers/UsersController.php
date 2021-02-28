<?php
require_once '../../App/router/CONTROLLER_BASE.php';
require_once '../../App/Auth.php';
require_once '../public/dependencies/PHPMAILER/PHPMailerautoload.php';

class UsersController extends CONTROLLER_BASE{
  public function read(){
    Auth::checkLogin();
    $obj = $this->model('UsersModel');
    $resultado = $obj->read();

    $this->view('Users/read',$resultado);
  }
  public function create(){
	    Auth::checkLogin();
	    $msg = array();

	     if(isset($_POST['submitCreate'])){

	      $nomeCadastrar = filter_var($_POST['nomeCadastrar'], FILTER_SANITIZE_STRING);
	      $senhaCadastrar = filter_var($_POST['senhaCadastrar'], FILTER_SANITIZE_STRING);
	      $emailCadastrar = $_POST["emailCadastrar"];
	      $privilegioCadastrar = filter_var($_POST['privilegioCadastrar'], FILTER_SANITIZE_STRING);


	      if(empty($_POST['nomeCadastrar'])){
		$msg[]='preencha';
	      }else if(empty($_POST['emailCadastrar'])){
		$msg[]='preencha';
	      }else if (filter_var($emailCadastrar, FILTER_VALIDATE_EMAIL)===false) {
		$msg[]= "Invalid email format";
	      }else if(empty($_POST['senhaCadastrar'])){
		$msg[]='preencha';
	      }else if(empty($_POST['privilegioCadastrar'])){
		$msg[]='preencha';
	      }else{
		$obj = $this->model('UsersModel');
		$obj->nome = $_POST['nomeCadastrar'] ;
		$obj->email = $_POST['emailCadastrar'] ;
		$obj->senha = $_POST['senhaCadastrar'] ;
		$obj->privilegio = $_POST['privilegioCadastrar'] ;

	       $msg[] = $obj->create();
	      }
	    }
		$this->view('Users/create',$resultado=['msg'=>$msg]);
	}
  public function update(){
    Auth::checkLogin();
    $msg = array();



     if(isset($_POST['submitUpdate'])){
      $nomeCadastrar = filter_var($_POST['nomeAtualizar'], FILTER_SANITIZE_STRING);
      $senhaCadastrar = filter_var($_POST['senhaAtualizar'], FILTER_SANITIZE_STRING);
      $emailCadastrar = $_POST["emailAtualizar"];
      $privilegioCadastrar = filter_var($_POST['privilegioAtualizar'], FILTER_SANITIZE_STRING);

          if(empty($_POST['nomeAtualizar'])){
        $msg[]='preencha';
      }else if(empty($_POST['emailAtualizar'])){
        $msg[]='preencha';
      }else if (filter_var($emailCadastrar, FILTER_VALIDATE_EMAIL)===false) {
        $msg[]= "Invalid email format";
      }else if(empty($_POST['senhaAtualizar'])){
        $msg[]='preencha';
      }else if(empty($_POST['privilegioAtualizar'])){
        $msg[]='preencha';
      }else{
        $obj = $this->model('UsersModel');
        $obj->nome = $_POST['nomeAtualizar'] ;
        $obj->email = $_POST['emailAtualizar'] ;
        $obj->senha = $_POST['senhaAtualizar'] ;
        $obj->privilegio = $_POST['privilegioAtualizar'] ;
        $msg[] = $obj->update();
       }
     }

    $this->view('Users/update',$resultado=['msg'=>$msg]);
  }
  public function delete(){
    $msg = array();
    if(isset( $_POST['submitDeletar'])){
      if(empty($_POST['emailDeletar'])){
        $msg[]='preencha';
      }else if(filter_var($_POST['emailDeletar'], FILTER_VALIDATE_EMAIL)===false){
        $msg[]='Invalid email format';
      }else{
        $emailDeletar = $_POST['emailDeletar'];
        $obj = $this->model('UsersModel');
        $msg[] = $obj->delete($emailDeletar);
      }
    }
    $this->view('Users/delete',$resultado=['msg'=>$msg]);
  }
}
