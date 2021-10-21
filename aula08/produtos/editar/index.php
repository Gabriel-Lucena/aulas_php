<?php

session_start();

/* Conexão com o banco de dados */

require('../../database/conexao.php');

$produtoId = $_GET["id"];

$sql = "SELECT * FROM tbl_produto WHERE id = $produtoId";

$resultado = mysqli_query($conexao, $sql);

$vetor = mysqli_fetch_array($resultado);

// '<pre>';
// var_dump($vetor);
// '<pre>';

$sql = "SELECT * FROM tbl_categoria";

$categoriaResultado = mysqli_query($conexao, $sql);

$sql = "SELECT * FROM tbl_categoria WHERE id = $vetor[9]";

$selecionar = mysqli_fetch_array(mysqli_query($conexao, $sql));

// '<pre>';
// var_dump($selecionar["descricao"]);
// '<pre>';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./editar.css" />
  <title>Editar Produtos</title>

</head>

<body>

  <div class="content">

    <section class="produtos-container">

      <main>

        <form class="form-produto" method="POST" action="../acoes.php" enctype="multipart/form-data">

          <input type="hidden" name="acao" value="editar" />

          <input type="hidden" name="produtoId" value="" />

          <h1>Editar Produto</h1>

          <ul>

          </ul>

          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" value="<?php echo $vetor["descricao"] ?>" id="descricao" required>
          </div>

          <div class="input-group">
            <label for="peso">Peso</label>
            <input type="text" name="peso" value="<?php echo number_format($vetor["peso"], 2, ",", ".") ?>" id="peso" required>
          </div>

          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" value="<?php echo $vetor["quantidade"] ?>" id="quantidade" required>
          </div>

          <div class="input-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" value="<?php echo $vetor["cor"] ?>" id="cor" required>
          </div>

          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input type="text" value="<?php echo $vetor["tamanho"] ?>" name="tamanho" id="tamanho">
          </div>

          <div class="input-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" value="<?php echo number_format($vetor["valor"], 2, ",", ".") ?>" id="valor" required>
          </div>

          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input type="text" name="desconto" value="<?php echo $vetor["desconto"] ?>" id="desconto">
          </div>

          <div class="input-group">

            <label for="categoria">Categoria</label>

            <select id="categoria" name="categoria" required>

              <option value="">SELECIONE</option>

              <?php

              while ($categoria = mysqli_fetch_array($categoriaResultado)) {

              ?>

                <?php

                if ($categoria["descricao"] == $selecionar["descricao"]) {

                ?>

                  <option value="<?php echo $categoria["id"] ?>" selected>

                    <?php echo $selecionar["descricao"] ?>

                  </option>

                <?php

                } else {

                ?>

                <option value="<?php echo $categoria["id"] ?>">

                  <?php echo $categoria["descricao"] ?>

                </option>

              <?php }} ?>

            </select>

          </div>

          <div class="input-group">
            <label for="categoria">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" />
          </div>

          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>

        </form>

      </main>

    </section>

  </div>

  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>

</body>

</html>