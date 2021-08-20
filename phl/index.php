<style>
    body {

        display: flex;
        align-items: center;
        justify-content: center;

    }
</style>

<?php

if (isset($_REQUEST["cidadeDeOrigem"]) && isset($_REQUEST["cidadeDeDestino"]) && isset($_REQUEST["distancia"]) && isset($_REQUEST["quantidadeDePedagios"])) {

    $cidadeDeOrigem = $_REQUEST["cidadeDeOrigem"];
    $cidadeDeDestino = $_REQUEST["cidadeDeDestino"];
    $distancia = $_REQUEST["distancia"];
    $quantidadeDePedagios = $_REQUEST["quantidadeDePedagios"];
    $valorDaViagem = ($distancia * 6) + ($quantidadeDePedagios * 9.4);
    $valorDaViagem = number_format(round($valorDaViagem, 2), 2, ',', '.');
    echo "<h1> A viagem de $cidadeDeOrigem à $cidadeDeDestino irá custasr o valor total de R$ <em style = ' color : tomato; font-size : 7vh'>$valorDaViagem</em>.</h1>";
} else {

    echo "<h1>Preencha os campos de maneira correta!!!</h1>";
    die;
}

// comentário teste

// segundo comentário teste