<?php

require("../database/conexao.php");

$sql = "SELECT p.*, c.descricao FROM tbl_produto p
        INNER JOIN tbl_categoria c ON
        p.categoria_id = c.id";

$resultado = mysqli_query($conexao, $sql);

/*  Teste de validação */

// var_dump($resultado);exit;

// var_dump(mysqli_fetch_array($resultado));exit;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles-global.css" />
    <link rel="stylesheet" href="./produtos.css" />
    <title>Administrar Produtos</title>

</head>

<body>

    <!-- INCLUSÃO DO COMPONENTE HEADER -->

    <?php include('../componentes/header/header.php'); ?>

    <div class="content">

        <section class="produtos-container">

            <!-- BOTÕES DE INSERÇÃO DE PRODUTOS E CATEGORIAS -->
            <!-- CASO O USUÁRIO ESTEJA LOGADO EXIBE OS BOTÕES DE CADASTRO -->

            <header>
                <button onclick="javascript:window.location.href ='./novo/'">Novo Produto</button>
                <button onclick="javascript:window.location.href ='../categorias/'">Adicionar Categoria</button>
            </header>

            <main>

                <!-- LISTAGEM DE PRODUTOS (INICIO) -->

                <?php

                while ($produto = mysqli_fetch_array($resultado)) {

                ?>

                    <article class="card-produto">

                        <div class="acoes-produtos">
                            <img onclick="javascript: window.location = './editar/?id=<?= $produto['id'] ?>'" src="../imgs/edit.svg" />
                            <img onclick="deletar(<?= $produto['id'] ?>)" src="../imgs/trash.svg" />
                        </div>

                        <figure>
                            <img src="./fotos/<?php echo $produto["imagem"] ?>" />
                        </figure>

                        <section>

                            <span class="preco">
                                R$
                                <em>% off</em>
                            </span>

                            <span class="parcelamento">ou em
                                <em>
                                    x R$ sem juros
                                </em>
                            </span>

                            <span class="descricao">
                                доброе утро
                            </span>

                            <span class="categoria">
                                <em></em>
                            </span>

                    </article>

                <?php

                }


                ?>
        </section>



        <!-- LISTAGEM DE PRODUTOS (FIM) -->

        <!-- FORM USADO PARA A EXCLUSÃO DE PRODUTOS -->
        <form id="formDeletar" method="POST" action="./acoes.php">
            <input type="hidden" name="acao" value="deletar" />
            <input type="hidden" name="produtoId" id="produtoId" />
        </form>

        </main>

        </section>

    </div>

    <footer>
        SENAI 2021 - Todos os direitos reservados
    </footer>

    <!-- SCRIPT QUE DISPARA O FORM DE EXCLUSÃO DE PRODUTOS -->
    <script lang="javascript">
        function deletar(produtoId) {
            if (confirm("Tem certeza que deseja deletar este produto?")) {
                document.querySelector("#produtoId").value = produtoId;
                document.querySelector("#formDeletar").submit();
            }
        }
    </script>

</body>

</html>