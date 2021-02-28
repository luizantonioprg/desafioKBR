<?php

require_once '../../App/router/MODEL_BASE.php';
class ApiModel extends Model{
	public function showProducts(){
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


}