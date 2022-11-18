<?php
    // Sessão
    session_start();

    // Conexão
    include_once("../../connection.php");

    // Obter dados
    $senha1 = addslashes($_POST["senha1"]);
    $senha2 = addslashes($_POST["senha2"]);
    $senha3 = addslashes($_POST["senha3"]);

    // Obter o código
    $codigo = $_SESSION['codigo_admin'];

    // Verifica se a senha atual está correta
    $sql = "SELECT * FROM admin WHERE codigo = $codigo AND senha = '$senha1'";
    $resultado = $conn->query($sql);
    $contador = 0;
    while($linha = $resultado->fetch_assoc()){
        $contador++;
    }

    if($contador == 0){
        header("Location:../account.php?senhaAtualIncorreta");
    }else{
        $sql = "UPDATE admin SET senha = '$senha2' WHERE codigo = $codigo";
        $conn->query($sql);

        // Finalizar conexão
        $conn->close();

        // Redirecionamento
        header("Location:../account.php?senhaAtualizada");
    }

?>