<?php

$raiz = "/Gabriel/aula_php/aula08";

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

/*

    Função de realizar login:

        Realiza o login.

    Parâmetros:

    1 - Usuário do form
    2 - Senha vindo do form
    3 - Dados do arquivo .json do usuário e senha

*/

function realizarLogin($usuario, $senha, $dados)
{

    foreach ($dados as $dado) {

        if ($dado->usuario == $usuario && $dado->senha == $senha) {

            // Variáveis de sessão:

            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: aa.php');
            exit;
        }
    }

    header('location: index.php');
}

/*

    Função de verificar login:
    
        Verifica se o usuário passou pelo processo de login.

*/

function verificarLogin()
{

    if ($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))) {

        header('location: index.php');
    }
}

/*

    Função de finalização de login:
    
        Finalização de login.

*/

function finalizarLogin()
{

    // Destrói todas as variáveis.
    session_unset();
    // Destrói a sessão.
    session_destroy();

    header('location: index.php');
}
