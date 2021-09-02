<?php

$linguagemPreferida = "Java";
$sabePOO = false;


/**
 * OPERADORES LÓGICOS
 * == igual
 * != diferente
 * > maior
 * < menor
 * >= maior ou igual
 * <= menor ou igual
 * ! NOT
 * && (and) e
 * || (or) ou
 */

// estrutura condiconal if

if($linguagemPreferida == "java" || $linguagemPreferida == "Java" && $sabePOO == true) {
    echo "Você é um javeiro, o professor Celso gostou disso";
} else {
    echo "Você não é um javeiro";
}

// Estrutura switch (escolha)

echo "<br><br>";

$opcao = 2;

switch($opcao) {
    case 1:
        echo "Você escolheu a opção 1.";
        break;
    case 2:
        echo "Você escolheu a opção 2.";
        break;
    case 3:
        echo "Você escolheu a opção 3.";
        break;
    default:
        echo "Você não escolheu nenhuma opção válida.";
        break;
};

$salarioEstagiario = 1200;
$salarioJunior = 2200;
$salarioPleno = 4500;
$salarioSenior = 10000;

$mediaSalarial = ($salarioEstagiario + $salarioJunior + $salarioPleno + $salarioSenior) / 4 ;

echo "A média salarial é: $mediaSalarial";

echo "<br>";


// Estruturas de repetição (laços e loops)

$cont = 0;

while ($cont < 5) {

    echo "O cont é: $cont <br> <br>";
    $cont++;

}

for ($cont = 0; $cont < 5; $cont++) {

    echo "O cont é: $cont <br> <br>";
}

$cont = 0;

do {

    echo "O cont é: $cont <br>";

} while ($cont > 0);







