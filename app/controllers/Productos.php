<?php

class Productos extends Controller
{

  public function __construct()
  {
    $this->productModel = $this->model('Producto');
  }


  public function index()
  {
    
    $productos = $this->productModel->filter();

    $data = ['productos' => $productos];

    /* print_r($productos);
    die(); */

    $this->view('productos/index', $data);
  }
}
