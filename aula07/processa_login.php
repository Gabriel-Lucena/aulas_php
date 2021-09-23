<?php

session_start();

// Recebendo os dados do formulário:

require("./funcoes.php");

realizarLogin($_POST["txt_usuario"],$_POST["txt_senha"], lerArquivo("./dados/usuarios.json"));

?>