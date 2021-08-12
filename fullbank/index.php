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

    if ($salario > 5000) {

        $salario = $salario * (100 + 10) / 100 ;
       

        echo "<h1> O $nomeCompletoDoFuncionario passará a receber R$ $salario, no cargo de $cargos.</h1>";

    } else {
        
        $salario = $salario * (100 + 20) / 100 ;
       

        echo "<h1> O $nomeCompletoDoFuncionario passará a receber R$ $salario, no cargo de $cargos.</h1>";

    }

    } else {

        echo "<h1>Preencha os campos corretamente!!!</h1>";
        
    }