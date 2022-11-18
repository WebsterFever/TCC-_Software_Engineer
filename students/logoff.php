<?php

    // Sessão
    session_start();

    // Obter o e-mail do aluno
    unset($_SESSION["student_email"]);

    // Redirecionamento
    header("Location:../index.php",  true,  301);  exit;
    
?>