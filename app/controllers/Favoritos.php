<?php

class Favoritos extends Controller
{

  public function __construct()
  {
    $this->favModel = $this->model('Favorito');
    $this->productModel = $this->model('Producto');
  }

  public function index()
  {
    echo "Desde el index de carrito";
  }

  public function add($id)
  {
    $exist = $this->productExist($id);

    if (!$exist) {
      $cl = $_SESSION['user_id'];
      $data = [
        'id_tenis' => $id,
        'id_cliente' => $cl
      ];

      $wish = $this->favModel->add($data);

      $productos = $this->productModel->filter();

      $data = ['productos' => $productos];

      $this->view('productos/index', $data);
    } else {
      $productos = $this->productModel->filter();

      $data = ['productos' => $productos];

      $this->view('ofertas/index', $data);
    }
  }

  public function productExist($id)
  {
    $exist = $this->favModel->filter('id_tenis', 'id_cliente', $id, $_SESSION['user_id']);
    
    if ($exist) {
      return true;
    } else {
      return false;
    }
  }
}
