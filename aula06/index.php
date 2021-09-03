<?php

require("./funcoes.php");

$alunos = lerArquivo("alunos.json");

print_r($alunos);

if (isset($_GET["buscar-aluno"])) {

    $alunos = buscarAluno($alunos, $_GET["buscar-aluno"]);
}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos JSON</title>
</head>

<body>
    <form>

        <input type="text" name="buscar-aluno" placeholder="Buscar aluno" />
        <button>Buscar</button>


    </form>

    <table>
        <tr>
            <th>
                Nome
            </th>
            <th>
                Idade
            </th>
            <th>
                Nota
            </th>
        </tr>

        <?php

        foreach ($alunos as $aluno) {
        ?>

            <tr>
                <td><?= $aluno->nome ?></td>
                <td><?= $aluno->idade ?></td>
                <td><?= $aluno->nota ?></td>
            </tr>


        <?php
        }



        ?>
    </table>

</body>

</html>