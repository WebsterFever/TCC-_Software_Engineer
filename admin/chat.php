<?php include_once("header.php"); ?>

<style>
    #chat{
        border: solid 1px black;
        width: 80%;
        height: 600px;
        overflow-y: scroll;
        margin: 20px auto;
        margin-bottom: 0px;
    }
    
    #mensagem{
        border: solid 1px black;
        width: 80%;
        height: 110px;
        margin: 20px auto;
        margin-top: 10px;
    }

    .txt{
        padding: 5px 2px;
    }

    /*.txt:nth-child(odd){*/
    /*    background-color:#F28774;*/
    /*}*/

    .txt p{
        padding: 0px;
        margin: 0px;
    }

    .txt p:first-child{
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .vermelho_claro{
        background-color: #f59a9a;
    }
    
    .azul_claro{
        background-color: #abceff;
    }
    
    .cinza_claro{
        background-color: #ebebeb;
    }
    
    .amarelo_claro{
        background-color: #fffda3;
    }
    
    .rosa_claro{
        background-color: #ffa3f6;
    }
    
    .verde_claro{
        background-color: #b1ffa3;
    }
    
    .roxo_claro{
        background-color: #d3a3ff;
    }
</style>

<script>

    window.onload = function(){
     

        listar();

        setInterval(() => {
            listar();
        }, 15000);
    }

    function listar(){
        let chat = document.getElementById("chat");
        
        
        
        fetch("chat_selecionar.php")
        .then(retorno => retorno.json())
        .then(retorno => {
            
            vetor = retorno.mensagens;
            console.log(vetor);
            
 
            
 
            
            chat.innerHTML = "";
            
            let contador = 0;
            
            for(let i=0; i<vetor.length; i++){
                
                let estruturaMensagem = document.createElement("div");
                estruturaMensagem.classList.add("txt");
                
                if(contador == 0){
                    estruturaMensagem.classList.add("roxo_claro");
                }else if(contador == 1){
                    estruturaMensagem.classList.add("verde_claro");
                }else if(contador == 2){
                    estruturaMensagem.classList.add("amarelo_claro");
                }else if(contador == 3){
                    estruturaMensagem.classList.add("rosa_claro");
                }else if(contador == 4){
                    estruturaMensagem.classList.add("azul_claro");
                }else if(contador == 5){
                    estruturaMensagem.classList.add("vermelho_claro");
                }else if(contador == 6){
                    estruturaMensagem.classList.add("cinza_claro");
                }
                
                let usuario_data_hora = document.createElement("p");
                let texto_usuario_data_hora = document.createTextNode(vetor[i].usuario + " - " + vetor[i].data_hora);
                usuario_data_hora.appendChild(texto_usuario_data_hora);
                
                let mensagem_usuario = document.createElement("p");
                let texto_mensagem_usuario = document.createTextNode(vetor[i].mensagem);
                mensagem_usuario.appendChild(texto_mensagem_usuario);
                
                estruturaMensagem.appendChild(usuario_data_hora);
                estruturaMensagem.appendChild(mensagem_usuario);
                
                chat.appendChild(estruturaMensagem);
                
                contador++;
                
                if(contador == 7){
                    contador = 0;
                }
                
            }
            
            chat.scrollTop += chat.scrollHeight;
        });
    }

    function enviarMensagem(){
        // Obter o elemento mensagem
        let mensagem = document.getElementById("mensagem");
        
        // Obter o nome do aluno
        let aluno = document.getElementById("nome_aluno").value;

        // Obter o chat
        let chat = document.getElementById("chat");

        // Enviar para o banco de dados
        fetch("chat_cadastrar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            "mensagem": mensagem.value,
            "usuario": aluno
        })
    })
    .then(retorno => retorno.json())
    .then(retorno => {
        let estruturaMensagem = document.createElement("div");
        estruturaMensagem.classList.add("txt");

        let usuario_data_hora = document.createElement("p");
        let texto_usuario_data_hora = document.createTextNode(retorno.usuario + " - " + retorno.data_hora);
        usuario_data_hora.appendChild(texto_usuario_data_hora);

        let mensagem_usuario = document.createElement("p");
        let texto_mensagem_usuario = document.createTextNode(retorno.mensagem);
        mensagem_usuario.appendChild(texto_mensagem_usuario);

        estruturaMensagem.appendChild(usuario_data_hora);
        estruturaMensagem.appendChild(mensagem_usuario);

        chat.appendChild(estruturaMensagem);

        // Scroll
        chat.scrollTop += chat.scrollHeight;
    });

        // Apagar o valor do textarea
        mensagem.value = "";
    }
</script>



    <!-- Conteúdo principal -->
    <main>

 <div class="container">
            <div class="row cursos">
                <div class="col-12">

<div id="chat"></div>
<input type="hidden" value="Webster (Teacher)" id="nome_aluno">
<textarea id="mensagem" style="margin-left:10%;" maxlength="230" placeholder="Your message"></textarea>
<br>
<input type="button" onclick="enviarMensagem()" value="Send message" class="btn btn-primary" style="width:10%; margin-left:45%">
</div></div></div>
    </main>

</body>
</html>