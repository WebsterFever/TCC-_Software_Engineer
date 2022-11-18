<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter código
    $codigo = $_GET["codigo"];

    // Remover todas aulas de um determinado curso
    $sql = "DELETE FROM aulas WHERE codigo_curso = $codigo";
    $conn->query($sql);

    // Obter o nome da imagem e do vídeo
    $sql = "SELECT imagem, video FROM cursos WHERE codigo = $codigo";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        unlink("../../courses/images/$linha[imagem]");
        unlink("../../courses/videos/$linha[video]");
    }

    // Remover
    $sql = "DELETE FROM cursos WHERE codigo = $codigo";
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../courses.php?cursoRemovido",  true,  301);  exit;

?>