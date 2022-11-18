<?php include_once("header.php"); ?>

<style>
  .paises{
    text-align: center;
  }

  .paises h1{
    margin-top: 30px;
    margin-bottom: 30px;
  }

  .paises img,
  .paises video{
    margin-top: 30px auto;
    border: solid 1px #ccc;
    border-radius: 5px;
    width: 60%;
    margin-bottom: 30px;
  }

  .paises > div{
    text-align: justify;
  }
</style>


    <!-- Banner -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="../images/banners/inicio1.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>WSL TECHNOLOGY SCHOOL</h5>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="../images/banners/inicio2.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>WSL TECHNOLOGY SCHOOL</h5>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="../images/banners/inicio3.jpeg" class="d-block w-100" alt="...">
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
        <div class="container paises">
            <div class="row">

                <?php
                  if(!isset($_GET["pais"])){
                ?>

                <div class="col-12" id="paises_en">
                    <h2>Meet other countries</h2>
                </div>

                <div class="col-12" id="paises_fr">
                    <h2>Rencontrer d'autres pays</h2>
                </div>

                <div class="col-12" id="paises_pt">
                    <h2>Conheça outros países</h2>
                </div>

              
                <?php 
                  include_once("../connection.php");

                  $sql = "SELECT * FROM pais_visitado";

                  $resultado = $conn->query($sql);
     
                    while($linha = $resultado->fetch_assoc()){
                      $titulo = $linha["titulo"];  
                      $imagem = $linha["imagem"];  
                      $pais = $linha["pais"];  
                      $mensagem = $linha["mensagem"];
                      
                      $extensao = pathinfo( $imagem, PATHINFO_EXTENSION );

                      echo "<div class='paises'>";
                        echo "<h1>".$titulo."</h1>";
                        
                        if($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png" || $extensao == "webp" || $extensao == "gif"){
                          echo "<img src='../countries/$imagem'>";
                        }else{
                          echo "<video controls><source src='../countries/$imagem'></video>";
                        }

                        echo "<div>".$mensagem."</div>";
                      echo "</div>";
                    }
                  }

                ?>
      
              
            </div>  
            
            

            <!-- CONTATO -->
            <style>
              #contato_en img,
              #contato_fr img,
              #contato_pt img{
                width: 100%;
              }

              #contato_en input,
              #contato_fr input,
              #contato_pt input{
              margin-bottom: 10px;
            }

            #contato_en textarea,
            #contato_fr textarea,
            #contato_pt textarea{
              margin-bottom: 10px;
              height: 235px;
              }

              hr{
                margin-top: 30px;
              }
            </style>
            <hr>

            <div id="contato_en">
                  <div class="row">
                    <div class="col-12">
                      <h2>Contact</h2>
                      <p>To contact us, fill in the form below or call: +55 47 997330294</p>
                    </div>

                    <div class="col-xl-6">
                      <img src="../images/contato.jpeg">
                    </div>

                    <div class="col-xl-6">
                        <form action="send_contact.php" method="post" onsubmit="return valida_en()">
                          <input type="text" name="nome" id="nome_en" placeholder="Name" class="form-control">
                          <input type="text" name="email" id="email_en" placeholder="E-mail" class="form-control">
                          <input type="text" name="assunto" id="assunto_en" placeholder="Subject" class="form-control">
                          <input type="hidden" name="idioma" value="en">
                          <textarea name="mensagem" id="mensagem_en" placeholder="Message" class="form-control"></textarea>
                          <input type="submit" class="btn btn-success" value="Send">
                        </form>
                    </div>
                  </div>
                </div>



                <div id="contato_fr">
                <div class="row">

<div class="col-12">
    <h2>Contact</h2>
    <p>Pour nous contacter, remplissez le formulaire ci-dessous ou par téléphone: +55 47 997330294</p>
</div>

<div class="col-xl-6">
  <img src="../images/contato.jpeg">
</div>

<div class="col-xl-6">
  <form action="send_contact.php" method="post" onsubmit="return valida_fr()">
      <input type="text" name="nome" id="nome_fr" placeholder="Nom" class="form-control">
      <input type="text" name="email" id="email_fr" placeholder="E-mail" class="form-control">
      <input type="text" name="assunto" id="assunto_fr" placeholder="Matière" class="form-control">
      <input type="hidden" name="idioma" value="fr">
      <textarea name="mensagem" id="mensagem_fr" placeholder="Message" class="form-control"></textarea>
      <input type="submit" class="btn btn-success" value="Envoyer">
    </form>
</div>

</div>    
                </div>
                
                
                
                
                
                <div id="contato_pt">

                <div class="row">

<div class="col-12">
    <h2>Contato</h2>
    <p>Para conversar conosco, preencha o formulário abaixo ou através do telefone: +55 47 997330294</p>
</div>

<div class="col-xl-6">
  <img src="../images/contato.jpeg">
</div>

<div class="col-xl-6">
  <form action="send_contact.php" method="post" onsubmit="return valida_pt()">
      <input type="text" name="nome" id="nome_pt" placeholder="Nome" class="form-control">
      <input type="text" name="email" id="email_pt" placeholder="E-mail" class="form-control">
      <input type="text" name="assunto" id="assunto_pt" placeholder="Assunto" class="form-control">
      <input type="hidden" name="idioma" value="pt">
      <textarea name="mensagem" id="mensagem_pt" placeholder="Mensagem" class="form-control"></textarea>
      <input type="submit" class="btn btn-success" value="Enviar">
    </form>
</div>

</div>   
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

// Ocultar conteúdos da página países
document.getElementById("paises_en").style.display = "none";
document.getElementById("paises_fr").style.display = "none";
document.getElementById("paises_pt").style.display = "none";

// Ocultar formulário de contato
document.getElementById("contato_en").style.display = "none";
document.getElementById("contato_fr").style.display = "none";
document.getElementById("contato_pt").style.display = "none";

// Exibir menu e os cursos
if (idioma_fr == true){
    document.getElementById("menu_fr").style.display = "block";
  document.getElementById("paises_fr").style.display = "block";
  document.getElementById("contato_fr").style.display = "block";
}else if (idioma_pt == true){
    document.getElementById("menu_pt").style.display = "block";
    document.getElementById("paises_pt").style.display = "block";
  document.getElementById("contato_pt").style.display = "block";
}else {
    document.getElementById("menu_en").style.display = "block";
    document.getElementById("paises_en").style.display = "block";
  document.getElementById("contato_en").style.display = "block";
}
</script>


<?php include_once("../footer.php"); ?>