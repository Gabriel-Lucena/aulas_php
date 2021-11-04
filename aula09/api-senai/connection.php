<?php

    $servername = 'localhost';
    $username = 'root';
    $password = 'bcd127';
    $database = 'cadastro';

    $conexao = new mysqli($servername, $username, $password, $database);

    // echo '<pre>';
    // var_dump($conexao);
    // echo '<pre>';


    if ($conexao->connect_error) {
        die("Connection error:" . $conn->connect_error);
    }

    return $conexao;

?>