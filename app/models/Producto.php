<?php

class Producto {
 private $db;
 private $query;

 public function __construct() {
   $this->db = Database::make(DATABASE);
   $this->query = new QueryBuilder( $this->db);
 }

 public function all() {
    return $this->query->selectAll('productos', 'Productos');
   }

   public function filter() {
    return $this->query->selectByValue('productos', 'sale', 0);
   }
}