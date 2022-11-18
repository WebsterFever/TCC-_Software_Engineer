<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter o nome do vídeo
    $sql = "SELECT imagem FROM pais_visitado";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        unlink("../../countries/$linha[imagem]");
    }

    // Remover
    $sql = "DELETE FROM pais_visitado";
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../country_visit.php?paisRemovido",  true,  301);  exit;

?>