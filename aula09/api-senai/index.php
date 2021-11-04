<?php

    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Headers: *");
    header("Acess-Control-Allow-Methods: GET, POST");
    header("Content-Type: application/json");

    include('connection.php');
    include('crud.php');

    /* Recupera o tipo de ação da requisição */

    $acao = $_REQUEST["acao"];

    /* Criação das rotas */

    /* Rota do read */

    if ($acao == "read") {

        read($conexao);
    }
