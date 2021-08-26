<?php

// $cargos = array();

// Declarando um vetor.

$cargos = [
    "Gerente de Produtos",
    "Gerente de Projetos",
    "Desenvolvedor Back-end",
    "Desenvolvedor Front-end",

];

// Adicionando um elemento em um vetor.

$cargos[] = "DevOps";
$cargos[] = "Designer UI/UX";
$cargos[] = "QA";
$cargos[] = "Engenheiro de Software";
$cargos[] = "Arquiteto";
$cargos[] = "DBA";
$cargos[] = "Analista de Sistemas";

// Imprimindo um vetor na tela.

// print_r($cargos)

// Excluindo uma posição do vetor.
//
// unset($cargos[0]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <form action="index.php">

        <label for="nomeCompletoDoFuncionario">Nome completo do cliente:</label>
        <input type="text" name="nomeCompletoDoFuncionario" id="nomeCompletoDoFuncionario">

        <label for="salario">Salário:</label>
        <input type="number" name="salario" id="salario">

        <div class="input-radio">
            <label for="genero_mascu">Masculino:</label>
            <input type="radio" name="genero" id="mascu" value="masc" />
        </div>

        <div class="input-radio">

            <label for="genero_femini">Feminino:</label>
            <input type="radio" name="genero" id="femini" value="fem" />

        </div>

        <div class="input-radio" style="margin-bottom: 10px;">

            <label for="genero_outro">Outro:</label>
            <input type="radio" name="genero" id="outro" value="out">

        </div>

        <label for="cargos">Cargo:</label>
        <select name="cargos" id="cargos">

            <option selected disabled>Selecione:</option>

            <?php

            foreach ($cargos as $cargo) {
                echo "<option>$cargo</option>";
            }



            ?>

        </select>

        <button>Calcular</button>

    </form>



</body>

</html>