<?php

class Oferta {
 private $db;
 private $query;

 public function __construct() {
   $this->db = Database::make(DATABASE);
   $this->query = new QueryBuilder( $this->db);
 }

 public function filter($field, $value) {
    return $this->query->selectByValue('productos', $field, $value);
  }
}