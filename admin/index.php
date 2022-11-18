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
    <link rel="stylesheet" href="style.css">
</head>

</body>
    <!-- Topo -->
    <div class="topo" style="position:fixed; width:100%">
        <p>WSL TECHNOLOGY SCHOOL</p>
    </div>

    <!-- Login -->
    <main>
        <div class="container login">
            <div class="row">

                <?php
                    // Caso o login falhe
                    if(isset($_GET["falhaLogin"])){
                        echo "<div class='alert alert-danger'>E-mail or password incorrect, try again.</div>";
                    } 

                    // Caso não haja sessão
                    if(isset($_GET["falhaAutenticacao"])){
                        echo "<div class='alert alert-danger'>Session expired, please login again.</div>";
                    } 

                    // Caso sair do sistema
                    if(isset($_GET["logoff"])){
                        echo "<div class='alert alert-success'>Logout successfully performed.</div>";
                    } 
                ?>

                <div class="col-lg-6">
                    <img src="images/professor.jpg">
                </div>

                <div class="col-lg-6" style="display:flex; align-items: center; justify-content: center;">
                    <form action="requisitions/auth.php" method="post" style="width: 100%">
                        <h3>Login</h3>
                        <input type="text" placeholder="E-mail" name="email" maxlength="40" class="form-control">
                        <input type="password" placeholder="Password" name="senha" maxlength="30" class="form-control">
                        <input type="submit" class="btn btn-success" value="Send">
                    </form>
                </div>
            </div>    
        </div>
    </main>

</body>
</html>