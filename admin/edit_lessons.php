<?php include_once("header.php"); ?>

<?php

    // Conexão
    include_once("../connection.php");

    // Obter o código da aula
    $codigo = $_GET["codigo"];

    // SQL
    $sql = "SELECT aulas.nome, aulas.sobre, aulas.codigo_curso, cursos.nome AS nome_curso, cursos.idioma AS idioma_curso, aulas.video AS video, aulas.texto_materiais AS texto_materiais, aulas.materiais AS materiais, aulas.duvidas, aulas.comentarios FROM aulas INNER JOIN cursos ON aulas.codigo_curso = cursos.codigo WHERE aulas.codigo = $codigo";

    $resultado = $conn->query($sql);

    // Laço de repetição
    while($linha = $resultado->fetch_assoc()) {
        $nome = $linha["nome"];
        $sobre = $linha["sobre"];
        $codigo_curso = $linha["codigo_curso"];
        $nome_curso = $linha["nome_curso"];
        $video = $linha["video"];
        $texto_materiais = $linha["texto_materiais"];
        $materiais = $linha["materiais"];
        $duvidas = $linha["duvidas"];
        $comentarios = $linha["comentarios"];

        $nome_sem_extensao = preg_replace("/\.[^.]+$/", "", $video);
        
        switch($linha["idioma_curso"]){
            case "en": $idioma_curso = "English"; break;
            case "fr": $idioma_curso = "France"; break;
            case "pt": $idioma_curso = "Portuguese"; break;
        } 
    }

?>


    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Lessons</h1>
                    <p>Manage your lessons.</p>
                </div>

                <div class="col-12">
                    <form action="requisitions/edit_lesson.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
                        <input type="hidden" name="nome_sem_extensao" value="<?php echo $nome_sem_extensao ?>">
                        <input type="text" placeholder="Lesson name (E.g: Texts in HTML or Work with bords)" value="<?php echo $nome; ?>" name="aula" class="form-control">

                        <select name="curso" class="form-control">
                            <option value="<?php echo $codigo_curso ?>"><?php echo $nome_curso ?> (<?php echo $idioma_curso ?>)</option>

                            <?php
                                $sql = "SELECT codigo, nome, idioma FROM cursos WHERE codigo <> $codigo_curso";
                                $resultado = $conn->query($sql);
                                while($linha = $resultado->fetch_assoc()) {

                                    $idioma = "English";

                                    switch($linha["idioma"]){
                                        case "fr": $idioma = "French"; break;
                                        case "pt": $idioma = "Portuguese"; break;
                                    }

                            ?>
                                 <option value="<?php echo $linha["codigo"] ?>"><?php echo $linha["nome"] ?> (<?php echo $idioma ?>)</option>
                            <?php
                                }
                            ?>
                        </select>
                        
                        <fieldset class="form-control">
                            <input type="checkbox" name="comentarios" value="1" <?php if($comentarios == 1) echo "checked"; ?>>
                            <label>Comments</label>
                            
                            
                            <input type="checkbox" name="duvidas" value="1" <?php if($duvidas == 1) echo "checked"; ?> style="margin-left:30px">
                            <label>Doubts</label>
                        </fieldset>

                        <textarea  name="sobre" placeholder="About the lesson" class="form-control"><?php echo $sobre; ?></textarea>

                        <video controls style="width: 80%; margin-left:10%; box-sizing:border-box; border: 1px solid #ccc; border-radius: 5px;">
                            <source src="../lessons/<?php echo $video ?>">
                        </video>

                        <input type="file" class="form-control" name="video" style="margin-top: 10px; width: 80%; margin-left:10%;">

                        <hr>
                        <p style="font-size: 20px; margin-bottom: 10px;">Extra materials</p>
                        <textarea placeholder="Text about extra materials" name="texto_materiais" class="form-control"><?php echo $texto_materiais ?></textarea>
                        <input type="file" name="materiais" class="form-control">

                        <?php
                            if($materiais == ""){
                                echo "<p>There are no materials.</p>";
                            }else{
                                echo "<a href='../materials/$materiais'>Downoad the material</a>";
                            }
                        ?>
   
                        <div class="centralizar-botoes">
                            <input type="submit" value="Edit" class="btn btn-success btn-edit-course">
                            <a href="requisitions/remove_lesson.php?codigo=<?php echo $codigo ?>" class="btn btn-danger" onclick="return (confirm('Do you really want to remove this lesson?'))">Remove</a>
                            <a href="lessons.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>    
        </div>
    </main>

</body>
</html>