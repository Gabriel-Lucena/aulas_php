<style>
    body {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }
</style>

<?php

if(isset($_REQUEST["nomeCompletoDoFuncionario"]) && isset($_REQUEST["salario"]) && isset($_REQUEST["cargos"])) {
 
    $nomeCompletoDoFuncionario = $_REQUEST["nomeCompletoDoFuncionario"];
    $salario = $_REQUEST["salario"];
    $cargos = $_REQUEST["cargos"];

    $salario += $salario * 0.5;

    echo "<h1> O $nomeCompletoDoFuncionario agora receberá $salario.</h1>";

    } else {

        echo "<h1>Preencha os campos corretamente!!!</h1>";
        
    }
