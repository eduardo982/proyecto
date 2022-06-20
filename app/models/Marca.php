<?php

class Marca {
 private $db;
 private $query;

 public function __construct() {
   $this->db = Database::make(DATABASE);
   $this->query = new QueryBuilder( $this->db);
 }

 public function all() {
    return $this->query->selectAll('marcas', 'Marcas');
   }
}