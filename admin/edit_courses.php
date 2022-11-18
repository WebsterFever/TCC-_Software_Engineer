<?php include_once("header.php"); ?>

    <?php

        // Conexão
        include_once("../connection.php");

        // Obter o código do curso
        $codigo = $_GET["codigo"];

        // Variáveis
        $curso = "";
        $idioma = "";
        $imagem = "";
        $video = "";
        $nome_sem_extensao = "";

        // SQL
        $sql = "SELECT * FROM cursos WHERE codigo = $codigo";
        $resultado = $conn->query($sql);

        // Laço de repetição
        while($linha = $resultado->fetch_assoc()) {
            $curso = $linha["nome"];
            $idioma = $linha["idioma"];
            $sobre = $linha["sobre"];
            $imagem = $linha["imagem"];
            $video = $linha["video"];

            $nome_sem_extensao = preg_replace("/\.[^.]+$/", "", $video);
        }

        // Finalizar conexão
        $conn->close();

    ?>
    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Edit courses</h1>
                    <p>Manage your courses.</p>
                </div>

                <div class="col-12">
                    <form action="requisitions/edit_course.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
                        <input type="text" placeholder="Course name" value="<?php echo $curso ?>" name="curso" class="form-control">
                        <select name="idioma" class="form-control">
                            <option value="<?php echo $idioma ?>">
                                <?php  
                                    switch($idioma){
                                        case "en": echo "English"; break;
                                        case "fr": echo "French"; break;
                                        case "pt": echo "Portuguese"; break;
                                    }
                                ?>
                            </option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="pt">Portuguese</option>
                        </select>

                        <textarea name="sobre" placeholder="About the course" class="form-control"><?php echo $sobre ?></textarea>
                    
                        <div class="container imagem_video_curso">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <img src="../courses/images/<?php echo $imagem ?>">
                                        <input type="file" name="imagem" class="form-control">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset>
                                        <video controls>
                                            <source src="../courses/videos/<?php echo $video ?>">
                                        </video>
                                        <input type="file" name="video" class="form-control">
                                    </fieldset>
                                </div>
                            </div>
                        </div>            

                        <input type="hidden" name="nome_antigo" value="<?php echo $nome_sem_extensao ?>">

                        <div class="centralizar-botoes">
                            <input type="submit" value="Edit" class="btn btn-success btn-edit-course">
                            <a href="requisitions/remove_course.php?codigo=<?php echo $codigo ?>" class="btn btn-danger" onclick="return (confirm('Do you really want to remove this course?'))">Remove</a>
                            <a href="courses.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>    
        </div>
    </main>

</body>
</html>