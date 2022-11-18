<?php include_once("header.php"); ?>

    <!-- Listagem de estudantes -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 estudantes">
                    <h1>Students</h1>
                    <p>Manage students to access courses.</p>
                </div>

                <div class="col-12">

                    <?php
                        // Estudante alterado
                        if(isset($_GET["estudanteAlterado"])){
                            echo "<div class='alert alert-success'>Updated status</div>";
                        }
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Situation</th>
                            </tr>
                        </thead>

                        <?php
                            // Conexão
                            include_once("../connection.php");

                            // SQL
                            $sql = "SELECT * FROM alunos";
                            $resultado = $conn->query($sql);

                            // Laço de repetição
                            while($linha = $resultado->fetch_assoc()) {
                        ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $linha["nome"]; ?></td>
                                    <td><?php echo $linha["email"]; ?></td>
                                    <td>
                                        <?php
                                            if($linha["situacao"] == 0){
                                                echo "<a href='requisitions/student_account.php?situacao=0&codigo=$linha[codigo]' class='btn btn-danger'>Disabled</a>";
                                            }else{
                                                echo "<a href='requisitions/student_account.php?situacao=1&codigo=$linha[codigo]' class='btn btn-success'>Enabled</a>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>

                        <?php } ?>
                        
                    </table>
                </div>
            </div>    
        </div>
    </main>

</body>
</html>