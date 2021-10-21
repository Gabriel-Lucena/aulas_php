<?php

session_start();

/* Conexão com o banco de dados */

require('../database/conexao.php');

/* Função de validação */

function validaCampos()
{

    /* Vetor de mensagens de erro */

    $erros = [];

    /* Conexão com o banco de dados */

    if ($_POST["descricao"] == "" || !isset($_POST["descricao"])) {

        $erros[] = "O campo descrição é um campo obrigatório";
    }

    /* Validação de peso */

    if ($_POST["peso"] == "" || !isset($_POST["peso"])) {

        $erros[] = "O campo peso é um campo obrigatório";
    } elseif (!is_numeric(str_replace(",", ".", $_POST["peso"]))) {

        $erros[] = "O campo peso deve ser um número";
    }

    /* Validação de quantidade */

    if ($_POST["quantidade"] == "" || !isset($_POST["quantidade"])) {

        $erros[] = "O campo quantidade é um campo obrigatório";
    } elseif (!is_numeric(str_replace(",", ".", $_POST["quantidade"]))) {

        $erros[] = "O campo quantidade deve ser um número";
    }

    /* Validação de cor */

    if ($_POST["cor"] == "" || !isset($_POST["cor"])) {

        $erros[] = "O campo cor é um campo obrigatório";
    }

    /* Validação de tamanho */

    if ($_POST["tamanho"] == "" || !isset($_POST["tamanho"])) {

        $erros[] = "O campo tamanho é um campo obrigatório";
    }

    /* Validação de ação */

    if ($_POST["valor"] == "" || !isset($_POST["valor"])) {

        $erros[] = "O campo valor é um campo obrigatório";
    } elseif (!is_numeric(str_replace(",", ".", $_POST["valor"]))) {

        $erros[] = "O campo valor deve ser um número";
    }

    /* Validação de desconto */

    if ($_POST["desconto"] == "" || !isset($_POST["desconto"])) {

        $erros[] = "O campo desconto é um campo obrigatório";
    } elseif (!is_numeric(str_replace(",", ".", $_POST["desconto"]))) {

        $erros[] = "O campo desconto deve ser um número";
    }

    /* Validação de categoria */

    if ($_POST["categoria"] == "" || !isset($_POST["categoria"])) {

        $erros[] = "O campo categoria é um campo obrigatório";
    }

    /* Validação de imagem */

    if ($_FILES["foto"]["error"] == UPLOAD_ERR_NO_FILE) {

        $erros[] = "O arquivo precisa ser uma imagem";
    } else {

        $imagemInfos = getimagesize($_FILES["foto"]["tmp"]);

        if ($_FILES["fotos"]["size"] > 1024 * 1024 * 2) {

            $erros[] = "O arquivo não pode ser maior que 2MB";
        }

        $width = $imagemInfos[0];
        $height = $imagemInfos[1];

        if ($width != $height) {

            $erros[] = "A imagem precisa ser quadradona";
        }
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

        $erros = validaCampos();

        if (count($erros) > 0) {

            $_SESSION["erros"] = $erros;

            header("location: novo/index.php");

            exit;
        }

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

        /* Redirecionar para index.html */

        header('location: index.php');

        break;

    case 'deletar':

        $produtoId = $_POST['produtoId'];
        
        $sql = "SELECT imagem FROM tbl_produto WHERE id = $produtoId";
        
        $resultado = mysqli_query($conexao, $sql);
        
        $produto = mysqli_fetch_array($resultado);
        
        $sql = "DELETE FROM tbl_produto WHERE id = $produtoId";

        $resultado = mysqli_query($conexao, $sql);

        unlink("./fotos/" . $produto["imagem"]);

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
