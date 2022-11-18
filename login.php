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

        <div class="container login" id="login_en">
            <div class="row">

                <div class="col-12">
                    <h2>Login</h2>
                    <p>Login to your account or create a free account:</p>
                </div>

                <?php
                    if(isset($_GET["language"])){

                        // INGLÊS
                        if($_GET["language"] == "en"){
                            // Caso o login falhe
                            if(isset($_GET["falhaLogin"])){
                                echo "<div class='alert alert-danger'>E-mail or password incorrect, try again.</div>";
                            } 

                            // E-mail errado
                            if(isset($_GET["falhaEmail"])){
                                echo "<div class='alert alert-danger'>Incorrect e-mail, try again.</div>";
                            } 

                            // Caso não haja sessão
                            if(isset($_GET["falhaAutenticacao"])){
                                echo "<div class='alert alert-danger'>Session expired, please login again.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["camposPreenchidos"])){
                                echo "<div class='alert alert-danger'>Fill in all fields.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["senhasDiferentes"])){
                                echo "<div class='alert alert-danger'>Passwords must be the same.</div>";
                            } 
                        }

                        // FRANCÊS
                        if($_GET["language"] == "fr"){
                            // Caso o login falhe
                            if(isset($_GET["falhaLogin"])){
                                echo "<div class='alert alert-danger'>E-mail ou mot de passe incorrect, réessayez.</div>";
                            } 

                            // E-mail errado
                            if(isset($_GET["falhaEmail"])){
                                echo "<div class='alert alert-danger'>L'email fourni n'est pas valide.</div>";
                            } 

                            // Caso não haja sessão
                            if(isset($_GET["falhaAutenticacao"])){
                                echo "<div class='alert alert-danger'>Session expirée, veuillez vous reconnecter.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["camposPreenchidos"])){
                                echo "<div class='alert alert-danger'>Remplissez tous les champs.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["senhasDiferentes"])){
                                echo "<div class='alert alert-danger'>Les mots de passe doivent être identiques.</div>";
                            } 
                        }

                        // PORTUGUÊS
                        if($_GET["language"] == "pt"){
                            // Caso o login falhe
                            if(isset($_GET["falhaLogin"])){
                                echo "<div class='alert alert-danger'>E-mail ou senha incorretos, tente novamente.</div>";
                            } 

                            // E-mail errado
                            if(isset($_GET["falhaEmail"])){
                                echo "<div class='alert alert-danger'>O e-mail informado não é válido.</div>";
                            } 

                            // Caso não haja sessão
                            if(isset($_GET["falhaAutenticacao"])){
                                echo "<div class='alert alert-danger'>Sessão encerrada, favor efetuar o login novamente.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["camposPreenchidos"])){
                                echo "<div class='alert alert-danger'>Preencha todos os campos.</div>";
                            } 

                            // Caso os campos não estejam todos preenchidos
                            if(isset($_GET["senhasDiferentes"])){
                                echo "<div class='alert alert-danger'>As senhas precisam ser iguais.</div>";
                            } 
                        }

                    }
                ?>

                <div class="col-lg-5">
                    <img src="images/login.jpg">
                </div>

                <div class="col-lg-6 offset-lg-1">
                    <form action="requisitions/auth.php" method="post">
                        <h3>Login</h3>
                        <input type="text" placeholder="E-mail" name="email" id="email_en" class="form-control">
                        <input type="password" placeholder="Password" name="senha" class="form-control">
                        <input type="submit" class="btn btn-success" value="Send">
                        <input type="hidden" name="idioma" value="en">
                        <input type="button" class="btn btn-secondary" onclick="senha_en()" style="margin-top:10px" value="Forgot password">
                    </form>

                    <hr>

                    <form action="requisitions/create_account.php" method="post">
                        <h3>Create account</h3>
                        <input type="text" placeholder="Name" name="nome" class="form-control">
                        <input type="text" placeholder="E-mail" name="email" class="form-control">
                        <input type="password" placeholder="Password" name="senha" class="form-control">
                        <input type="password" placeholder="Repeat password" name="senha2" class="form-control">
                        <input type="hidden" name="idioma" value="en">
                        <input type="submit" class="btn btn-success" value="Send">
                    </form>
                </div>

              
            </div>    
        </div>

    </main>

 <!-- Conteúdo principal - FRANCÊS -->
 <main>

    <div class="container login" id="login_fr">
        <div class="row">

            <div class="col-12">
                <h2>Se connecter</h2>
                <p>Connectez-vous à votre compte ou créez un compte gratuit:</p>
            </div>

            <div class="col-lg-5">
                <img src="images/login.jpg">
            </div>

            <div class="col-lg-6 offset-lg-1">
                <form action="requisitions/auth.php" method="post">
                    <h3>Se connecter</h3>
                    <input type="text" placeholder="E-mail" name="email" id="email_fr" class="form-control">
                    <input type="password" placeholder="Mot de passe" name="senha" class="form-control">
                    <input type="submit" class="btn btn-success" value="Envoyer">
                    <input type="hidden" name="idioma" value="fr">
                    <input type="button" class="btn btn-secondary" onclick="senha_fr()" style="margin-top:10px" value="Mot de passe oublié">
                </form>

                <hr>

                <form action="requisitions/create_account.php" method="post">
                    <h3>Créer un compte</h3>
                    <input type="text" placeholder="Nom" name="nome" class="form-control">
                    <input type="text" placeholder="E-mail" name="email" class="form-control">
                    <input type="password" placeholder="Mot de passe" name="senha" class="form-control">
                    <input type="password" placeholder="Répéter le mot de passe" name="senha2" class="form-control">
                    <input type="hidden" name="idioma" value="fr">
                    <input type="submit" class="btn btn-success" value="Envoyer">
                </form>
            </div>

          
        </div>    
    </div>

