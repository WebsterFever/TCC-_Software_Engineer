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
    
    // Obtêm o nome do aluno
    $sql2 = "SELECT nome FROM alunos WHERE email = '$student_mail'";

    // Executar e armazenar dados
    $dados = $conn->query($sql2);
    
    // Laço de repetição
    while($linha = mysqli_fetch_assoc($dados)){
        $nome = $linha["nome"];
    }
?>

<style>
    #chat{
        border: solid 1px black;
        width: 80%;
        height: 600px;
        overflow-y: scroll;
        margin: 20px auto;
        margin-bottom: 0px;
    }
    
    #mensagem{
        border: solid 1px black;
        width: 80%;
        height: 110px;
        margin: 20px auto;
        margin-top: 10px;
    }

    .txt{
        padding: 5px 2px;
    }

    /*.txt:nth-child(odd){*/
    /*    background-color:#F28774;*/
    /*}*/

    .txt p{
        padding: 0px;
        margin: 0px;
    }

    .txt p:first-child{
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .vermelho_claro{
        background-color: #f59a9a;
    }
    
    .azul_claro{
        background-color: #abceff;
    }
    
    .cinza_claro{
        background-color: #ebebeb;
    }
    
    .amarelo_claro{
        background-color: #fffda3;
    }
    
    .rosa_claro{
        background-color: #ffa3f6;
    }
    
    .verde_claro{
        background-color: #b1ffa3;
    }
    
    .roxo_claro{
        background-color: #d3a3ff;
    }
</style>

<script>
    // Idioma selecionado
        let idioma_fr = false;
        let idioma_pt = false;
        let idioma_en = false;

    window.onload = function(){
        
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

        
            // Exibir menu e os cursos
            if (idioma_fr == true){
                document.getElementById("menu_fr").style.display = "block";
            }else if (idioma_pt == true){
                document.getElementById("menu_pt").style.display = "block";
            }else {
                document.getElementById("menu_en").style.display = "block";
            }

            // Bloquear os idiomas nas páginas de cursos
            if(window.location.href.indexOf("course.php") != -1){
                document.getElementById("idiomas").disabled = true;
            }
        
        //---------------------------------

        listar();

        setInterval(() => {
            listar();
        }, 15000);
    }

    function listar(){
        let chat = document.getElementById("chat");
        
        
        
        fetch("chat_selecionar.php")
        .then(retorno => retorno.json())
        .then(retorno => {
            
            vetor = retorno.mensagens;
            console.log(vetor);
            
 
            
 
            
            chat.innerHTML = "";
            
            let contador = 0;
            
            for(let i=0; i<vetor.length; i++){
                
                let estruturaMensagem = document.createElement("div");
                estruturaMensagem.classList.add("txt");
                
                if(contador == 0){
                    estruturaMensagem.classList.add("roxo_claro");
                }else if(contador == 1){
                    estruturaMensagem.classList.add("verde_claro");
                }else if(contador == 2){
                    estruturaMensagem.classList.add("amarelo_claro");
                }else if(contador == 3){
                    estruturaMensagem.classList.add("rosa_claro");
                }else if(contador == 4){
                    estruturaMensagem.classList.add("azul_claro");
                }else if(contador == 5){
                    estruturaMensagem.classList.add("vermelho_claro");
                }else if(contador == 6){
                    estruturaMensagem.classList.add("cinza_claro");
                }
                
                let usuario_data_hora = document.createElement("p");
                let texto_usuario_data_hora = document.createTextNode(vetor[i].usuario + " - " + vetor[i].data_hora);
                usuario_data_hora.appendChild(texto_usuario_data_hora);
                
                let mensagem_usuario = document.createElement("p");
                let texto_mensagem_usuario = document.createTextNode(vetor[i].mensagem);
                mensagem_usuario.appendChild(texto_mensagem_usuario);
                
                estruturaMensagem.appendChild(usuario_data_hora);
                estruturaMensagem.appendChild(mensagem_usuario);
                
                chat.appendChild(estruturaMensagem);
                
                contador++;
                
                if(contador == 7){
                    contador = 0;
                }
                
            }
            
            chat.scrollTop += chat.scrollHeight;
        });
    }

    function enviarMensagem(){
        // Obter o elemento mensagem
        let mensagem = document.getElementById("mensagem");
        
        // Obter o nome do aluno
        let aluno = document.getElementById("nome_aluno").value;

        // Obter o chat
        let chat = document.getElementById("chat");

        // Enviar para o banco de dados
        fetch("chat_cadastrar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "mensagem": mensagem.value,
            "usuario": aluno
        })
    })
    .then(retorno => retorno.json())
    .then(retorno => {
        let estruturaMensagem = document.createElement("div");
        estruturaMensagem.classList.add("txt");

        let usuario_data_hora = document.createElement("p");
        let texto_usuario_data_hora = document.createTextNode(retorno.usuario + " - " + retorno.data_hora);
        usuario_data_hora.appendChild(texto_usuario_data_hora);

        let mensagem_usuario = document.createElement("p");
        let texto_mensagem_usuario = document.createTextNode(retorno.mensagem);
        mensagem_usuario.appendChild(texto_mensagem_usuario);

        estruturaMensagem.appendChild(usuario_data_hora);
        estruturaMensagem.appendChild(mensagem_usuario);

        chat.appendChild(estruturaMensagem);

        // Scroll
        chat.scrollTop += chat.scrollHeight;
    });

        // Apagar o valor do textarea
        mensagem.value = "";
    }
</script>




<!DOCTYPE php>
<html lang="en">
<head>
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!-- Idiomas -->
    <div class="idiomas">
        <a href="index.php"><img src="../images/logo.png"></a>
        <select onchange="idioma(this.value)" id="idiomas" disabled>
            <option value="english">🇺🇸 English</option>
            <option value="francais">🇫🇷 Français</option>
            <option value="portugues">🇧🇷 Português</option>
        </select>
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
                        <a class="nav-link" href="chat.php">Chat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php">Meet other countries</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logoff.php?language=en">Logoff</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: blue; border-color:blue"><span class="loginMenu"><i class="fa-solid fa-user"></i> <?php echo $nome ?></a>
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

    <!-- Barra de navegação - PORTUGUÊS -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="menu_pt">
        <div class="container-fluid">
            
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?language=pt">Início</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="chat.php">Chat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php?language=pt">Conheça outros países</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logoff.php?language=pt">Desconectar</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: blue; border-color:blue"><span class="loginMenu"><i class="fa-solid fa-user"></i> <?php echo $nome ?></a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="get" action="index.php">
                    <input class="form-control me-2" name="pesquisa" type="search" placeholder="Pesquise um curso" aria-label="Search">
                    <input type="hidden" name="language" value="pt">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>


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
                        <a class="nav-link" href="chat.php">Chat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php?language=fr">Découvrir d'autres pays</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logoff.php?language=fr">Se déconnecter</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: blue; border-color:blue"><span class="loginMenu"><i class="fa-solid fa-user"></i> <?php echo $nome ?></a>
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



    <!-- Conteúdo principal -->
    <main>



<div id="chat"></div>
<input type="hidden" value="<?php echo $nome; ?>" id="nome_aluno">
<textarea id="mensagem" style="margin-left:10%;" maxlength="230" placeholder="Your message"></textarea>
<br>

<div style="width:100%; text-align:center;">
<input type="button" onclick="enviarMensagem()" value="Send message" class="btn btn-primary" style="width:240px;">
</div>

</main>

<?php include_once("../footer.php"); ?>