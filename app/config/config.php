<?php

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://localhost/cart');
define('SITENAME', 'Shoes-Cart');

define('DATABASE', [
  'name' => 'tienda',
  'username' => 'root',
  'password' => '',
  'connection' => 'mysql:host=127.0.0.1',
  'options' => [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  ]
]);