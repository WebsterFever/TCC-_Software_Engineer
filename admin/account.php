<?php include_once("header.php"); ?>


<?php
    // Conexão
    include_once("../connection.php");

    // Obter o código
    $codigo = addslashes($_SESSION["codigo_admin"]);
    
    // Obter todos os dados
    $sql = "SELECT * FROM admin WHERE codigo = $codigo";
    $resultado = $conn->query($sql);
    while($linha = $resultado->fetch_assoc()){
        $nome = $linha["nome"];
        $email = $linha["email"];
    }

    // Finalizar conexão
    $conn->close();
?>

<script>
    function alterarNomeEmail(){
        let nome = document.getElementById("nome").value;
        let email = document.getElementById("email").value;
        

        if(nome == ""){
            alert("Inform the name.")
            return false;
        }else if(email == ""){
            alert("Inform the e-mail.")
            return false;
        }
    }

    function alterarSenha(){
        let senha1 = document.getElementById("senha2").value;
        let senha2 = document.getElementById("senha2").value;
        let senha3 = document.getElementById("senha3").value;
        

        if(senha1 == "" || senha3 == "" || senha3 == ""){
            alert("Inform all passwords.")
            return false;
        }else if(senha2 != senha3){
            alert("Passwords must be the same.")
            return false;
        }
    }
</script>

    <!-- Login -->
    <main>
        <div class="container conta">
            <div class="row">

            <?php
                if(isset($_GET["dadosAtualizados"])){
                    echo "<div class='alert alert-success'>Updated name and email.</div>";
                }

                if(isset($_GET["falhaEmail"])){
                    echo "<div class='alert alert-success'>Invalid e-mail.</div>";
                }

                if(isset($_GET["senhaAtualizada"])){
                    echo "<div class='alert alert-success'>Updated password.</div>";
                }

                if(isset($_GET["senhaAtualIncorreta"])){
                    echo "<div class='alert alert-danger'>Your actual password is wrong, try again.</div>";
                }
            ?>
                <div class="col-lg-6">
                    <img src="images/atualizar.jpeg">
                </div>

                <div class="col-lg-6" style="margin-top: 50px">
                    <form action="requisitions/change_name_email.php" method="post" onsubmit="return alterarNomeEmail()">
                        <h3>Change name or e-mail</h3>
                        <input type="text" placeholder="Name" id="nome" name="nome" value="<?php echo $nome ?>" class="form-control">
                        <input type="text" placeholder="E-mail" id="email" name="email" value="<?php echo $email ?>" class="form-control">
                        <input type="submit" class="btn btn-success" value="Update">
                    </form>

                    <!-- <hr>

                    <form action="requisitions/password.php" method="post">
                        <h3>Change picture</h3>
                        <input type="file" class="form-control">
                        <input type="submit" class="btn btn-success" value="Update">
                    </form> -->
                
                    <hr>

                    <form action="requisitions/password.php" method="post" onsubmit="return alterarSenha()">
                        <h3>Change password</h3>
                        <input type="password" placeholder="Actual password" id="senha1" name="senha1" maxlength="30" class="form-control">
                        <input type="password" placeholder="New password" id="senha2" name="senha2" maxlength="30" class="form-control">
                        <input type="password" placeholder="Repeat new password" id="senha3" name="senha3" maxlength="30" class="form-control">
                        <input type="submit" class="btn btn-success" value="Update">
                    </form>
                </div>
            </div>    
        </div>
    </main>

</body>
</html>