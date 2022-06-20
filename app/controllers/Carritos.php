<?php

class Carritos extends Controller
{

  public function __construct()
  {
    $this->cartModel = $this->model('Carrito');
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

      $cart = $this->cartModel->add($data);

      $productos = $this->productModel->filter();

      $data = ['productos' => $productos];

      $this->view('productos/index', $data);
    } else {
      $productos = $this->productModel->filter();

      $data = ['productos' => $productos];

      $this->view('productos/index', $data);
    }
  }

  public function productExist($id)
  {
    $exist = $this->cartModel->filter('id_tenis', 'id_cliente', $id, $_SESSION['user_id']);

    if ($exist) {
      return true;
    } else {
      return false;
    }
  }
}
