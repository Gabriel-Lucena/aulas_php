<?php

$alunos = [

    "1" => [
        "nome" => "Maria",
        "idade" => 16,
        "nota" => 85
    ],

    "2" => [
        "nome" => "Artur",
        "idade" => "16",
        "nota" => 92
    ],

    "3" => [
        "nome" => "Gustavo",
        "idade" => 16,
        "nota" => 80
    ],

    "4" => [
        "nome" => "Isabela",
        "idade" => 17,
        "nota" => 95
    ]

    ];

// Imprimir na tela a média das notas de todos os alunos

// Primeira ideia

$media = ( $alunos["1"]["nota"] + $alunos["2"]["nota"] + $alunos["3"]["nota"] + $alunos["4"]["nota"] ) / 4;

echo "A média das notas é: " . $media;

echo "<br>";

// Segunda ideia

$media_2 = 0;

foreach ($alunos as $aluno) {

    $media_2 = $media_2 + $aluno["nota"] / count($alunos);

};

echo "A média das notas é: " . $media_2;

echo "<br>";


// Terceira ideia

function media_elegante(array $vetor,string $parametro_do_vetor) {

    $soma = 0;

    foreach ($vetor as $chave) {

        $soma = $soma + $chave[$parametro_do_vetor] / count($vetor);
    
    };

    return $soma;
}


echo "A média das notas é: " . media_elegante($alunos, "nota");

echo "<br>";

// // // // Qual é o aluno com chave 4?

// echo $alunos["4"]["nome"];

// // // // Soma da nota do aluno 1 e 3

// echo $aluno["1"]["nota"] + $alunos["3"]["nota"];


