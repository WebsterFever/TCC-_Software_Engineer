<?php
    // Sessão
    session_start();

    // Conexão
    include_once("../../connection.php");

    // Obter dados
    $nome = addslashes($_POST["nome"]);
    $email = addslashes($_POST["email"]);

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../account.php?falhaEmail",  true,  301);  exit;
    }

    // Obter o código
    $codigo = $_SESSION['codigo_admin'];

    // SQL
    $sql = "UPDATE admin SET nome = '$nome', email = '$email' WHERE codigo = $codigo";
    $conn->query($sql);

    // Finalizar conexão
    $conn->close();

    // Redirecionamento
    header("Location:../account.php?dadosAtualizados");

?>