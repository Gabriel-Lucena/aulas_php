<?php


$fruta_vetor = [
    "fruta1",
    "fruta2",
    "fruta3",
    "fruta4",
    "fruta5",
    "frutan",
];

foreach ($fruta_vetor as $chave => $fruta) {

    if ($fruta == "frutan") {

        echo "<h1 style = 'display:flex;justify-content: center;align-items: center'>Fruta encontrada</h1>";
        unset($fruta_vetor[$chave]);
        echo "<h1 style = 'display:flex;justify-content: center;align-items: center'>$chave </h1>";

        foreach ($fruta_vetor as $chave2 => $fruta2) {

            if ($fruta2 == "frutan") {

                echo "<h1 style = 'display:flex;justify-content: center;align-items: center'>Fruta encontrada</h1>";
                unset($fruta_vetor[$chave2]);
                die;

            } else {

                echo "<h1 style = 'display:flex;justify-content: center;align-items: center'> Não achou, né? </h1>";
                
            }
        }

        die;
    } else {

        echo "<h1 style = 'display:flex;justify-content: center;align-items: center'> Não achou, né? </h1>";
    }
}
