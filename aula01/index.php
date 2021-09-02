<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Arial";
    }
</style>

<?php


if(isset($_GET["pesquisa"])){
    
    $nome = $_GET["nome"];
    
    echo "<h1>Olá, $nome!!! Você tem $idade anos e sua linguagem preferida é $linguagem</h1>";
}else{

    echo "<h1>Você não enviou as informação corretamente</h1>";
}
