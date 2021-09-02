<?php

function CalcularMedia($turma) {
    $soma = 0;
    $qtde_alunos = 0;

    foreach ($turma as $aluno) {

        $soma = $soma + $aluno["nota"];

    }

    $media = $soma / count($turma);

    return $media;

}

function maiorNota(array $turma) {
    
    $melhorAluno = null;

    foreach ($turma as $aluno) {

        if($melhorAluno == null) {

            $melhorAluno = $aluno;

        }elseif ($aluno["nota"] > $melhorAluno["nota"]) {

            $melhorAluno = $aluno;
        }
    }

    return $melhorAluno;
}

function alterarNota(array &$turma, $nome_do_aluno, $nova_nota) {

    foreach($turma as $chave => $aluno) {

        if ($aluno["nome"] == $nome_do_aluno) {

            $turma[$chave]["nota"] = $nova_nota;
            return;

        }

    }

}

function fecharNotasAlunos(array &$turma) {

    foreach($turma as $chave => $aluno) {

        if($aluno["nota"] >= 50 ) {

            $turma[$chave]["situacao"] = "Aprovado";

        } else {

            $turma[$chave]["situacao"] = "Desaprovado";
        }

    }

}

$alunosTurmaA = [

    "1" => [
        "nome" => "Maria",
        "idade" => 16,
        "nota" => 85,
        "sitaucao" => null
    ],

    "2" => [
        "nome" => "Artur",
        "idade" => "16",
        "nota" => 85.1,
        "sitaucao" => null
    ],

    "3" => [
        "nome" => "Gustavo",
        "idade" => 16,
        "nota" => 80,
        "sitaucao" => null
    ],

    "4" => [
        "nome" => "Isabela",
        "idade" => 17,
        "nota" => 1,
        "sitaucao" => null
    ]

];


$alunosTurmaB = [

    "1" => [
        "nome" => "Kelly",
        "idade" => 16,
        "nota" => 45
    ],

    "2" => [
        "nome" => "Paulo",
        "idade" => "16",
        "nota" => 36
    ],

    "3" => [
        "nome" => "Gabriel",
        "idade" => 16,
        "nota" => 80
    ],

    "4" => [
        "nome" => "Mateus",
        "idade" => 17,
        "nota" => 95
    ],

    "5" => [
        "nome" => "Bruna",
        "idade" => 16,
        "nota" => 45
    ]

];