<?php

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario($funcionarios, $nome)
{
    $funcionariosFiltro = [];

    foreach ($funcionarios as $funcionario) {

        if (

            strpos($funcionario->first_name, $nome) !== false ||
            strpos($funcionario->last_name, $nome) !== false ||
            strpos($funcionario->department, $nome) !== false

        ) {

            $funcionariosFiltro[] = $funcionario;
        }
    }

    return $funcionariosFiltro;
}

function adicionarFuncionario(array $funcionario)
{

    $funcionarios = lerArquivo('empresaX.json');
    $id = count($funcionarios) + 1;
    $funcionario['id'] = $id;
    $funcionarios[] = $funcionario;
    $json = json_encode($funcionarios);
    file_put_contents('empresaX.json', $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {

        if ($funcionario->id == $idFuncionario) {

            unset($funcionarios[$chave]);
        }
    }

    $jsonArray = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $jsonArray);
}

function editarFuncionario($nomeArquivo, $funcionarioEditado)
{
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {

        if ($funcionario->id == $funcionarioEditado["id"]) {

            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {

        if ($funcionario->id == $idFuncionario) {

            return $funcionario;
        }
    }

    return false;
}

/*
    Parâmetros:

    1 - Usuário do form
    2 - Senha vindo do form
    3 - Dados do arquivo .json do usuário e senha

*/

function realizarLogin($usuario, $senha, $dados)
{

    foreach ($dados as $dado) {

        if ($dado->usuario == $usuario && $dado->senha == $senha) {

            // Variáveis de sessão:

            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: https://www.google.com/search?q=onlyfans+gu+severo+calisto&rlz=1C1GCEU_pt-BRBR964BR964&hl=pt-BR&source=hp&ei=t6BEYdfkM7rR1sQPwo6_-Ag&iflsig=ALs-wAMAAAAAYUSuxx5NlJNNBgOZrXbQA1uajz6U7oqh&oq=onlyfans+Gu+Severp&gs_lcp=Cgdnd3Mtd2l6EAMYADIHCCEQChCgATIHCCEQChCgAToLCAAQgAQQsQMQgwE6EQguEIAEELEDEIMBEMcBENEDOgUIABCABDoOCC4QgAQQsQMQxwEQowI6CAgAEIAEELEDOgQIABBDOggILhCABBCxAzoICAAQsQMQgwE6BAguEEM6BwgAELEDEEM6CwguEIAEELEDEIMBOgcIABCxAxAKOgoILhCxAxCDARAKOgoIABCxAxCDARAKOgQIABAKOg0IABCxAxCDARCxAxAKOgcILhCxAxAKOgYIABAKEAM6BAgAEAM6BggAEBYQHjoICAAQFhAKEB46BAghEBVQgxJY2TJgxVJoAnAAeACAAZ4BiAGkDZIBBDMuMTKYAQCgAQGwAQA&sclient=gws-wiz');
            exit;
        } else {

            header('location: https://www.youtube.com/watch?v=DQZndRrDrrM&ab_channel=MyDeepSound');
            exit;
        }
    }
}
