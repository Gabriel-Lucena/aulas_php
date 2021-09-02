<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Arial";
    }
</style>

<?php


if(isset($_POST["nome"]) && isset($_POST["sobrenome"]) 
    && isset($_POST["idade"]) && isset($_POST["linguagem"])){
    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $idade = $_POST["idade"];
    $linguagem = $_POST["linguagem"];

    echo "<h1>Olá, $nome!!! Você tem $idade anos e sua linguagem preferida é $linguagem</h1>";
}else{

    echo "<h1>Você não enviou as informação corretamente</h1>";
}
