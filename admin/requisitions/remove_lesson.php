<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter código
    $codigo = $_GET["codigo"];

    // Obter o nome do vídeo
    $sql = "SELECT video, materiais FROM aulas WHERE codigo = $codigo";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        unlink("../../lessons/$linha[video]");
        unlink("../../materials/$linha[materiais]");
    }

    // Remover
    $sql = "DELETE FROM aulas WHERE codigo = $codigo";
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../lessons.php?aulaRemovida",  true,  301);  exit;

?>