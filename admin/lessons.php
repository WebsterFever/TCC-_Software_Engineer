<?php include_once("header.php"); ?>

    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Lessons</h1>
                    <p>Manage your lessons.</p>
                </div>

                <div class="col-12">
                    <?php
                        // Curso cadastrado
                        if(isset($_GET["aulaCadastrada"])){
                            echo "<div class='alert alert-success'>Lesson registered successfully</div>";
                        }
                        // Curso alterado
                        if(isset($_GET["aulaAlterada"])){
                            echo "<div class='alert alert-success'>Lesson updated successfully</div>";
                        }
                        // Curso removido
                        if(isset($_GET["aulaRemovida"])){
                            echo "<div class='alert alert-success'>Lesson removed successfully</div>";
                        }
                    ?>

                    <form action="requisitions/add_lesson.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Lesson name (E.g: Texts in HTML or Work with bords)" name="aula" class="form-control">
                        <select name="curso" class="form-control">
                            <option value="0">Select the course</option>
                            
                            <?php

                                // Conexão
                                include_once("../connection.php");

                                // SQL
                                $sql = "SELECT codigo, nome, idioma FROM cursos";

                                $resultado = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {

                                    $idioma = "English";

                                    switch($linha["idioma"]){
                                        case "fr": $idioma = "French"; break;
                                        case "pt": $idioma = "Portuguese"; break;
                                    }

                            ?>

                                <option value="<?php echo $linha['codigo'] ?>"><?php echo $linha["nome"] . " ($idioma)"; ?></option>

                            <?php } ?>
                            
                        </select>

                        <input type="file" name="video" class="form-control">
                        
                        <textarea  name="sobre" placeholder="About the lesson" class="form-control"></textarea>
                        
                        <fieldset class="form-control">
                            <input type="checkbox" name="comentarios" value="1">
                            <label>Comments</label>
                            
                            
                            <input type="checkbox" name="duvidas" value="1" style="margin-left:30px">
                            <label>Doubts</label>
                        </fieldset>
                        
                        <hr>
                        <p style="font-size: 20px; margin-bottom: 10px;">Extra materials</p>
                        <textarea placeholder="Text about extra materials" name="texto_materiais" class="form-control"></textarea>
                        <input type="file" name="materiais" class="form-control">
   
                        <input type="submit" value="Register" class="btn btn-success">
                    </form>

                </div>

                <hr>

                <div class="col-12">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Lesson name</th>
                                <th>Course name</th>
                                <th>Language</th>
                                <th>Edit lesson</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                // SQL
                                $sql = "SELECT aulas.codigo AS c, cursos.nome AS cn, aulas.nome AS an, cursos.idioma AS i FROM aulas INNER JOIN cursos ON aulas.codigo_curso = cursos.codigo";
                                $resultado = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $linha["an"]; ?></td>
                                <td><?php echo $linha["cn"]; ?></td>
                                <td>
                                <?php  
                                        switch($linha["i"]){
                                            case "en": echo "English"; break;
                                            case "fr": echo "French"; break;
                                            case "pt": echo "Portuguese"; break;
                                        }
                                    ?>
                                </td>
                                <td><a href='edit_lessons.php?codigo=<?php echo $linha["c"]; ?>' class='btn btn-success'>Edit</a</td>
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