<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $codigo = $_POST["codigo"];
    $curso = addslashes($_POST["curso"]);
    $idioma = addslashes($_POST["idioma"]);
    $sobre = addslashes($_POST["sobre"]);
    $imagem = $_FILES["imagem"]["name"];
    $video = $_FILES["video"]["name"];
    $antigo = addslashes($_POST["nome_antigo"]);

    // SQL
    if($video == "" && $imagem == ""){
        $sql = "UPDATE cursos SET nome = '$curso', idioma = '$idioma', sobre = '$sobre' WHERE codigo = $codigo";
    }else if($video != "" && $imagem == ""){

        $vdo = pathinfo( $video, PATHINFO_EXTENSION );
        $vdo_nome = $antigo . "." . $vdo;

        move_uploaded_file($_FILES["video"]["tmp_name"], "../../courses/videos/".$vdo_nome);

        $sql = "UPDATE cursos SET nome = '$curso', idioma = '$idioma', sobre = '$sobre', video = '$vdo_nome' WHERE codigo = $codigo";
    }else if($video == "" && $imagem != ""){

        $img  = pathinfo( $imagem, PATHINFO_EXTENSION );
        $img_nome = $antigo . "." . $img;

        move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../courses/images/".$img_nome);
        
        $sql = "UPDATE cursos SET nome = '$curso', idioma = '$idioma', sobre = '$sobre', imagem = '$img_nome' WHERE codigo = $codigo";
    }else{

        $img  = pathinfo($imagem, PATHINFO_EXTENSION );
        $vdo = pathinfo($video, PATHINFO_EXTENSION );
        $img_nome = $nome_arquivo . "." . $img;
        $vdo_nome = $nome_arquivo . "." . $vdo;

        move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../courses/images/".$img_nome);
        move_uploaded_file($_FILES["video"]["tmp_name"], "../../courses/videos/".$vdo_nome);

        $sql = "UPDATE cursos SET nome = '$curso', idioma = '$idioma', sobre = '$sobre', imagem = '$img_nome', video = '$vdo_nome' WHERE codigo = $codigo";
    }
    

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../courses.php?cursoEditado",  true,  301);  exit;

?>