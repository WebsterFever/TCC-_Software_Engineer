<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $aula = addslashes($_POST["aula"]);
    $sobre = addslashes($_POST["sobre"]);
    $curso = $_POST["curso"];
    $video = $_FILES["video"]["name"];
    $texto_materiais = addslashes($_POST["texto_materiais"]);   
    $materiais = $_FILES["materiais"]["name"]; 
    
    if(isset($_POST["duvidas"])){
        $duvidas = 1;
    }else{
        $duvidas = 0;
    }

    if(isset($_POST["comentarios"])){
        $comentarios = 1;
    }else{
        $comentarios = 0;
    }

    // Nome único
    $nome_arquivo = uniqid() . "-" . time();

    // SQL
    if($materiais != "" && $video != ""){
        $vdo = pathinfo($video, PATHINFO_EXTENSION );
        $arq = pathinfo($materiais, PATHINFO_EXTENSION );
        $vdo_nome = $nome_arquivo . "." . $vdo;
        $arq_nome = $nome_arquivo . "." . $arq;
        $sql = "INSERT INTO aulas (nome, materiais, video, sobre, codigo_curso, texto_materiais, duvidas, comentarios) VALUES ('$aula', '$materiais', '$vdo_nome', '$sobre', $curso, '$texto_materiais', $duvidas, $comentarios)";
         $conn->query($sql);
        move_uploaded_file($_FILES["video"]["tmp_name"], "../../lessons/".$vdo_nome);
        move_uploaded_file($_FILES["materiais"]["tmp_name"], "../../materials/".$arq_nome);
    }elseif($materiais != "" && $video == ""){
        $arq = pathinfo($materiais, PATHINFO_EXTENSION );
        $arq_nome = $nome_arquivo . "." . $arq;
        $sql = "INSERT INTO aulas (nome, materiais, sobre, codigo_curso, texto_materiais, duvidas, comentarios) VALUES ('$aula', '$materiais', '$sobre', $curso, '$texto_materiais', $duvidas, $comentarios)";
         $conn->query($sql);
        move_uploaded_file($_FILES["materiais"]["tmp_name"], "../../materials/".$arq_nome);
    }else if($materiais == "" && $video != ""){
        $vdo = pathinfo($video, PATHINFO_EXTENSION );
        $vdo_nome = $nome_arquivo . "." . $vdo;
        $sql = "INSERT INTO aulas (nome, video, sobre, codigo_curso, texto_materiais, duvidas, comentarios) VALUES ('$aula', '$vdo_nome', '$sobre', $curso, '$texto_materiais', $duvidas, $comentarios)";
         $conn->query($sql);
        move_uploaded_file($_FILES["video"]["tmp_name"], "../../lessons/".$vdo_nome);
    }else {
        $sql = "INSERT INTO aulas (nome, sobre, codigo_curso, texto_materiais, duvidas, comentarios) VALUES ('$aula', '$sobre', $curso, '$texto_materiais', $duvidas, $comentarios)";
        $conn->query($sql);
    }
    
   
   

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../lessons.php?aulaCadastrada",  true,  301);  exit;

?>