<?php
require_once '../../App/router/CONTROLLER_BASE.php';
require_once '../../App/Auth.php';
require_once '../public/dependencies/PHPMAILER/PHPMailerautoload.php';

class SubCategoriesController extends CONTROLLER_BASE{
  public function read(){
    Auth::checkLogin();
    $obj = $this->model('SubCategoriesModel');
    $resultado = $obj->read();

    $this->view('SubCategories/read',$resultado);
  }
  public function create(){
    Auth::checkLogin();
    $msg = array();

     if(isset($_POST['submitCreate'])){
      $codigo = $_POST['codigoCadastrar'];
      $categoria = filter_var($_POST['categoriaCadastrar'], FILTER_SANITIZE_STRING);
      $titulo = filter_var($_POST['tituloCadastrar'], FILTER_SANITIZE_STRING);


       if(empty($_POST['codigoCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['tituloCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['categoriaCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(filter_var($codigo, FILTER_VALIDATE_INT) === false){
        $msg[] = 'Codigo nao é inteiro';
      }else {  

        $obj = $this->model('SubCategoriesModel');
        $obj->codigo = $codigo ;
        $obj->categoria = $categoria ;
        $obj->titulo = $titulo ;
       $msg[] = $obj->create();
       }


    }
		$this->view('SubCategories/create',$resultado=['msg'=>$msg]);
	}
  public function delete(){
    $msg = array();

    if(isset( $_POST['submitDeletar'])){
      $codigo = $_POST['codigoDeletar'];
      if(empty($_POST['codigoDeletar'])){
        $msg[]='preencha';
      }else if(filter_var($codigo, FILTER_VALIDATE_INT) === false){
        $msg[]='nao é int';
      }else{
        $subCategoriaDeletar = $_POST['codigoDeletar'];
        $obj = $this->model('SubCategoriesModel');
        $msg[] = $obj->delete($subCategoriaDeletar);
      }
    }
    $this->view('SubCategories/delete',$resultado=['msg'=>$msg]);
  }

  public function update(){
    Auth::checkLogin();
    $msg = array();



     if(isset($_POST['submitUpdate'])){
      $codigo = $_POST['codigoAtualizar'];
      $categoria = filter_var($_POST['categoriaAtualizar'], FILTER_SANITIZE_STRING);
      $titulo = filter_var($_POST['tituloAtualizar'], FILTER_SANITIZE_STRING);

      if(empty($_POST['codigoAtualizar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['tituloAtualizar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['categoriaAtualizar'])){
        $msg[] = 'Preencha o campo';
      }else if(filter_var($codigo, FILTER_VALIDATE_INT) === false){
        $msg[] = 'Codigo nao é inteiro';
      }else {  

        $obj = $this->model('SubCategoriesModel');
        $obj->codigo = $codigo ;
        $obj->categoria = $categoria ;
        $obj->titulo = $titulo ;
        $msg[] = $obj->update();
       }

       
     }

    $this->view('SubCategories/update',$resultado=['msg'=>$msg]);
  }

}