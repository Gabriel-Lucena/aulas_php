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

/* Função de leitura de dados (com critérios) */

function readID($cod_pessoa, $conexao)
{

    $sql = "SELECT *FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    if ($resultado = mysqli_query($conexao, $sql)) {

        $dados = mysqli_fetch_all($resultado);

        echo json_encode(array("status" => "Success", "data" => $dados));
    } else {

        echo json_encode(array("status" => "Error", "data" => mysqli_error($conexao)));
    }
}

/* Função de inserção */

function create($nome, $sobrenome, $email, $celular, $fotografia, $conexao)
{

    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia)

        VALUES ('$nome','$sobrenome','$email','$celular','$fotografia')";

    if (mysqli_query($conexao, $sql)) {
        echo json_encode(array("status" => "Sucess", "data" => "Dados inseridos com sucesso"));
    } else {
        echo json_encode(array("status" => "Error", "data" => "Erro ao inserir os dados"));
    }
}

/* Função de atualização */

function update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $conexao)
{

    $sql = "UPDATE tbl_pessoa SET
        nome = '$nome',
        sobrenome =  '$sobrenome',
        email = '$email',
        celular = '$celular',
        fotografia = '$fotografia'
        WHERE cod_pessoa = '$cod_pessoa'";

    if (mysqli_query($conexao, $sql)) {
        echo json_encode(array("status" => "Sucess", "data" => "Dados alterados com sucesso"));
    } else {
        echo json_encode(array("status" => "Error", "data" => mysqli_error($conexao)));
    }
}

/* Função de exclusão */

function delete($cod_pessoa, $conexao)
{
    $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = '$cod_pessoa'";

    if (mysqli_query($conexao, $sql)) {
        echo json_encode(array("status" => "Sucess", "data" => "Dados excluídos com sucesso"));
    } else {
        echo json_encode(array("status" => "Error", "data" => mysqli_error($conexao)));
    }
}
