<?php


require("./alunos.php");


// importar o arquivo de funções (cria-lo)

require("./funcoes.php")

// chamar a função notas, e pronto



// pintar a célula do aluno aprovado em verde
// e reprovado de vermelho

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
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
            
            foreach($alunos as $aluno) {
            
            ?>
                <tr>
                    <th><?= $aluno["nome"] ?></th>
                    <th><?= $aluno["idade"] ?></th>
                    <th><?= $aluno["nota"] ?></th>
                    <th><?=
                            isset($aluno["situacao"]) ? 
                            situacao :
                            ""
                        ?>
                    </th>
                </tr>

            <?php

                }

            ?>

        </table>
    </section>
</body>

</html>