</main>

 <!-- Conteúdo principal - PORTUGUÊS -->
 <main>

    <div class="container login" id="login_pt">
        <div class="row">

            <div class="col-12">
                <h2>Login</h2>
                <p>Acesse sua conta ou crie uma conta grátis:</p>
            </div>

            <div class="col-lg-5">
                <img src="images/login.jpg">
            </div>

            <div class="col-lg-6 offset-lg-1">
                <form action="requisitions/auth.php" method="post">
                    <h3>Login</h3>
                    <input type="text" placeholder="E-mail" name="email" id="email_pt" class="form-control">
                    <input type="password" placeholder="Senha" name="senha" class="form-control">
                    <input type="submit" class="btn btn-success" value="Enviar">
                    <input type="hidden" name="idioma" value="pt">
                    <input type="button" class="btn btn-secondary" onclick="senha_pt()" style="margin-top:10px" value="Esqueci minha senha">

                </form>

                <hr>

                <form action="requisitions/create_account.php" method="post">
                    <h3>Create account</h3>
                    <input type="text" placeholder="Nome" name="nome" class="form-control">
                    <input type="text" placeholder="E-mail" name="email" class="form-control">
                    <input type="password" placeholder="Senha" name="senha" class="form-control">
                    <input type="password" placeholder="Repetir senha" name="senha2" class="form-control">
                    <input type="hidden" name="idioma" value="pt">
                    <input type="submit" class="btn btn-success" value="Enviar">
                </form>
            </div>

          
        </div>    
    </div>

</main>

<script>
    // ESQUECEU A SENHA
    function senha_en(){
        let email = document.getElementById("email_en").value;
        if(email == ""){
            alert("Inform your e-mail.");
        }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
            alert("Invalid e-mail.");
        }else{
            alert("Your password was sent to your e-mail. \nVerify your spam box.")
            location.assign("forgot_password.php?language=en&email="+email);
        }
    }

    function senha_fr(){
        let email = document.getElementById("email_efr").value;
        if(email == ""){
            alert("Renseignez votre e-mail.");
        }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
            alert("Email invalide.");
        }else{
            alert("Votre mot de passe a été envoyé à votre adresse e-mail. \nVérifiez votre boîte de courrier indésirable.")
            location.assign("forgot_password.php?language=fr&email="+email);
        }
    }

    function senha_pt(){
        let email = document.getElementById("email_pt").value;
        if(email == ""){
            alert("Informe seu e-mail.");
        }else if(email.indexOf("@") == -1 || email.indexOf(".") == -1){
            alert("E-mail inválido.");
        }else{
            alert("Sua senha foi enviada para seu e-mail. \nVerifique sua caixa de spam.")
            location.assign("forgot_password.php?language=pt&email="+email);
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

// Ocultar conteúdos da página login
document.getElementById("login_en").style.display = "none";
document.getElementById("login_fr").style.display = "none";
document.getElementById("login_pt").style.display = "none";

// Exibir menu e os cursos
if (idioma_fr == true){
    document.getElementById("menu_fr").style.display = "block";
  document.getElementById("login_fr").style.display = "block";
}else if (idioma_pt == true){
    document.getElementById("menu_pt").style.display = "block";
    document.getElementById("login_pt").style.display = "block";
}else {
    document.getElementById("menu_en").style.display = "block";
    document.getElementById("login_en").style.display = "block";
}
</script>


<?php include_once("footer.php"); ?>