<style>
    body {

        display: flex;
        align-items: center;
        justify-content: center;
        overflow-y: hidden;

    }
</style>




<?php



if(isset($_REQUEST["nome"]) && isset($_REQUEST["nota1"]) && isset($_REQUEST["nota2"]) && isset($_REQUEST["nota3"])) {
 
    $nome = $_REQUEST["nome"];
    $nota1 = $_REQUEST["nota1"];
    $nota2 = $_REQUEST["nota2"];
    $nota3 = $_REQUEST["nota3"];
    $media = ($nota1 + $nota2 + $nota3) / 3;
    $media = round($media, 2);

    if ($media > 6) {

        echo "<marquee scrolldelay = 10 behavior = alternate truespeed = 1200><h1 style='color: green; font-size: 360px;' > O aluno $nome teve média $media, portanto passou de semestre. <h1><marquee>";
        echo "<body style = 'background-color: lightgreen;'> </body>";
    }
    elseif ($media <= 6 && $media >= 4) {

        echo "<marquee scrolldelay = 1 behavior = alternate direction = up truespeed = 120000000000><strike>
        <h1 style='color: yellow; font-size: 100px;'> O aluno $nome teve média $media, portanto ficou de recuperação no semestre. <h1>
        </strike>
        <marquee>";
        echo "<body style = 'background-color: lightyellow;'> </body>";

    } else {

        echo "<marquee vspace = 100 scrolldelay = 1 behavior = alternate direction = up  truespeed = 120000000000><h1  style='color: red; font-size: 360px;' >  
        Extra! Extra! O aluno $nome teve média $media, portanto reprovou no semestre! Parabéns!
        <h1><marquee>";
        echo "<body style = 'background-color: tomato;'> </body>";

    }


}else{

    echo "<h1>Olá, tudo bem?</h1>";
    
}
