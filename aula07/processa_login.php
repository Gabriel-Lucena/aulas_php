<?php

session_start();
require("./funcoes.php");

realizarLogin($_POST["nome"],$_POST["senha"], lerArquivo("./dados/usuarios.json"));

?>