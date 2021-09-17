<?php

    // Criando uma sessão:
    session_start();

    // Verificando o id da sessão:
    echo session_id();

    // Criando vairáveis de sessão:
    $_SESSION["nome"] = "Fernando Andorid";

    $andorid = "Talvez vire uma entidade, mas por enquanto...";

    echo $andorid;

    echo $_SESSION["nome"];

?>