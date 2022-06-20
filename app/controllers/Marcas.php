<?php

class Marcas extends Controller
{

  public function __construct()
  {
    $this->marcaModel = $this->model('Marca');
  }


  public function index()
  {
    $marcas = $this->marcaModel->all();

    $data = ['marcas' => $marcas];

    /* print_r($productos);
    die(); */

    $this->view('marcas/index', $data);
  }
}
