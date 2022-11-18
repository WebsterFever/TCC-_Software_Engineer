<?php include_once("header.php"); ?>


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
    <main>

        <!-- Cursos -->
        <div class="container contato" id="contato_en">
            <div class="row">

            <?php
                    if(isset($_GET["language"])){

                        // INGLÊS
                        if($_GET["language"] == "en"){
                            // Caso o login falhe
                            if(isset($_GET["enviado"])){
                                echo "<div class='alert alert-success' style='margin-top: 30px'>Message sent, we will get back to you shortly. Check your spam box.</div>";
                            } 
                        }

                        // FRANCÊS
                        if($_GET["language"] == "fr"){

                            if(isset($_GET["enviado"])){
                                echo "<div class='alert alert-success' style='margin-top: 30px'>Message envoyé, nous vous répondrons sous peu. Vérifiez votre boîte de courrier indésirable.</div>";
                            } 
                        }

                        // PORTUGUÊS
                        if($_GET["language"] == "pt"){
                
                            if(isset($_GET["enviado"])){
                                echo "<div class='alert alert-success' style='margin-top: 30px'>Mensagem enviada, retornaremos em breve. Verifique sua caixa de spam.</div>";
                            } 
                        }

                    }
                ?>

                <div class="col-12">
                    <h2>Contact</h2>
                    <p>To contact us, fill in the form below or call: +55 47 997330294</p>
                </div>

                <div class="col-xl-6">
                  <img src="images/contato.jpeg">
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

    </main>

    <!-- Conteúdo principal - FRANCÊS -->
    <main>

        <!-- Cursos -->
        <div class="container contato" id="contato_fr">
            <div class="row">

                <div class="col-12">
                    <h2>Contact</h2>
                    <p>Pour nous contacter, remplissez le formulaire ci-dessous ou par téléphone: +55 47 997330294</p>
                </div>

                <div class="col-xl-6">
                  <img src="images/contato.jpeg">
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

    </main>

    <!-- Conteúdo principal - PORTUGUÊS -->
    <main>

        <!-- Cursos -->
        <div class="container contato" id="contato_pt">
            <div class="row">

                <div class="col-12">
                    <h2>Contato</h2>
                    <p>Para conversar conosco, preencha o formulário abaixo ou através do telefone: +55 47 997330294</p>
                </div>

                <div class="col-xl-6">
                  <img src="images/contato.jpeg">
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

    </main>

    <script>
  function valida_en(){
        let nome = document.getElementById("nome_en").value;
        let email = document.getElementById("email_en").value;
        let assunto = document.getElementById("assunto_en").value;
        let mensagem = document.getElementById("mensagem_en").value;

        if(nome == ""){
            alert("Inform your name.");
            return false;
        }else if(email == ""){
            alert("Inform your e-mail.");
            return false;
        }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
            alert("Invalid e-mail.");
            return false;
        }else if(assunto == ""){
            alert("Inform your subject.");
            return false;
        }else if(mensagem == ""){
            alert("Inform your message.");
            return false;
        }
    }

    function valida_fr(){
      let nome = document.getElementById("nome_fr").value;
      let email = document.getElementById("email_fr").value;
      let assunto = document.getElementById("assunto_fr").value;
      let mensagem = document.getElementById("mensagem_fr").value;

      if(nome == ""){
        alert("Informer le nom.");
        return false;
      }else if(email == ""){
        alert("Renseignez votre e-mail.");
        return false;
      }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
        alert("Email invalide.");
        return false;
      }else if(assunto == ""){
        alert("Informer le sujet.");
        return false;
      }else if(mensagem == ""){
        alert("Informer le message.");
        return false;
      }
    }

    function valida_pt(){
      let nome = document.getElementById("nome_pt").value;
      let email = document.getElementById("email_pt").value;
      let assunto = document.getElementById("assunto_pt").value;
      let mensagem = document.getElementById("mensagem_pt").value;

      if(nome == ""){
        alert("Informe o nome.");
        return false;
      }else if(email == ""){
        alert("Informe seu e-mail.");
        return false;
      }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
          alert("E-mail inválido.");
          return false;
      }else if(assunto == ""){
        alert("Informe o assunto.");
        return false;
      }else if(mensagem == ""){
        alert("Informe a mensagem.");
        return false;
      }
    }


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

// Ocultar conteúdos da página contato
document.getElementById("contato_en").style.display = "none";
document.getElementById("contato_fr").style.display = "none";
document.getElementById("contato_pt").style.display = "none";

// Exibir menu e os cursos
if (idioma_fr == true){
    document.getElementById("menu_fr").style.display = "block";
  document.getElementById("contato_fr").style.display = "block";
}else if (idioma_pt == true){
    document.getElementById("menu_pt").style.display = "block";
    document.getElementById("contato_pt").style.display = "block";
}else {
    document.getElementById("menu_en").style.display = "block";
    document.getElementById("contato_en").style.display = "block";
}
    </script>


<?php include_once("footer.php"); ?>