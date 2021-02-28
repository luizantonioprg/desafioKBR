<?php

require_once '../../App/router/MODEL_BASE.php';
class SubCategoriesModel extends Model{


  public function read(){
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

  public function create(){

    $sql = "INSERT INTO `subcategorias`(`codigo`, `categoria`,`titulo`) VALUES (?,?,?);";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->codigo);
    $stmt->bindValue(2,$this->categoria);
    $stmt->bindValue(3,$this->titulo);
    
    if($stmt->execute()){
      return 'Cadastrado';
    }else{
      return 'Erro';
    }
	}
  public function delete($subCategoriaDeletar){

    $sql = "DELETE FROM `subcategorias` WHERE codigo = ?";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$subCategoriaDeletar);   

    if($stmt->execute()){
      return 'Deletado';
    }else{
      return 'Erro';
    }
  }

  public function update(){
    $sql = "UPDATE `subcategorias` SET `categoria`=?,`titulo`=? WHERE `codigo`=?;";
    $stmt = Model::conectarBanco()->prepare($sql);
    $stmt->bindValue(1,$this->categoria);
    $stmt->bindValue(2,$this->titulo);
    $stmt->bindValue(3,$this->codigo);


    if($stmt->execute()){
      return 'Atualizado';
    }else{
      return 'Erro ao atualizar';
    }   
  }
}