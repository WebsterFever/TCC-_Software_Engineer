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
    <meta name="description" content="A Webster Seven Languages ​​é uma escola de tecnologia online (WSL TECHNOLOGY SCHOOL) localizada no brasil com o objetivo de ensinar haitianos na área de Tecnologia e Programação e habilidade em idiomas"/>
    <meta name="keywords" content="Antivirus, Computer, Disc, Pen-drive, Mouse, Print, Instagrame, Facebbok, Account, youtube">
    <title>WSL TECHNOLOGY SCHOOL</title>

    

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Alterar idioma -->
    <script>
        function idioma(i){

            switch(i){
                case "francais":
                window.location.assign(window.location.pathname+"?language=fr")
                break;

                case "portugues":
                window.location.assign(window.location.pathname+"?language=pt")
                break;

                default:
                window.location.assign(window.location.pathname+"?language=en")    
            }

        }
    </script>

    <!-- Ao carregar a página -->
    <script>
        // Idioma selecionado
        let idioma_fr = false;
        let idioma_pt = false;
        let idioma_en = false;

        // Ao carregar
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

        }
    </script>
</head>
<body>

    <!-- Idiomas -->
    <div class="idiomas">
        <a href="index.php"><img src="images/logo.png"></a>
        <select onchange="idioma(this.value)" id="idiomas">
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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About WSL</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="countries.php">Meet other countries</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="login.php"><span class="loginMenu"><i class="fa-solid fa-user"></i> Login</span></a>
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
                        <a class="nav-link" href="about.php?language=pt">Sobre WSL</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php?language=pt">Conheça outros países</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php?language=pt">Contato</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="login.php?language=pt"><span class="loginMenu"><i class="fa-solid fa-user"></i> Login</span></a>
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
                        <a class="nav-link" href="about.php?language=fr">À propos de WSL</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="countries.php?language=fr">Découvrir d'autres pays</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php?language=fr">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="login.php?language=fr"><span class="loginMenu"><i class="fa-solid fa-user"></i> Se connecter</span></a>
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