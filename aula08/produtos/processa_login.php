<?php

// Inicializa a sessão para o processo de login:

session_start();

require('../database/conexao.php');

$sql = "SELECT * FROM tbl_administrador";

$retorno = mysqli_query($conexao, $sql);

$vetor = mysqli_fetch_array($retorno);

// Recebendo os dados do formulário:

function verificarLogin()
{

    if ($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))) {

        header('location: ../index.php');
    }
}


function realizarLogin($usuario, $senha, $conexao)
{
    $sql = "SELECT * FROM tbl_administrador
            WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    $vetor = mysqli_fetch_array($resultado);

    if ($vetor != null) {

        $_SESSION["usuario"] = $usuario;
        $_SESSION["id"] = session_id();
        $_SESSION["data_hora"] = date('d/m/Y - h:i:s');
        // header('location: ./index.php');
        echo "logado";

        echo $_SESSION["usuario"];
        echo $_SESSION["id"];
        echo $_SESSION["data_hora"];

    } else {

        echo $_SESSION["usuario"];
        echo $_SESSION["id"];
        echo $_SESSION["data_hora"];

        echo "Ladrão";

        session_destroy();
        // header("location: ./index.php");
    }
}


realizarLogin($_POST["usuario"], $_POST["senha"], $conexao);
