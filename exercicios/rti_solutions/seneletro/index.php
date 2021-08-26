<style>
    body {

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }
</style>

<?php

if (isset($_REQUEST["nomeCompletoDoCliente"]) && isset($_REQUEST["endereco"]) && isset($_REQUEST["quilowattHora"])) {

    $nomeCompletoDoCliente = $_REQUEST["nomeCompletoDoCliente"];
    $endereco = $_REQUEST["endereco"];
    $quilowattHora = $_REQUEST["quilowattHora"];

    if ($quilowattHora < 120) {

        $totalAPagar = $quilowattHora * 0.32;

        echo "<h1>Conta de luz de $nomeCompletoDoCliente</h1>";
        echo "<br>";
        echo "<h1>$endereco</h1>";
        echo "<h1 style = 'color:green'>Consumo: $quilowattHora kWh</h1>";
        echo "<h1>Valor a pagar: R$ $totalAPagar</h1>";
        echo "<h1>Obrigado por economizar!</h1>";
    } else {

        $totalAPagar = $quilowattHora * 0.42;

        echo "<h1>Conta de luz de $nomeCompletoDoCliente</h1>";
        echo "<h1>$endereco</h1>";
        echo "<h1 style = 'color:red'>Consumo: $quilowattHora kWh</h1>";
        echo "<h1>Valor a pagar:</h1>";
        echo "<h1 style = 'font-size: 100px'>R$ $totalAPagar</h1>";
    }
} else {

    echo "<h1>Preencha os campos de maneira correta!!!</h1>";
    die;
}
