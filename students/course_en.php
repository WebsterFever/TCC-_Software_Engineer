<?php
    // Sessão
    session_start();

    // Valida se o usuário está autenticado
    if(!isset($_SESSION["student_email"])){
        header("Location:../index.php");
    }

    // Conexão
    include_once("../connection.php");

    // Obter o e-mail do aluno
    $student_mail = addslashes($_SESSION["student_email"]);

    // Caso o aluno ainda não tenha efetuado o pagamento
    $sql = "SELECT * FROM alunos WHERE email = '$student_mail' AND situacao = 0";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        header("Location:../students/payment.php",  true,  301);  exit;
    }
?>

<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!-- Topo -->
    <div class="idiomas">
        <a href="index.php?language=en"><img src="../images/logo.png"></a>
    </div>

    <!-- Barra de navegação - INGLÊS -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="menu_en">
        <div class="container-fluid">
            
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?language=en">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php">Meet other countries</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logoff.php?language=en">Logoff</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="get" action="index.php">
                    <input class="form-control me-2" name="pesquisa" type="search" placeholder="Search a course" aria-label="Search">
                    <input type="hidden" name="language" value="en">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>

<?php
    // Obter código
    $codigo = $_GET["codigo"];

    // SQL
    $sql = "SELECT * FROM cursos WHERE codigo = $codigo";
    $resultado = $conn->query($sql);

    // Laço de repetição
    while($linha = $resultado->fetch_assoc()) {
        $nome = $linha["nome"];
        $sobre = $linha["sobre"];
        $video = $linha["video"];
    }
?>



    <!-- Conteúdo principal -->
    <main>

        <!-- Cursos -->
        <div class="container curso_detalhes">
            <div class="row">

                <div class="col-12">
                    <a href="index.php?language=en" class="btn btn-primary" style="margin-top: 30px">Return to the homepage</a>
                    <h2><?php echo $nome; ?></h2>
                    <p><?php echo $sobre; ?></p>
                </div>

                <div class="col-12 video_curso">
                    <video controls style="width:60%; border: 1px solid #ccc;">
                        <source src="../courses/videos/<?php echo $video ?>">
                    </video>
                </div>

                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Program course:</th>
                            </tr>
                        </thead>
    
                        <tbody>
                           
                            <?php
                                // SQL
                                $sql = "SELECT * FROM aulas WHERE codigo_curso = $codigo";
                                $resultado = $conn->query($sql);
                                
                                // Índice
                                $indice = 1;

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {

                            ?>

                                <tr>
                                    <td><a href="lesson_en.php?codigo=<?php echo $linha['codigo'] ?>&language=en"><?php echo $indice ?> - <?php echo $linha["nome"]; ?></a></td>
                                </tr>

                            <?php $indice++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>

    </main>


    <?php include_once("../footer.php"); ?>