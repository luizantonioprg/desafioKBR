<?php

require_once '../../App/router/MODEL_BASE.php';
class ProductsModel extends Model{
  public $codigo;
  public $titulo;
  public $categoria;
  public $subcategoria;
  public $descricao;
  public $imagem;
  public $valor;
  public $tag;
  public $status;

	public function create(){

    $sql = "INSERT INTO `produtos`(`codigo`, `titulo`, `categoria`, `subcategoria`,`descricao`,`imagem`,`valor`,`tag`,`status`) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->codigo);
    $stmt->bindValue(2,$this->titulo);
    $stmt->bindValue(3,$this->categoria);
    $stmt->bindValue(4,$this->subcategoria);
    $stmt->bindValue(5,$this->descricao);
    $stmt->bindValue(6,$this->imagem);
    $stmt->bindValue(7,$this->valor);
    $stmt->bindValue(8,$this->tag);  
    $stmt->bindValue(9,$this->status);  


    if($stmt->execute()){
      return 'Cadastrado';
    }else{
      return 'Erro';
    }
	}


  public function read(){
    $sql = "SELECT * FROM produtos";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $resultado;

    }else{
      return [];
    }
  }


  public function delete($codigo){
    $sql = "DELETE FROM `produtos` WHERE codigo = ?";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$codigo);   

    if($stmt->execute()){
      return 'Deletado';
    }else{
      return 'Erro';
    }
  }


  public function update(){
    $sql = "UPDATE `produtos` SET `titulo`=?,`categoria`=?,`subcategoria`=?,`descricao`=?,`imagem`=?,`valor`=?,`tag`=?,`status`=? WHERE `codigo`=?;";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->titulo);
    $stmt->bindValue(2,$this->categoria);
    $stmt->bindValue(3,$this->subcategoria);
    $stmt->bindValue(4,$this->descricao);
    $stmt->bindValue(5,$this->imagem);
    $stmt->bindValue(6,$this->valor);
    $stmt->bindValue(7,$this->tag);
    $stmt->bindValue(8,$this->status);  
    $stmt->bindValue(9,$this->codigo);  
    if($stmt->execute()){
      return 'Atualizado';
    }else{
      return 'Erro ao atualizar';
    }   
  }
  public function displayCategories(){
    $sql = "SELECT * FROM categorias";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $resultado;

    }else{
      return [];
    }
  }

  public function displaySubCategories(){
    $sql = "SELECT * FROM subcategorias";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
      $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $resultado;

    }else{
      return [];
    }
  }
}