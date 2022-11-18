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
    <title>WSL TECHONOLOGY SCHOOL</title>

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
        <a href="index.php?language=fr"><img src="../images/logo.png"></a>
    </div>

    <!-- Barra de navegação - FRANCÊS -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="menu_fr">
        <div class="container-fluid">
            
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?language=fr">Page d'accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php?language=fr">Découvrir d'autres pays</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logoff.php?language=fr">Se déconnecter</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="get" action="index.php">
                    <input class="form-control me-2" name="pesquisa" type="search" placeholder="Rechercher un cours" aria-label="Search">
                    <input type="hidden" name="language" value="fr">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>

<style>

.materiais{
    margin-top: 50px;
    margin-bottom: 50px;
}

.questions h3{
    margin-bottom: 30px;
}

.questions ul{
    list-style: none;
    padding-left: 0px;
}

.questions p{
    margin: 0px;
}

.questions li{
    margin: 0px;
    padding: 15px 10px;
    margin-bottom: 1px;
}

.questions p:nth-child(2){
    font-weight: bold;
    font-size: 12px;
    margin-top: 20px;
}

.questions .student{
    background-color: #e8e8e8;
}

.questions .teacher{
    background-color: #ccc;
}

.questions .teacher p:first-child{
    color: blue;
}

h3{
    padding: 10px;
    background-color: black;
    color: red;
}

</style>

<?php
    // Obter código
    $codigo = $_GET["codigo"];

    // Mensagem
    if(isset($_GET["perguntaRealizada"])){
        echo "<script>alert('Votre question a été envoyée à notre professeur, nous vous répondrons sous peu.')</script>";
    }

    
    $email = addslashes($_SESSION["student_email"]);

    // Obter o código do aluno e o nome
    $codigo_aluno = 0;
    $nome_aluno = "";
    $sql = "SELECT codigo, nome FROM alunos WHERE email = '$email'";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()) {
        $codigo_aluno = $linha["codigo"];
        $nome_aluno = $linha["nome"];
    }

    // Verifica se há alguma pergunta pendente
    $pergunta_pendente = false;
    $sql = "SELECT * FROM perguntas WHERE codigo_aluno = $codigo_aluno AND codigo_aula=$codigo AND situacao='pendente'";
    $resultado = $conn->query($sql);
    if($resultado->num_rows > 0){
        $pergunta_pendente = true;
    }

    // Obter todos os dados da aula
    $sql = "SELECT * FROM aulas WHERE codigo = $codigo";
    $resultado = $conn->query($sql);

    // Laço de repetição
    while($linha = $resultado->fetch_assoc()) {
        $nome = $linha["nome"];
        $sobre = $linha["sobre"];
        $video = $linha["video"];
        $texto_materiais = $linha["texto_materiais"];
        $materiais = $linha["materiais"];
        $duvidas = $linha["duvidas"];
        $comentarios = $linha["comentarios"];
    }
