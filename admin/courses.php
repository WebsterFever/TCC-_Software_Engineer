<?php include_once("header.php"); ?>

    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Courses</h1>
                    <p>Manage your courses.</p>
                </div>

                <div class="col-12">
                    <?php
                        // Curso cadastrado
                        if(isset($_GET["cursoCadastrado"])){
                            echo "<div class='alert alert-success'>Course registered successfully</div>";
                        }
                        // Curso alterado
                        if(isset($_GET["cursoAlterado"])){
                            echo "<div class='alert alert-success'>Course updated successfully</div>";
                        }
                        // Curso removido
                        if(isset($_GET["cursoRemovido"])){
                            echo "<div class='alert alert-success'>Course removed successfully</div>";
                        }
                    ?>

                    <form action="requisitions/add_course.php" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Course name" name="curso" class="form-control">
                        <select name="idioma" class="form-control">
                            <option value="">Select the language</option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="pt">Portuguese</option>
                        </select>
                        <textarea name="sobre" placeholder="About the course" class="form-control"></textarea>
                        <fieldset>
                            <figcaption>Image</figcaption>
                            <input type="file" name="imagem" class="form-control">
                        </fieldset>
                        <fieldset>
                            <figcaption>Video</figcaption>
                            <input type="file" name="video" class="form-control">
                        </fieldset>
                        <input type="submit" value="Register" class="btn btn-success">
                    </form>

                </div>

                <hr>

                <div class="col-12">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Course name</th>
                                <th>Course language</th>
                                <th>Edit course</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                // Conexão
                                include_once("../connection.php");

                                // SQL
                                $sql = "SELECT * FROM cursos";
                                $resultado = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $linha["nome"]; ?></td>
                                <td>
                                    <?php  
                                        switch($linha["idioma"]){
                                            case "en": echo "English"; break;
                                            case "fr": echo "French"; break;
                                            case "pt": echo "Portuguese"; break;
                                        }
                                    ?>
                                </td>
                                <td><a href='edit_courses.php?codigo=<?php echo $linha["codigo"]; ?>' class='btn btn-success'>Edit</a</td>
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