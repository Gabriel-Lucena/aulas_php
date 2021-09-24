<?php

// Inicializa a sessão para o processo de login:
session_start();

// Importação do arquivo de funções:
require("./funcoes.php");

// Recebendo os dados do formulário:

if (isset($_POST["txt_usuario"]) || isset($_POST["txt_senha"])) {

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

    realizarLogin($usuario, $senha, lerArquivo("./dados/usuarios.json"));
} else if ($_GET["logout"]) {

    finalizarLogin();
}


realizarLogin($_POST["txt_usuario"], $_POST["txt_senha"], lerArquivo("./dados/usuarios.json"));