?>

    <!-- Conteúdo principal -->
    <main>

        <!-- Cursos -->
        <div class="container curso_detalhes">
            <div class="row">

                <div class="col-12">
                    <button class="btn btn-primary" style="margin-top: 30px" onclick="history.back()">Revenir au cours</button>
                    <h2><?php echo $nome; ?></h2>
                    <p><?php echo $sobre; ?></p>
                </div>

                <div class="col-12 video_curso">
                    <video controls style="width:60%; border: 1px solid #ccc;">
                        <source src="../lessons/<?php echo $video ?>">
                    </video>
                </div>

                <div class="col-12 materiais">
                    <h3><atériaux</h3>

                    <?php
                        if($materiais == ""){
                            echo "<p>Il n'y a pas de matériel supplémentaire.</p>";
                        }else{
                            echo "<p>$texto_materiais</p>";
                            echo "<a href='../materials/$materiais'>Télécharger le matériel</a>";
                        }
                    ?>
                </div>
                
                <?php if($duvidas == 1){ ?>

                <div class="col-12 questions">
                    <h3>Discuter avec le professeur</h3>

                    <ul>
                        <?php
                            $sql = "SELECT * FROM perguntas WHERE codigo_aluno = $codigo_aluno AND codigo_aula = $codigo";
                            $resultado = $conn->query($sql);
                            $indice = 0;
                            while($linha = $resultado->fetch_assoc()){
                                if($indice % 2 == 0){
                                    echo "<li class='student'>";
                                }else{
                                    echo "<li class='teacher'>";
                                }
                                    echo "<p>".$linha['mensagem']."</p>";

                                    if($indice % 2 == 0){
                                        echo "<p>Auteur: ".$nome_aluno." | <span style='color:red'>".$linha['data_hora']."<span></p>";
                                    }else{
                                        echo "<p>Auteur: Teacher | <span style='color:red'>".$linha['data_hora']."<span></p>";
                                    }

                                    if($linha["arquivo"] != ""){
                                        echo "<a href='../question_files/$linha[arquivo]' target='_blank' class='btn btn-secondary' style='margin-top:10px;'>Télécharger un fichier</a>";
                                    }
                                echo "</li>";

                                $indice++;
                            }
                        ?>
                    </ul>

                    <?php
                        if($pergunta_pendente){
                            echo "";
                            echo "<p>Nous attendons la réponse de votre professeur.</p>";
                        }else{
                    ?>
                        <form action="send_doubt.php" method="post" enctype="multipart/form-data">
                            <!--<textarea name="mensagem" placeholder="Avez-vous des doutes? Ecrivez votre message ici." class="form-control" style="margin-bottom:10px"></textarea>-->
                            <!--<input type="file" name="arquivo">-->
                            
                            <div id="sample">
                            <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                            <script type="text/javascript">
                                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                            </script>
                            <textarea maxlengt="250" name="mensagem" class="form-control" style="height:200px;">Avez-vous des doutes? Ecrivez votre message ici.</textarea>
                            </div>
                            
                            <input type="file" name="arquivo" style="margin-top:10px">
                            
                            <br>
                            <input type="hidden" id="link_atual" name="link_atual">
                            <input type="hidden" name="codigo_aula" value="<?php echo $codigo ?>">
                            <input type="submit" value="Envoyer" class="btn btn-success" style="margin-top:10px">
                        </form> 
                    <?php
                        }
                    ?>
                </div>
                
                <?php } ?>
                
                <?php if($comentarios == 1){ ?>
                
                <div class="col-12 questions" style="margin-top:50px;">
                    <h3>Commentaires sur la classe</h3>

                    <ul>
                        <?php
                            $sql = "SELECT comentarios.comentario, comentarios.data_hora, alunos.nome FROM comentarios INNER JOIN alunos ON comentarios.codigo_aluno = alunos.codigo WHERE comentarios.codigo_aula = $codigo";
                            $resultado = $conn->query($sql);
                            $indice = 0;
                            while($linha = $resultado->fetch_assoc()){
                              
                                    echo "<li class='student'>";
                   
                                    echo "<p>".$linha['comentario']."</p>";
                                        echo "<p>Author: ".$linha['nome']." | <span style='color:red'>".$linha['data_hora']."<span></p>";
                                echo "</li>";

                                $indice++;
                            }
                        ?>
                    </ul>

                    <form action="send_comment.php" method="post">
                        <div id="sample">
                        <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                        <script type="text/javascript">
                                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                        </script>
                        <textarea maxlengt="250" name="mensagem" class="form-control" style="height:200px;">Commentaire sur la classe.</textarea>
                        </div>
                        
                        <input type="hidden" id="link_atual2" name="link_atual">
                        <input type="hidden" name="codigo_aula" value="<?php echo $codigo ?>">
                        <input type="submit" value="Send" class="btn btn-success" style="margin-top:10px">
                    </form> 
                
                </div>
                
                <?php } ?>
            </div>    
        </div>

    </main>

    <script>
        document.getElementById("link_atual").value = window.location.href;
    </script>

    <?php include_once("../footer.php"); ?>