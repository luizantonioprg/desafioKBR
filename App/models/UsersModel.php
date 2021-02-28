<?php

require_once '../../App/router/MODEL_BASE.php';
class UsersModel extends Model{
    public function read(){
      $sql = "SELECT * FROM usuarios";
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
      $sql = "INSERT INTO `usuarios`(`nome`, `email`, `senha`, `privilegio`) VALUES (?,?,?,?);";
      $stmt = Model::conectarBanco()->prepare($sql);
      $stmt->bindValue(1,$this->nome);
      $stmt->bindValue(2,$this->email);
      $stmt->bindValue(3,$this->senha);
      $stmt->bindValue(4,$this->privilegio);

  
  
      if($stmt->execute()){
        return 'Cadastrado';
      }else{
        return 'Erro';
      }
    }
    public function update(){
      $sql = "UPDATE `usuarios` SET `nome`=?,`senha`=?,`privilegio`=? WHERE `email`=?;";
      $stmt = Model::conectarBanco()->prepare($sql);
      $stmt->bindValue(1,$this->nome);
      $stmt->bindValue(2,$this->senha);
      $stmt->bindValue(3,$this->privilegio);
      $stmt->bindValue(4,$this->email);

 
      if($stmt->execute()){
        return 'Atualizado';
      }else{
        return 'Erro ao atualizar';
      }   
    }
    public function delete($emailDeletar){

      $sql = "DELETE FROM `usuarios` WHERE email = ?";
      $stmt = Model::conectarBanco()->prepare($sql);
      $stmt->bindValue(1,$emailDeletar);   
  
      if($stmt->execute()){
        return 'Deletado';
      }else{
        return 'Erro';
      }
    }
}