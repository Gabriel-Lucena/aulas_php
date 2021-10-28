<?php

// Inicializa a sessão para o processo de login:

session_start();

require('../database/conexao.php');

$sql = "SELECT * FROM tbl_administrador";

$retorno = mysqli_query($conexao, $sql);

$vetor = mysqli_fetch_array($retorno);

// Importação do arquivo de funções:

// require("./funcoes.php");

// Recebendo os dados do formulário:

function realizarLogin($usuario, $senha, $conexao)
{
    $sql = "SELECT * FROM tbl_administrador
            WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    $vetor = mysqli_fetch_array($resultado);

    if ($vetor != null) {

        echo "O";
    } else {

        echo "Ladrão";
    }
}



if (isset($_POST["usuario"]) || isset($_POST["senha"])) {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    realizarLogin($usuario, $senha, $conexao);
} else if ($_GET["logout"]) {

    finalizarLogin();
}


realizarLogin($_POST["usuario"], $_POST["senha"], $conexao);
