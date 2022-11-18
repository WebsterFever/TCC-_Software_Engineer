<?php

    // Validar sessão
    session_start();

    if(!isset($_SESSION["codigo_admin"])){
        header("Location:index.php?falhaAutenticacao",  true,  301);  exit;
    }

?>

<!DOCTYPE php>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FELJ8NCPTV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FELJ8NCPTV');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WSL TECHNOLOGY SCHOOL</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

</body>
    <!-- Topo -->
    <div class="topo" style="position:fixed; width:100%; z-index:2">
        <a href="admin.php"><img src="../images/logo.png"></a>

        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="chat.php">Chat</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="lessons.php">Lessons</a></li>
            <li><a href="comments.php">Comments</a></li>
            <li><a href="countries.php">Countries</a></li>
            <li><a href="country_visit.php">Country to visit</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="logoff.php">Logoff</a></li>
        </ul>
    </div>