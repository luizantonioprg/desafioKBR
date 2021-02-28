<?php

require_once '../../App/router/MODEL_BASE.php';
class CategoriesModel extends Model{
  public function read(){
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

  public function create(){
    $sql = "INSERT INTO `categorias`(`codigo`, `titulo`) VALUES (?,?);";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->codigo);
    $stmt->bindValue(2,$this->titulo);

    if($stmt->execute()){
      return 'Cadastrado';
    }else{
      return 'Erro';
    }
	}
  public function update(){
    $sql = "UPDATE `categorias` SET `titulo`=? WHERE `codigo`=?;";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->titulo); 
    $stmt->bindValue(2,$this->codigo);  
    if($stmt->execute()){
      return 'Atualizado';
    }else{
      return 'Erro ao atualizar';
    }   
  }

  public function delete($codigo){
    $sql = "DELETE FROM `categorias` WHERE codigo = ?";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$codigo);   

    if($stmt->execute()){
      return 'Deletado';
    }else{
      return 'Erro';
    }
  }
}