<?php

class Favorito
{
  private $db;
  private $query;

  public function __construct()
  {
    $this->db = Database::make(DATABASE);
    $this->query = new QueryBuilder($this->db);
  }

  public function add($data)
  {
    return $this->query->insert('wishlist', $data);
  }

  public function filter($field, $field2, $value, $value2) {
    return $this->query->selectProduct('wishlist', $field, $field2, $value, $value2);
  }
}
