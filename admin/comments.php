<?php include_once("header.php"); ?>

    <main>
        <div class="container">
            <div class="row cursos">
                <div class="col-12">
                    <h1>Comments</h1>
                    <p>Manage your comments.</p>
                </div>


                <div class="col-12">
                    <?php
                        // Comentário removido
                        if(isset($_GET["comentarioRemovido"])){
                            echo "<div class='alert alert-success'>Comment removed successfully</div>";
                        }
                    ?>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Lesson name</th>
                                <th>Course name</th>
                                <th>Comment</th>
                                <th>Remove</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                // Conexão
                                include_once("../connection.php");
                            
                                // SQL
                                $sql = "SELECT 
                                        	aulas.codigo AS c,
                                            cursos.nome AS cn, 
                                            aulas.nome AS an, 
                                            comentarios.comentario AS comentario,     comentarios.codigo AS codigo_comentario
                                        FROM aulas 
                                        INNER JOIN cursos 
                                        ON aulas.codigo_curso = cursos.codigo 
                                        INNER JOIN comentarios 
                                        ON comentarios.codigo_aula = aulas.codigo";
                                $resultado = $conn->query($sql);

                                // Laço de repetição
                                while($linha = $resultado->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $linha["an"]; ?></td>
                                <td><?php echo $linha["cn"]; ?></td>
                                <td><?php echo $linha["comentario"]; ?></td>
                                <td><a href='requisitions/remove_comment.php?codigo=<?php echo $linha["codigo_comentario"]; ?>' class='btn btn-danger'>Remove</a</td>
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