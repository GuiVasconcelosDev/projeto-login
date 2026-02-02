<?php
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'sistema_login';

    $mysqli = new mysqli($host, $usuario, $senha, $banco);

    //verficando se houve erro
    if ($mysqli->connect_error) {
        die("Falha ao conectar: " . $mysqli->connect_error);
    }
?>