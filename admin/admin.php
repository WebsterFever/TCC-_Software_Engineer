<?php include_once("header.php"); ?>

    <!-- Painel -->
    <main>
        
        <div class="container">
            <div class="row">
                <?php

                    // Conexão
                    include_once("../connection.php");

                    // SQL
                    $sql = "SELECT perguntas.codigo AS codigo, perguntas.codigo_aluno AS codigo_aluno, perguntas.arquivo AS arquivo, perguntas.codigo AS codigo_pergunta, perguntas.codigo_aula AS codigo_aula, perguntas.mensagem AS mensagem, alunos.nome AS aluno, aulas.nome AS aula, aulas.codigo_curso AS curso, perguntas.data_hora AS data_hora FROM perguntas INNER JOIN alunos ON perguntas.codigo_aluno = alunos.codigo INNER JOIN aulas ON perguntas.codigo_aula = aulas.codigo WHERE perguntas.situacao = 'Pendente'";
                    $resultado = $conn->query($sql);
                    if($resultado->num_rows > 0){
                        echo "<div class='col-lg-12 titulo_perguntas'><h1>Hey teacher, some students have doubts</h1></div>";
                        while($linha = $resultado->fetch_assoc()){

                            // Obter o curso
                            $sqlCurso = "SELECT cursos.nome AS curso FROM cursos INNER JOIN aulas ON aulas.codigo_curso = cursos.codigo WHERE aulas.codigo = $linha[codigo_aula]";
                            $resultadoCurso = $conn->query($sqlCurso);
                            while($linhaCurso = $resultadoCurso->fetch_assoc()){
                                $curso = $linhaCurso["curso"];
                            }
                ?>

                        <div class="col-lg-12">
                            <div class="card perguntas">
                                <h3><?php echo $linha["mensagem"]; ?></h3>
                                <p><b>Course:</b> <?php echo $curso ?></p>
                                <p><b>Lesson:</b> <?php echo $linha["aula"]; ?></p>
                                <p><b>Student:</b> <?php echo $linha["aluno"]; ?></p>
                                <p><b>Date:</b> <?php echo $linha["data_hora"]; ?></p>
                                <?php
                                    if($linha["arquivo"] != ""){
                                ?>
                                
                                <p><b>Attachment:</b> <a href="../question_files/<?php echo $linha['arquivo']; ?>" target="_blank" rel="noopener noreferrer">Download file</a></p>
                                
                                <?php        
                                    }
                                ?>
                                <form action="answer_questions.php" method="post" enctype="multipart/form-data">
                                    <!--<textarea name="mensagem" placeholder="" class="form-control"></textarea>-->
                                    
                                    <div id="sample">
                            <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
                            <script type="text/javascript">
                                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                            </script>
                            <textarea maxlengt="250" name="mensagem" class="form-control" style="height:200px;"></textarea>
                            </div>
                                    <input type="file" name="arquivo" style="margin-top: 20px">
                                    <br>
                                    <input type="hidden" name="codigo_pergunta" value="<?php echo $linha["codigo_pergunta"] ?>">
                                    <input type="hidden" name="codigo_aula" value="<?php echo $linha["codigo_aula"] ?>">
                                    <input type="hidden" name="codigo_aluno" value="<?php echo $linha["codigo_aluno"] ?>">
                                    <input type="submit" value="Send" class="btn btn-success">
                                </form>
                                
                                <button type="button" style="width:200px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $linha["codigo"]; ?>">
  See old questions
</button>
                                
                                
                                <div class="modal fade" id="modal<?php echo $linha["codigo"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Questions</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <?php
                                
                                        $codigoAula = $linha['codigo_aula'];
                                        $codigoAluno = $linha['codigo_aluno'];
                                        
                                        $sqlPerguntaAluno = "SELECT * FROM perguntas WHERE codigo_aula = $codigoAula AND codigo_aluno = $codigoAluno";
                                        
                                        $resultadoPerguntaAluno = $conn->query($sqlPerguntaAluno);
                                        
                                        $contador = 0;
                                    
                                        while($lp = $resultadoPerguntaAluno->fetch_assoc()){
                                            if($contador % 2 == 0){
                                            echo "<div style='border: solid 1px #ccc; background-color:#e8e8e8; border-bottom: solid 1px black;margin-bottom:5px; padding:3px;'>";
                                            echo "<p><b>Question:</b> ".$lp["mensagem"]."</p>";
                                            echo "<p><b>Date:</b> ".$lp["data_hora"]."</p>";
                                            echo "<p><b>By:</b> ".$linha["aluno"]."</p>";
                                            echo "</div>";
                                            }else{
                                            echo "<div style='border: solid 1px #ccc; background-color:#bbb; border-bottom: solid 1px black; margin-bottom:5px; padding:3px;'>";
                                            echo "<p><b>Reply:</b> ".$lp["mensagem"]."</p>";
                                            echo "<p><b>Date:</b> ".$lp["data_hora"]."</p>";
                                            echo "<p><b>By:</b> Teacher</p>";
                                            echo "</div>";
                                            }
                                            
                                            $contador++;
                                        }
                                    
                                        ?>
                                      </div>
   
                                    </div>
                                  </div>
                                </div>
                                
                            
                                
                            </div>
                        </div>
                <?php
                        }
                    }else{
                ?>
                    <div class="col-lg-12 sem_perguntas">
                        <img src="images/relaxar.jpeg">
                        <h1>Good job, yours students haven't doubts.</h1>
                    </div>
                <?php } ?>
            </div>    
        </div>
    </main>

</body>
</html>