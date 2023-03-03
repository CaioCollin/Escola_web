<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mont Blanc</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <link rel="stylesheet" href="style/inputFile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- class -->
    <link rel="stylesheet" href="style/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">

    <!-- script js-->
    <script src="script.js"></script>

    <!-- esse css só esta aqui, porque php só entende alguns codigo se for na propria pagina  -->
    <style>
        #mySlides{
            display:none; 
            width: 100%;
            height: 200px;
        }
        .img2{
            width: 100%;
            height: 200px;
        }
        .formEscrever{
            background-image: url(img/imgfundotext.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .modall{
            text-align: center;
            align-items: center;
            margin-bottom:3% ;           
        }
        .modall p{
            margin-bottom:3px;
        }
        .cor{
            color:#B22222;
            position: static;
            margin-top:-300px;
            font-size:20px;
        }
    </style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container ">
            <a class="navbar-brand  animate__animated animate__bounce" href="#" style="color: white;">Mont Blanc</a>
            <div class="collapse" >
                    <a href="#features">Dúvidas</a></li>
                    <a href="#download">Contato</a></li>
            </div>
        </div>
    </nav>

    <!-- Libras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
      </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>
   
    <!-- Header -->
    <header class="masthead">
        <div class="central">
            <div class="textos">
                <h3 class="animate__animated animate__bounce">Quem somos?</h3>
                <p class="ptop">Mont Blanc é uma escola privada, que visa o melhor para seus alunos, formando com exito e insentivando-os a evolução utilizando material didático para provocar o diálogo, a reflexão e o debate com a intenção de garantir que os estudantes sejam estimulados a procurar soluções criativas para as atividades propostas e também para situações do cotidiano.  </p>
            </div>            
            <div class="containerImg">
                <img class="img1" src="img/escola.png" alt="img">
            </div>
        </div><hr>  
    </header>

    <div class="cartaz">
        <div class="img2">
            <img class="img2" id="mySlides" src="img/2.jpg" >
            <img class="img2" id="mySlides" src="img/interclasse.jpg" >
            <img class="img2" id="mySlides" src="img/1.jpg" >
        </div>
        <div class="card">                
            <p class="pTitle"> Um evento na escola</p>
            <p class="ptext">Aqui está algumas novidades, e novos eventos que ocorerá</p>
        </div>
        <img  class="img2"  id="imgCartaz" src="img/Escolaimg.jpg" alt="card">
        <div class="card">
            <p class="pTitle">Meninos  e Meninas </p>
            <p class="ptext">Desejamos interagir mais com vocês nós conte como foi suas férias. Descrevendo o que aconteceu durante suas férias, viagens, brincadeiras...</p>
        </div>
    </div>
    
    <!-- Text Área -->
    <div class="modall">
        <?php require_once("modal.php")?>
        <h3>Conte como foi suas férias</h3>
    </div>

    <section class="headerSegundo"> 
        <div class="figura" >
                <button class="agruparText" onclick="ocultarExibir()"> Fazer redação ! </button>
            <!-- função no javascript para fazer aparecer isso -->
        </div>
       <div class="figura">
            <input type="file"  id="file">
            <!-- <button class="agruparText">Enviar uma Foto da redação</button> -->
       </div>
    </section>

    <div class="formEscrever" id="formEscrever">
        <div class="escrever">
            <h4>Minhas férias </h4>
            <p>O responsavel pelo aluno por favor , ajude-o a realizar essa atividade.</p>
            <small>aqui nesse campo abaixo , você aluno ira Escrever:</small>
            <form action="#" method="post">
                <textarea class="textarea"name="redacao" id="textarea" cols="60" rows="15"></textarea>
                <input type="submit" id="btn-enviar" class="btn-enviar" name="enviarRed" value="Enviar Redação">               
            </form> 
            <!-- estou ferrificando se ele preencheu o formulario; -->   
        </div>    
        <?php
                if($GLOBALS['formulario'] == false){
                    echo "<h3 class='cor'> fazer Formulário para poder fazer redação.!!!</h3>";
                    
                }
                
               if(isset($_POST['redacao'])){
                   $redacao = $_POST['redacao'];                    
               } 
               global $redacao;

               if($GLOBALS['formulario'] == false && empty($redacao)){
                header("Location: /modal.html");
                }else{
                   $temp = '';
                   $temp .= PHP_EOL;
                   $arquiv = fopen('redacoes.txt','a+');
                   fwrite($arquiv, $redacao, strlen($redacao));
                   $escreve = fwrite($arquiv, $temp);
                   $escreve = fwrite($arquiv, $temp);
                   $escreve = fwrite($arquiv, $temp);
                   fclose($arquiv); 
                                                           
               }
               
          ?> 
    </div>
    <footer>
        <p> 
            <small>
            gitHub: caioCollin <br>
            </small></p>
    </footer>
</body>
<script src="script.js"></script>
</html>


