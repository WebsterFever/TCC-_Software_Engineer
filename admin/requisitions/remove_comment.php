<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter código
    $codigo = $_GET["codigo"];

    // Remover
    $sql = "DELETE FROM comentarios WHERE codigo = $codigo";
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../comments.php?comentarioRemovido",  true,  301);  exit;

?>