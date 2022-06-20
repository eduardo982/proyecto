<?php

class QueryBuilder {
  protected $pdo;

  public function __construct(PDO $pdo) {
    $this->pdo = $pdo;
  }

  public function selectAll($table, $inToClass) {
    $statement = $this->pdo->prepare("select * from {$table}");
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $statement->fetchAll(PDO::FETCH_OBJ);
    // Obtener todos los registros y enviarlos a una clase
    //return $statement->fetchAll(PDO::FETCH_CLASS, 'Alumno');
    //return $statement->fetchAll(PDO::FETCH_CLASS, $inToClass);
  }

  public function selectByValue($table, $field, $value){
    $statement = $this->pdo->prepare("select * from {$table} where {$field} = :value ");
    $statement->bindParam(':value', $value);
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectByValue2($field, $table, $field2, $value){
    $statement = $this->pdo->prepare("select {$field} from {$table} where {$field2} = :value ");
    $statement->bindParam(':value', $value);
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function selectProduct($table, $field, $field2, $value, $value2){
    $statement = $this->pdo->prepare("select * from {$table} where {$field} = :value AND {$field2} = :value2");
    $statement->bindParam(':value', $value);
    $statement->bindParam(':value2', $value2);
    $statement->execute();
    // Obtener todos los registros y mostrarlos como un objeto
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function insert($table, $data) {
    $strData = implode(",", array_keys($data));
    $keysName = array_keys($data);
    $strBind = [];
    foreach ($keysName as $key => $value) {
      $strBind[$key] = ":".$value;
    }
    $strValues = implode(",", $data);
    $xBind = implode(",", $strBind);

    $statement = $this->pdo->prepare(
                  "INSERT INTO {$table}
                  ({$strData})
                  VALUES ({$xBind})"
                );

    $i=0;            
    foreach ($strBind as $key => $value) {
      $statement->bindParam($value, $data[$keysName[$i]]);
      $i++;
    }
    
    if($statement->execute()) {
      return true;
    } else {
      return false;
    }
  }
}