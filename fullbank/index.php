<style>
    body {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }
</style>

<?php

if (isset($_REQUEST["nomeCompletoDoFuncionario"]) && isset($_REQUEST["salario"]) && isset($_REQUEST["cargos"]) && isset($_REQUEST["genero"])) {

    $nomeCompletoDoFuncionario = $_REQUEST["nomeCompletoDoFuncionario"];
    $salario = $_REQUEST["salario"];
    $cargos = $_REQUEST["cargos"];

    $salarioNovo = $salario > 5000 ? $salario * 1.1 : $salario * 1.2;

    echo "<h1>O $nomeCompletoDoFuncionario passará a receber R$ $salarioNovo, no cargo de $cargos.</h1>";   

} else {

    echo "<h1>Preencha os campos corretamente!!!</h1>";
    die;
}
