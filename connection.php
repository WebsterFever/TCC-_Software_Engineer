<?php
    // Acesso
    $servername = "localhost";
    $username = "adm_web";
    $password = ",6UZ<6ov";
    $dbname = "webster";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha: " . $conn->connect_error);
    } 
?>

<?php
    // Acesso
    // $servername = "localhost";
    // $username = "u913733470_teste";
    // $password = "Teste1234";
    // $dbname = "u913733470_teste";
?>