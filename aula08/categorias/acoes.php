<?php

session_start();

/* Conexão com o banco de dados */

require('../database/conexao.php');

/* Função de validação */

function validaCampos()
{

    $erros = [];

    if (!isset($_POST['descricao']) || $_POST['descricao'] == "") {

        $erros[] = "O campo descrição é de preenchimento obrigatório";
    }

    return $erros;
}

/*
Tratamento dos dados vindos do formulário:

    - Tipos da ação
    - Execução dos processos da ação solicitada

*/

switch ($_POST["acao"]) {
    case 'inserir':

        /* Chamada da função de validação de erros: */

        $erros = validaCampos();
        
        /* Verificar se existem erros: */

        if (count($erros) > 0) {

            $_SESSION["erros"] = $erros;

            header("location: index.php");

            exit();
        }

        $descricao = $_POST['descricao'];

        /* 
            Motangem da instrução sql de inserção de dados:
        */

        $sql = "INSERT INTO tbl_categoria (descricao) VALUES ('$descricao')";

        /* 
            Retornando um resultado:

            mysqli_query() parâmetros:

            1 - Uma conexão aberta e válida
            2 - Uma instrução sql válida
        */

        $resultado = mysqli_query($conexao, $sql);

        header('location: ./index.php');

        echo '<pre>';
        var_dump($resultado);
        echo '<pre>';

        break;

    case 'deletar':

        $categoriaId = $_POST['categoriaId'];

        $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaId";

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    default:
        # code...
        break;
}
