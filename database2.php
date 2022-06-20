<?php

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'tienda');

    if (!$db) {
        echo 'no se pudo conectar';
        exit;
    }

    return $db;
}