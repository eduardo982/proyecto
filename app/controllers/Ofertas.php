<?php

class Ofertas extends Controller
{

  public function __construct()
  {
    $this->ofertModel = $this->model('Oferta');
  }


  public function index()
  {
    $productos = $this->ofertModel->filter('sale',1);

    $data = ['productos' => $productos];

    /* print_r($productos);
    die(); */

    $this->view('ofertas/index', $data);
  }
}
