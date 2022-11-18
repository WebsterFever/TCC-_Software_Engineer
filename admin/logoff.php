<?php

    // Iniciar sessão
    session_start();

    // Remover sessão
    unset($_SESSION["codigo_admin"]);

    // Redirecionamento
    header("Location:index.php?logoff",  true,  301);  exit;

?>