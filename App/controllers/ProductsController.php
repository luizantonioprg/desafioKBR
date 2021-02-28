<?php
require_once '../../App/router/CONTROLLER_BASE.php';
require_once '../../App/Auth.php';
require_once '../public/dependencies/PHPMAILER/PHPMailerautoload.php';

class ProductsController extends CONTROLLER_BASE{
	public function create(){
    Auth::checkLogin();
    $msg = array();

     if(isset($_POST['submitCreate'])){
      $codigoCadastrar = $_POST['codigoCadastrar'];
      $tituloCadastrar = filter_var($_POST['tituloCadastrar'], FILTER_SANITIZE_STRING);
      $categoriaCadastrar = filter_var($_POST['categoriaCadastrar'], FILTER_SANITIZE_STRING);
      $subcategoriaCadastrar = filter_var($_POST['subcategoriaCadastrar'], FILTER_SANITIZE_STRING);
      $descricaoCadastrar = filter_var($_POST['descricaoCadastrar'],FILTER_SANITIZE_SPECIAL_CHARS);
      $imagemCadastrar = filter_var($_POST['imagemCadastrar'], FILTER_SANITIZE_STRING);
      $valorCadastrar = filter_var($_POST['valorCadastrar'], FILTER_SANITIZE_STRING);
      $tagCadastrar = filter_var($_POST['tagCadastrar'], FILTER_SANITIZE_STRING);
      $statusCadastrar = filter_var($_POST['statusCadastrar'], FILTER_SANITIZE_STRING);
       if(empty($_POST['codigoCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(filter_var($codigoCadastrar, FILTER_VALIDATE_INT) === false){
        $msg[]='nao é int';
      }else if(empty($_POST['tituloCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['tituloCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['categoriaCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['subcategoriaCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['descricaoCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['imagemCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else if(empty($_POST['valorCadastrar'])){
        $msg[] = 'Preencha o campo';
      }else{ 

        $obj = $this->model('ProductsModel');
        $obj->codigo = $_POST['codigoCadastrar'] ;
        $obj->titulo = $_POST['tituloCadastrar'] ;
        $obj->categoria = $_POST['categoriaCadastrar'] ;
        $obj->subcategoria = $_POST['subcategoriaCadastrar'] ;
        $obj->descricao = $_POST['descricaoCadastrar'];
        $obj->imagem = $_POST['imagemCadastrar'] ;
        $obj->valor = $_POST['valorCadastrar'];
        $obj->tag = $_POST['tagCadastrar'];
        $obj->status = $_POST['statusCadastrar'];
        // SEND EMAIL
        $mail = new PHPMailer(true);
           try {
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'emailprojetoestagio@gmail.com';
          $mail->Password = 'xxx';
          $mail->Port = 587;
          $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
         
          $mail->setFrom('emailprojetoestagio@gmail.com');
          $mail->addAddress('emailprojetoestagio2@gmail.com');
         
          $mail->isHTML(true);
          $mail->Subject = 'Um usuario novo foi cadastrado 10';
          $mail->Body = 'dwadwadw';
          $mail->AltBody = 'Um usuario novo foi cadastrado';
          $mail->send();
        } catch (Exception $e) {
          echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
       $msg[] = $obj->create();
       }


    }
		$this->view('Products/create',$resultado=['msg'=>$msg]);
	}

  public function read(){
    Auth::checkLogin();
    $obj = $this->model('ProductsModel');
    $resultado = $obj->read();

    $this->view('Products/read',$resultado);
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
        $obj = $this->model('ProductsModel');
        $msg[] = $obj->delete($codigo);
      }
    }


    $this->view('Products/delete',$resultado=['msg'=>$msg]);
  }


  public function update(){
    Auth::checkLogin();
    $msg = array();



     if(isset($_POST['submitUpdate'])){
      $codigoAtualizar = $_POST['codigoAtualizar'];
      $tituloAtualizar = filter_var($_POST['tituloAtualizar'], FILTER_SANITIZE_STRING);
      $categoriaAtualizar = filter_var($_POST['tituloAtualizar'], FILTER_SANITIZE_STRING);
      $subcategoriaAtualizar = filter_var($_POST['subcategoriaAtualizar'], FILTER_SANITIZE_STRING);
      $descricaoAtualizar =filter_var($_POST['descricaoAtualizar'], FILTER_SANITIZE_STRING); 
      $imagemAtualizar = filter_var($_POST['imagemAtualizar'], FILTER_SANITIZE_STRING);
      $valorAtualizar = filter_var($_POST['valorAtualizar'], FILTER_SANITIZE_STRING);
      $tagAtualizar = filter_var($_POST['tagAtualizar'], FILTER_SANITIZE_STRING);
      $statusAtualizar = filter_var($_POST['statusAtualizar'], FILTER_SANITIZE_STRING);
       if(empty($_POST['codigoAtualizar'])){
        $msg[] = 'Preencha o campo';
       }else if(filter_var($codigoAtualizar, FILTER_VALIDATE_INT) === false){
        $msg[]='nao é int';
       }elseif(empty($_POST['tituloAtualizar'])){
        $msg[] = 'Preencha o campo';
       }elseif(empty($_POST['categoriaAtualizar'])){
        $msg[] = 'Preencha o campo';
       }elseif(empty($_POST['subcategoriaAtualizar'])){
        $msg[] = 'Preencha o campo';
       }elseif(empty($_POST['descricaoAtualizar'])){
        $msg[] = 'Preencha o campo';
       }elseif(empty($_POST['imagemAtualizar'])){
        $msg[] = 'Preencha o campo';
       }elseif(empty($_POST['valorAtualizar'])){
        $msg[] = 'Preencha o campo';
       }else{
        $obj = $this->model('ProductsModel');
        $obj->codigo = $codigoAtualizar;
        $obj->titulo = $tituloAtualizar ;
        $obj->categoria = $categoriaAtualizar;
        $obj->subcategoria = $subcategoriaAtualizar;
        $obj->descricao = $descricaoAtualizar;
        $obj->imagem =$imagemAtualizar ;
        $obj->valor = $valorAtualizar;
        $obj->tag =  $tagAtualizar;
        $obj->status =  $statusAtualizar;
        $msg[] = $obj->update();
       }


     }

    $this->view('Products/update',$resultado=['msg'=>$msg]);
  }

  public function displayCategories(){
    $obj = $this->model('ProductsModel');
    $resultado = $obj->read();
  }
}