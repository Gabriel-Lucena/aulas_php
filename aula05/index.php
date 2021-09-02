<?php


require("./alunos.php");
require("./funcoes.php");

if (isset($_GET["novaNota"])) {

    $nome = $_GET["nomeAluno"];
    $nota = $_GET["novaNota"];
    alterarNota($alunos, $nome, $nota);
    fecharNotasAlunos($alunos);
}



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <script src="./script.js" defer></script>
    <title>Nota dos alunos</title>
</head>

<body>
    <section>
        <h1>Tabela de notas:</h1>

        <table>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Nota</th>
                <th>Situação</th>
            </tr>

            <?php

            foreach ($alunos as $aluno) {

                $aaa = "";

                if ($aluno["nota"] >= 50) {

                    $class = "aprovado";
                    $aaa = "Aprovado";
                } else {

                    $class = "reprovado";
                    $aaa = "Reprovado";
                }

            ?>
                <tr onclick="showFormNota('<?= $aluno["nome"] ?>')">
                    <th><?= $aluno["nome"] ?></th>
                    <th><?= $aluno["idade"] ?></th>
                    <th><?= $aluno["nota"] ?></th>
                    <th class="<?= "$class" ?>"> <?=

                                                    $aaa;

                                                    ?>
                    </th>
                </tr>

            <?php

            }

            ?>

        </table>

    </section>
    <div class="container-form-nota">
        <form>
            <input type="number" name="novaNota" placeholder="Digite a nova nota" />
            <input type="hidden" id="nomeAluno" name="nomeAluno" />
            <button>Alterar</button>
        </form>
    </div>


</body>

</html>