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

        /* Tratamento da imagem para upload */

        /* Recupera o nome do arquivo */

        $nomeDoArquivo = $_FILES["foto"]["name"];

        /* Recupera a extensão do arquivo */

        $extensao = pathinfo($nomeDoArquivo, PATHINFO_EXTENSION);

        /* Definir um novo nome para o arquivo */

        $novoNome = md5(microtime()) . "." . $extensao;

        // var_dump($nomeDoArquivo);
        // echo '<pre>';
        // var_dump($novoNome);
        // echo '<pre>';

        /* Upload do arquivo */

        move_uploaded_file($_FILES["foto"]["tmp_name"], "./fotos/$novoNome");


        /* Inserção de dados na base de dados do MySQL */

        /* Recebimento dos dados: */

        $produto = array(

            $_POST["descricao"],
            $_POST["peso"],
            $_POST["quantidade"],
            $_POST["cor"],
            $_POST["tamanho"],
            $_POST["valor"],
            $_POST["desconto"],
            $novoNome,
            $_POST["categoria"]

        );

        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho = $_POST["tamanho"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];
        $categoriaId = $_POST["categoria"];


        /* Criação da instrução sql de inserção */

        $sql = "INSERT INTO tbl_produto
        
        (descricao, peso, quantidade, cor, tamanho, valor, desconto, imagem, categoria_id)
        VALUES ('$descricao', $peso, '$quantidade', '$cor', '$tamanho', $valor, $desconto, '$novoNome', $categoriaId)
        
        ";

        $sql = "INSERT INTO tbl_produto
        
               ( descricao,    peso,          quantidade,    cor,           tamanho,      valor,       desconto,     imagem,       categoria_id)
        VALUES ('$produto[0]', $produto[1] , '$produto[2]', '$produto[3]', '$produto[4]', $produto[5], $produto[6], '$produto[7]', $produto[8])

        ";

        /* Execução do SQL de inserção */

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    case 'deletar':

        $categoriaId = $_POST['categoriaId'];

        $sql = "DELETE FROM tbl_categoria WHERE id = $categoriaId";

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    case 'editar':

        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE tbl_categoria SET descricao = '$descricao' where id = $id";

        $resultado = mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    default:
        # code...
        break;
}
