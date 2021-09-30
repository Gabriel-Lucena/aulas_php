<?php

/* Conexão com o banco de dados */

require('../database/conexao.php');

/*
Tratamento dos dados vindos do formulário:

    - Tipos da ação
    - Execução dos processos da ação solicitada

*/

switch ($_POST['acao']) {
    case 'inserir':
        
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
    
    default:
        # code...
        break;
}




?>