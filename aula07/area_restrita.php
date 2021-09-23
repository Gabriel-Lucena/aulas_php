<?php

session_start();

require_once('./funcoes.php');

//  Recebendo os dados .json - 1º forma:

// $dados = lerArquivo('dados/usuarios.json');

// Teste:

// var_dump($dados);exit;

// realizarLogin('a', 'a', $dados);

// Recebendo os dados .json - 2º forma:

// realizarLogin('a','a',lerArquivo('./dados/usuarios.json'));

// Verificando os dados de variáveis de sessão:

// echo 'NOME USUÁRIO: ' . $_SESSION["usuario"] . '<br>';
// echo 'ID SESSÃO: ' . $_SESSION["id"] . '<br>';

verificarLogin();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÁREA RESTRISTA</title>
</head>

<body>

    <h1>Tabela</h1>

</body>

</html>