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

    /* Rota do create */

    if ($acao == "create") {

        $nome = $_REQUEST["nome"];
        $sobrenome = $_REQUEST["sobrenome"];
        $email = $_REQUEST["email"];
        $celular = $_REQUEST["celular"];
        $fotografia = $_REQUEST["fotografia"];

        create($nome, $sobrenome, $email, $celular, $fotografia, $conexao);
    }

