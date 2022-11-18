<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $codigo = $_POST["codigo"];
    $curso = $_POST["curso"];
    $sobre = addslashes($_POST["sobre"]);
    $aula = addslashes($_POST["aula"]);
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
    
    $video = $_FILES["video"]["name"];
    $texto_materiais = addslashes($_POST["texto_materiais"]);   
    $materiais = $_FILES["materiais"]["name"]; 

    if($_POST["nome_sem_extensao"] == ""){
        $antigo = uniqid() . "-" . time();
    }else{
        $antigo = addslashes($_POST["nome_sem_extensao"]);
    }

    // SQL
    if($video == "" && $materiais == ""){
        $sql = "UPDATE aulas SET nome = '$aula', sobre = '$sobre', codigo_curso = $curso, texto_materiais = '$texto_materiais', duvidas = $duvidas, comentarios = $comentarios WHERE codigo = $codigo";
    }else if($video != "" && $materiais == ""){
        $vdo = pathinfo($video, PATHINFO_EXTENSION );
        $vdo_nome = $antigo . "." . $vdo;

        move_uploaded_file($_FILES["video"]["tmp_name"], "../../lessons/".$vdo_nome);

        $sql = "UPDATE aulas SET nome = '$aula', sobre = '$sobre', codigo_curso = $curso, video = '$vdo_nome', texto_materiais = '$texto_materiais', duvidas = $duvidas, comentarios = $comentarios WHERE codigo = $codigo";
    }else if($video == "" && $materiais != ""){
        $arq = pathinfo($materiais, PATHINFO_EXTENSION );
        $arq_nome = $antigo . "." . $arq;

        move_uploaded_file($_FILES["materiais"]["tmp_name"], "../../materials/".$arq_nome);

        $sql = "UPDATE aulas SET nome = '$aula', sobre = '$sobre', codigo_curso = $curso, materiais='$arq_nome', texto_materiais = '$texto_materiais', duvidas = $duvidas, comentarios = $comentarios WHERE codigo = $codigo";
    }else{
        $vdo = pathinfo($video, PATHINFO_EXTENSION );
        $vdo_nome = $antigo . "." . $vdo;
        $arq = pathinfo($materiais, PATHINFO_EXTENSION );
        $arq_nome = $antigo . "." . $vdo;

        move_uploaded_file($_FILES["video"]["tmp_name"], "../../lessons/".$vdo_nome);
        move_uploaded_file($_FILES["materiais"]["tmp_name"], "../../materials/".$arq_nome);

        $sql = "UPDATE aulas SET nome = '$aula', sobre = '$sobre', codigo_curso = $curso, video = '$vdo_nome', materiais='$arq_nome', texto_materiais = '$texto_materiais', duvidas = $duvidas, comentarios = $comentarios WHERE codigo = $codigo";
    }

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../lessons.php?aulaAlterada",  true,  301);  exit;

?>