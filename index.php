<?php include_once("header.php"); ?>

<?php include_once("connection.php") ?>

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

    <!-- Conteúdo principal - INGLÊS -->
    <main id="cursos_en">

        <!-- Cursos -->
        <div class="container cursos">
            <div class="row">

                <div class="col-12">
                    <h2>Our courses</h2>
                </div>

                <?php
                    // SQL
                    if(isset($_GET["pesquisa"])){
                        $sql = "SELECT * FROM cursos WHERE idioma = 'en' AND nome LIKE '%$_GET[pesquisa]%'";
                    }else{
                        $sql = "SELECT * FROM cursos WHERE idioma = 'en'";
                    }
                    
                    $resultado = $conn->query($sql);

                    // Laço de repetição
                    while($linha = $resultado->fetch_assoc()) {
                ?>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <a href="course_en.php?language=en&codigo=<?php echo $linha["codigo"]; ?>">
                                <img src="courses/images/<?php echo $linha["imagem"]; ?>" class="img-fluid">
                                <div class="overlay">
                                    <div class="text"><?php echo $linha["nome"]; ?></div>
                                </div>
                                <button class="btn btn-success"><?php echo $linha["nome"]; ?></button>
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </main>

    <!-- Conteúdo principal - PORTUGUÊS -->
    <main id="cursos_pt">

        <!-- Cursos -->
        <div class="container cursos">
            <div class="row">

                <div class="col-12">
                    <h2>Nossos cursos</h2>
                </div>

                <?php
                    // SQL
                    if(isset($_GET["pesquisa"])){
                        $sql = "SELECT * FROM cursos WHERE idioma = 'pt' AND nome LIKE '%$_GET[pesquisa]%'";
                    }else{
                        $sql = "SELECT * FROM cursos WHERE idioma = 'pt'";
                    }

                    $resultado = $conn->query($sql);

                    // Laço de repetição
                    while($linha = $resultado->fetch_assoc()) {
                ?>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <a href="course_pt.php?language=pt&codigo=<?php echo $linha["codigo"]; ?>">
                                <img src="courses/images/<?php echo $linha["imagem"]; ?>" class="img-fluid">
                                <div class="overlay">
                                    <div class="text"><?php echo $linha["nome"]; ?></div>
                                </div>
                                <button class="btn btn-success"><?php echo $linha["nome"]; ?></button>
                            </a>
                        </div>
                    </div>

                <?php } ?>
                
            </div>
        </div>

    </main>

    <!-- Conteúdo principal - FRANCÊS -->
    <main id="cursos_fr">

        <!-- Cursos -->
        <div class="container cursos">
            <div class="row">

                <div class="col-12">
                    <h2>Nos cours</h2>
                </div>

                <?php
                    // SQL
                    if(isset($_GET["pesquisa"])){
                        $sql = "SELECT * FROM cursos WHERE idioma = 'fr' AND nome LIKE '%$_GET[pesquisa]%'";
                    }else{
                        $sql = "SELECT * FROM cursos WHERE idioma = 'fr'";
                    }
          
                    $resultado = $conn->query($sql);

                    // Laço de repetição
                    while($linha = $resultado->fetch_assoc()) {
                ?>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <a href="course_fr.php?language=fr&codigo=<?php echo $linha["codigo"]; ?>">
                                <img src="courses/images/<?php echo $linha["imagem"]; ?>" class="img-fluid">
                                <div class="overlay">
                                    <div class="text"><?php echo $linha["nome"]; ?></div>
                                </div>
                                <button class="btn btn-success"><?php echo $linha["nome"]; ?></button>
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </main>


    <script>
    // Obter url
    let url = window.location.href;

// Verificar se há algum idioma selecionado
if(url.indexOf("language=fr") != -1){
    document.getElementById("idiomas").selectedIndex = 1;
    idioma_fr = true;
}else if(url.indexOf("language=pt") != -1){
    document.getElementById("idiomas").selectedIndex = 2;
    idioma_pt = true;
}else{
    document.getElementById("idiomas").selectedIndex = 0;
    idioma_en = true;
}

// Ocultar todos os menus
document.getElementById("menu_en").style.display = "none";
document.getElementById("menu_fr").style.display = "none";
document.getElementById("menu_pt").style.display = "none";

// Ocultar todas as listas de cursos
document.getElementById("cursos_en").style.display = "none";
document.getElementById("cursos_fr").style.display = "none";
document.getElementById("cursos_pt").style.display = "none";

// Exibir menu e os cursos
if (idioma_fr == true){
    document.getElementById("menu_fr").style.display = "block";
    document.getElementById("cursos_fr").style.display = "block";
}else if (idioma_pt == true){
    document.getElementById("menu_pt").style.display = "block";
    document.getElementById("cursos_pt").style.display = "block";
}else {
    document.getElementById("menu_en").style.display = "block";
    document.getElementById("cursos_en").style.display = "block";
}        
</script>

<?php include_once("footer.php"); ?>