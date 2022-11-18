<?php include_once("header.php"); ?>

    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Countries</h1>
                    <p>Manage the countries.</p>
                </div>

                <div class="col-12">
                    <?php
                        // Curso cadastrado
                        if(isset($_GET["paisCadastrado"])){
                            echo "<div class='alert alert-success'>Country registered successfully</div>";
                        }
                        // Curso alterado
                        if(isset($_GET["paisAlterado"])){
                            echo "<div class='alert alert-success'>Country updated successfully</div>";
                        }
                        // Curso removido
                        if(isset($_GET["paisRemovido"])){
                            echo "<div class='alert alert-success'>Country removed successfully</div>";
                        }
                    ?>

                    <form action="requisitions/add_country.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Title" name="titulo" class="form-control">
                        <select name="pais" class="form-control">
                            <option value="">Select country</option>

                            <?php
                                // Conexão
                                include_once("../connection.php");

                                // SQL
                                $sql = "SELECT nome2 FROM paises";
                                $resultados = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultados->fetch_assoc()){
                                    echo "<option>".$linha["nome2"]."</option>";
                                }
                            ?>

                        </select>

                        <fieldset>
                            <input type="file" name="imagem" class="form-control">
                        </fieldset>
                        
                        <div id="sample">
                        <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                        <script type="text/javascript">
                        
                                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                        </script>
                        <textarea maxlengt="60000" name="mensagem" class="form-control" style="height:200px;"></textarea>
                        </div>

                        <input type="submit" value="Register" class="btn btn-success" style="margin-top: 10px">
                    </form>

                </div>

                <hr>

                <div class="col-12">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cuntry</th>
                                <th>Title</th>
                                <th>Edit country</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                // SQL
                                $sql = "SELECT * FROM conteudo_paises";
                                $resultado = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $linha["pais"]; ?></td>
                                <td><?php echo $linha["titulo"]; ?></td>
                                <td><a href='edit_countries.php?codigo=<?php echo $linha["codigo"]; ?>' class='btn btn-success'>Edit</a</td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </main>

</body>
</html>