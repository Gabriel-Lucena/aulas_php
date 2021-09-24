<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./empresaX.json");

$count = count($funcionarios);

if (isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

if (
    !empty($_GET["first_name"]) && !empty($_GET["last_name"]) &&
    !empty($_GET["email"]) && !empty($_GET["gender"]) &&
    !empty($_GET["ip_address"]) && !empty($_GET["country"])
    && !empty($_GET["department"])
) {
    adicionarFuncionario([
        "first_name" => $_GET["first_name"],
        "last_name" => $_GET["last_name"],
        "email" => $_GET["email"],
        "gender" => $_GET["gender"],
        "ip_address" => $_GET["ip_address"],
        "country" => $_GET["country"],
        "department" => $_GET["department"],
    ]);

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a757f2d5f7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="./script.js" defer></script>
    <title>Empresa X</title>
</head>

<body>
    <h1>Funcionários da empresa X</h1>

    <form>
        <button>
            <a class="material-icons" href="processa_login.php?logout=true">logout</a>
        </button>
    </form>
    <p id="subtitle">A empresa conta com <?= $count ?> funcionários</p>
    <section>
        <form>
            <input type="text" required placeholder="Buscar funcionário..." name="buscarFuncionario" id="buscarFuncionario" value='<?= isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>' />
            <button id="buscar">Buscar</button>
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Endereço IP</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($funcionarios as $funcionario) : ?>
                <tr>
                    <td><?= $funcionario->id ?></td>
                    <td><?= $funcionario->first_name ?></td>
                    <td><?= $funcionario->last_name ?></td>
                    <td><?= $funcionario->email ?></td>
                    <td><?= $funcionario->gender ?></td>
                    <td><?= $funcionario->ip_address ?></td>
                    <td><?= $funcionario->country ?></td>
                    <td><?= $funcionario->department ?></td>
                    <td>
                        <button id="edit" onclick="editar(<?= $funcionario->id ?>)"><i class="fas fa-edit"></i></button>
                        <button id="delete" onclick="deletar(<?= $funcionario->id ?>)"><i class="fas fa-trash-alt"></i></button>
                        <!-- <button id="delete" onclick="openDeleteModal()">Deletar</button> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <div id="add_new">
        <p>+</p>
    </div>

    <div id="add_container_modal">
        <div id="add_bg"></div>
        <div class="modal">
            <h2>Adicione um novo funcionário</h2>
            <form>
                <input type="text" name="first_name" required placeholder="Nome">
                <input type="text" name="last_name" required placeholder="Sobrenome">
                <input type="text" name="email" required placeholder="E-mail">
                <select name="gender" id="gender" required placeholder="Sexo">
                    <option value="" selected disabled>Selecione</option>
                    <option value="Male">Masculino</option>
                    <option value="Female">Feminino</option>
                </select>
                <input type="text" name="ip_address" required placeholder="Endereço IP">
                <input type="text" name="country" required placeholder="País">
                <input type="text" name="department" required placeholder="Departamento">
                <div class="buttons">
                    <button id="cancel" type="button">Cancelar</button>
                    <button id="send">Adicionar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="delete_container_modal">
        <div id="delete_bg"></div>
        <div class="modal">
            <h2>Você deseja mesmo fazer isso?</h2>
            <form>
                <div class="buttons">
                    <button id="cancelDelete" type="button">Cancelar</button>
                    <button id="confirmDelete">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>