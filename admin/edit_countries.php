<?php include_once("header.php"); ?>

<?php

    // Conexão
    include_once("../connection.php");

    // Obter o código da aula
    $codigo = $_GET["codigo"];

    // SQL
    $sql = "SELECT * FROM conteudo_paises WHERE codigo = $codigo";

    $resultado = $conn->query($sql);

    // Laço de repetição
    while($linha = $resultado->fetch_assoc()) {
        $titulo = $linha["titulo"];
        $pais = $linha["pais"];
        $imagem = $linha["imagem"];
        $mensagem = $linha["mensagem"];

        $nome_sem_extensao = preg_replace("/\.[^.]+$/", "", $imagem);

        $extensao = pathinfo( $imagem, PATHINFO_EXTENSION );
    }

?>


    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Countries</h1>
                    <p>Manage the countries.</p>
                </div>

                <div class="col-12">
                    <form action="requisitions/edit_country.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
                        <input type="hidden" name="nome_sem_extensao" value="<?php echo $nome_sem_extensao ?>">
                        <input type="text" placeholder="Lesson name (E.g: Texts in HTML or Work with bords)" value="<?php echo $titulo; ?>" name="titulo" class="form-control">

                        <select name="pais" class="form-control">
                            <option><?php echo $pais ?></option>

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

                        <div id="sample" style="margin-bottom: 30px">
                        <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                        <script type="text/javascript">
                        
                                bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                        </script>
                        <textarea maxlengt="60000" name="mensagem" placeholder="About the lesson" class="form-control" style="height:200px;"><?php echo $mensagem; ?></textarea>
                        </div>

                        

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
                        

                        <input type="file" class="form-control" name="imagem" style="margin-top: 10px; width: 80%; margin-left:10%;">

                        <input type="hidden" name="extensao" value="<?php echo $extensao ?>">
   
                        <div class="centralizar-botoes">
                            <input type="submit" value="Edit" class="btn btn-success btn-edit-course">
                            <a href="requisitions/remove_country.php?codigo=<?php echo $codigo ?>" class="btn btn-danger" onclick="return (confirm('Do you really want to remove this country?'))">Remove</a>
                            <a href="countries.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>    
        </div>
    </main>

</body>
</html>