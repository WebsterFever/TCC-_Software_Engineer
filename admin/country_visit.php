<?php 
    // Topo
    include_once("header.php");
    
    // Conexão
    include_once("../connection.php");

    // Verificar se há algum país visitado cadastrado
    $sql = "SELECT * FROM pais_visitado";
    $resultado = $conn->query($sql);
    $existe = false;
    while($linha = $resultado->fetch_assoc()){
        $existe = true;
        $titulo = $linha["titulo"];
        $pais = $linha["pais"];
        $imagem = $linha["imagem"];
        $mensagem = $linha["mensagem"];


        $extensao = pathinfo( $imagem, PATHINFO_EXTENSION );
    }
?>

    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Country to visit</h1>
                </div>

                <div class="col-12">
                    <?php
                        // País cadastrado
                        if(isset($_GET["paisCadastrado"])){
                            echo "<div class='alert alert-success'>Country registered successfully</div>";
                        }
                        // País alterado
                        if(isset($_GET["paisAlterado"])){
                            echo "<div class='alert alert-success'>Country updated successfully</div>";
                        }
                        // País removido
                        if(isset($_GET["paisRemovido"])){
                            echo "<div class='alert alert-success'>Country removed successfully</div>";
                        }
                    ?>

                    <?php
                        if($existe){
                    ?>


                    <form action="requisitions/edit_country_visit.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Title" value="<?php echo $titulo ?>" name="titulo" class="form-control">
                        <select name="pais" class="form-control">
                            <option value="<?php echo $pais ?>"><?php echo $pais ?></option>

                            <?php

                                // SQL
                                $sql = "SELECT nome2 FROM paises";
                                $resultados = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultados->fetch_assoc()){
                                    echo "<option>".$linha["nome2"]."</option>";
                                }
                            ?>

                        </select>

                        <?php
                            if($imagem != ""){
                                if($extensao == "jpg" || $extensao == "jpeg" || $extensao == "png" || $extensao == "webp" || $extensao == "gif"){
                            ?>
                                <img src="../countries/<?php echo $imagem ?>" style="width: 80%; margin-left:10%; box-sizing:border-box; border: 1px solid #ccc; border-radius: 5px;">
                            <?php     
                            }else{
                            ?>
                                <video controls style="width: 80%; margin-left:10%; box-sizing:border-box; border: 1px solid #ccc; border-radius: 5px;"><source src="../countries/<?php echo $imagem ?>"></video>    
                            <?php
                                }
                            }
                        ?>

                        <fieldset>
                            <input type="file" name="imagem" class="form-control" style="margin-top:20px">
                        </fieldset>
                        
                        <div id="sample">
                        <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                        <script type="text/javascript">
                                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                        </script>
                        <textarea maxlengt="60000" name="mensagem" class="form-control" style="height:200px;"><?php echo $mensagem ?></textarea>
                        </div>

                        <input type="submit" value="Update" class="btn btn-warning" style="margin-top: 15px">
                        <a href="requisitions/remove_country_visit.php" class="btn btn-danger">Remove</a>
                    </form>



                    <?php }else{ ?>
                        <form action="requisitions/add_country_visit.php" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="Title" name="titulo" class="form-control">
                            <select name="pais" class="form-control">
                                <option value="">Select country</option>

                                <?php

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
                    <?php } ?>

                </div>

     
            </div>    
        </div>
    </main>

</body>
</html>