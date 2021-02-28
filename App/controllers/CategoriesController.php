<?php
require_once '../../App/router/CONTROLLER_BASE.php';
require_once '../../App/Auth.php';

class CategoriesController extends CONTROLLER_BASE{
  public function read(){
    Auth::checkLogin();
    $obj = $this->model('CategoriesModel');
    $resultado = $obj->read();

    $this->view('Categories/read',$resultado);
  }
  public function create(){
	    Auth::checkLogin();
	    $msg = array();

	     if(isset($_POST['submitCreate'])){
	      $codigo = $_POST['codigoCadastrar'];
	      $titulo = filter_var($_POST['tituloCadastrar'], FILTER_SANITIZE_STRING);
	       if(empty($_POST['codigoCadastrar'])){
		$msg[] = 'Preencha o campo';
	      }else if(empty($_POST['tituloCadastrar'])){
		$msg[] = 'Preencha o campo';
	      }else if(filter_var($codigo, FILTER_VALIDATE_INT) === false){
		$msg[] = 'Codigo nao é inteiro';
	      }else {  

		$obj = $this->model('CategoriesModel');
		$obj->codigo = $codigo ;
		$obj->titulo = $titulo ;

	       $msg[] = $obj->create();
	       }
	    }
	$this->view('Categories/create',$resultado=['msg'=>$msg]);
}

  public function update(){
    Auth::checkLogin();
    $msg = array();

     if(isset($_POST['submitUpdate'])){
      $codigoAtualizar = $_POST['codigoAtualizar'];
      $tituloAtualizar = filter_var($_POST['tituloAtualizar'], FILTER_SANITIZE_STRING);

       if(empty($_POST['codigoAtualizar'])){
        $msg[] = 'Preencha o campo';
       }else if(filter_var($codigoAtualizar, FILTER_VALIDATE_INT) === false){
        $msg[]='nao é int';
       }elseif(empty($_POST['tituloAtualizar'])){
        $msg[] = 'Preencha o campo';
       }else{
        $obj = $this->model('CategoriesModel');
        $obj->codigo = $codigoAtualizar;
        $obj->titulo = $tituloAtualizar ;

        $msg[] = $obj->update();
       }
     }
    $this->view('Categories/update',$resultado=['msg'=>$msg]);
  }

  public function delete(){
    $msg = array();
    if(isset( $_POST['submitDeletar'])){
      if(empty($_POST['codigoDeletar'])){
        $msg[]='preencha';
      }else if(filter_var($_POST['codigoDeletar'], FILTER_VALIDATE_INT) === false){
        $msg[]='nao é nt';
      }else{
        $codigo = $_POST['codigoDeletar'];
        $obj = $this->model('CategoriesModel');
        $msg[] = $obj->delete($codigo);
      }
    }
    $this->view('Categories/delete',$resultado=['msg'=>$msg]);
  }
}
