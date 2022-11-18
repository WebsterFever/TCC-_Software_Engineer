<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $curso = addslashes($_POST["curso"]);
    $idioma = addslashes($_POST["idioma"]);
    $sobre = addslashes($_POST["sobre"]);
    $imagem = $_FILES["imagem"]["name"];
    $video = $_FILES["video"]["name"];

    // Nome único
    $nome_arquivo   = uniqid() . "-" . time();

    // Extrair extensões
    $img  = pathinfo( $imagem, PATHINFO_EXTENSION );
    $vdo = pathinfo( $video, PATHINFO_EXTENSION );

    // Gerar novo nome
    $img_nome = $nome_arquivo . "." . $img;
    $vdo_nome = $nome_arquivo . "." . $vdo;

    // SQL
    $sql = "INSERT INTO cursos (nome, idioma, sobre, imagem, video) VALUES ('$curso', '$idioma', '$sobre', '$img_nome', '$vdo_nome')";

    // Upload
    move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../courses/images/".$img_nome);
    move_uploaded_file($_FILES["video"]["tmp_name"], "../../courses/videos/".$vdo_nome);

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../courses.php?cursoCadastrado",  true,  301);  exit;

?>