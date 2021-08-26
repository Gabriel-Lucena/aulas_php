<?php


if (isset($_REQUEST["nomeCompletoDoFuncionario"]) && isset($_REQUEST["salario"]) && isset($_REQUEST["cargos"]) && isset($_REQUEST["genero"])) {

    $nome = $_REQUEST["nomeCompletoDoFuncionario"];
    $salario = $_REQUEST["salario"];
    $genero = $_REQUEST["genero"];
    $cargo = $_REQUEST["cargos"];

    // if ($salario > 5000) {

    //     $salario = $salario * (100 + 10) / 100;

    // } else {

    //     $salario = $salario * (100 + 20) / 100;

    // }

    $salarioNovo = $salario > 5000 ? $salario * 1.1 : $salario * 1.2;
} else {

    die("<main><h1>Preencha os campos corretamente!!!</h1></main>");
}


?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular salário:</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <p><?= $genero === 'masc' ? "O" : ($genero === "fem" ? "A" : "") ?> <?= $nome ?> passará a receber R$ <?= number_format(round($salarioNovo, 2), 2, ",", ".") ?>, no caro de <?= $cargo ?>.</p>

</body>

</html>