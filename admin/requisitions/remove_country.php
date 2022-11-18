<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter código
    $codigo = $_GET["codigo"];

    // Obter o nome do vídeo
    $sql = "SELECT imagem FROM conteudo_paises WHERE codigo = $codigo";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        unlink("../../countries/$linha[imagem]");
    }

    // Remover
    $sql = "DELETE FROM conteudo_paises WHERE codigo = $codigo";
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../countries.php?paisRemovido",  true,  301);  exit;

?>