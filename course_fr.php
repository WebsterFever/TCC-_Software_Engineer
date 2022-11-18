<?php include_once("header.php"); ?>

<?php

    // Conexão
    include_once("connection.php");
    
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

    <!-- Banner -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="images/banners/inicio1.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>WSL TECHNOLOGY SCHOOL</h5>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="images/banners/inicio2.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>WSL TECHNOLOGY SCHOOL</h5>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="images/banners/inicio3.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>WSL TECHNOLOGY SCHOOL</h5>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <!-- Conteúdo principal -->
    <main>

        <!-- Cursos -->
        <div class="container curso_detalhes">
            <div class="row">

                <div class="col-12">
                    <h2><?php echo $nome; ?></h2>
                    <p><?php echo $sobre; ?></p>
                </div>

                <div class="col-12 video_curso">
                    <video controls style="width:60%; border: 1px solid #ccc;">
                        <source src="courses/videos/<?php echo $video ?>">
                    </video>
                </div>

                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cours de programme:</th>
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
                                    <td><?php echo $indice ?> - <?php echo $linha["nome"]; ?></td>
                                </tr>

                            <?php $indice++; } ?>
                            
                        </tbody>
                    </table>
                </div>

                <div class="col-12">
                    <p><a href="login.php?language=fr">Cliquez ici</a> pour créer un compte gratuit et vérifier les méthodes de paiement.</p>
                </div>
            </div>    
        </div>

    </main>


    <?php include_once("footer.php"); ?>