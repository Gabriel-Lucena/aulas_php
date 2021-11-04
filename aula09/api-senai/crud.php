<?php

/* Importação do arquivo de conexão */

include('connection.php');

/* Função de leitura de dados (sem critérios) */

function read($conexao)
{

    $sql = "SELECT * FROM tbl_pessoa";

    if ($resultado = mysqli_query($conexao, $sql)) {

        $dados = mysqli_fetch_all($resultado);
        echo json_encode(array("status" => "Success", "data" => $dados));
    } else {
        echo json_encode(array("status" => "Error", "data" => mysqli_error($conexao)));
    }
}
