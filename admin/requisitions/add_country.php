<?php
    // Importar conexão
    include_once("../../connection.php");

    // Obter dados
    $titulo = addslashes($_POST["titulo"]);
    $pais = addslashes($_POST["pais"]);
    $imagem = $_FILES["imagem"]["name"];
    $mensagem = addslashes($_POST["mensagem"]);

    // SQL
    if($imagem != ""){
        $nome_arquivo   = uniqid() . "-" . time();
        $img  = pathinfo( $imagem, PATHINFO_EXTENSION );
        $img_nome = $nome_arquivo . "." . $img;
        $sql = "INSERT INTO conteudo_paises (titulo, pais, imagem, mensagem) VALUES ('$titulo', '$pais', '$img_nome', '$mensagem')";
        move_uploaded_file($_FILES["imagem"]["tmp_name"], "../../countries/".$img_nome);
    }else{
        $sql = "INSERT INTO conteudo_paises (titulo, pais, mensagem) VALUES ('$titulo', '$pais', '$mensagem')";
    }

    // Realiza a alteração
    $conn->query($sql);

    // Fechar a conexão
    $conn->close();

    // Redirecionamento
    header("Location:../countries.php?paisCadastrado",  true,  301);  exit;

?>