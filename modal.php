<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['senha'])  ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
}

global $name,$email,$senha;

$valNome = " Preencha o campo Nome !";
$valEmail = "Preencha o campo Email !";
$valSenha = "Preencha o campo Senha ! ";

$erro = false;
$erroGeral = false;
$Mensagem  = "<h3 class='cencelado'> Erro ao enviar formulário.!!!</h3>";
$erroEmail =false;
$erroSenha = false;
$erroNome = false;
global $formulario;
$formulario = false;


if ( !isset( $_POST ) || empty( $_POST ) ) {
    $erro;
}
if (( ! isset( $email ) || !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) && !$erro ) {
    $erroEmail = "<h5 class='erroEmail'> 'Prencha o campo com um Email correto!' </h5>";
    $erro;
}
if(strlen($senha ) < 4){
    $erroSenha = "<h5 class='erroEmail'> 'Preencha o campo com no Minimo 5 caracteres' </h5>";
    $erro;
}
if($name == null ){
    $erroNome ;
}


foreach ( $_POST as $chave => $valor ) {
    // Remove todas as tags HTML
    // Remove os espaços em branco do valor
    $$chave = trim( strip_tags( $valor ) );    
    // Verifica se tem algum valor nulo
    $erroGeral;
    if ( empty ( $valor ) ) {
        $erroGeral = "<h3 class='erro'> Existe campos em branco. </h3>";
    }
}


if ( $erro || $erroEmail || $erroSenha || $erroNome || empty($name)) {
    echo "$Mensagem ";
} else {
    echo "<h3 class='enviado'> Obrigado Aluno(a) $name .<br> Seus dados foi enviado com Sucesso!!!</h3>";
    $formulario = True;
    foreach ( $_POST as $chave => $valor ) {
        // echo '<b>' . $chave . '</b>: ' . $valor . '<br><br>';
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stilo.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
    *{
        font-family: 'Edu QLD Beginner', cursive;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0; 
        background-image: radial-gradient(circle at 50.88% 50.51%, #add1ff 0, #1e83f3 50%, #0040b8 100%);
        z-index: 99999;
        opacity:0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
        align-items: center ; 
        
    }

    .modal:target {
        opacity: 1;
        pointer-events: auto;
    }

    .modal > div {
        width: 70%;
        max-height: 80%;
        position: relative;
        padding: 15px 20px;
        background: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 20px;
        margin: 0 auto;
        
    }

    .fechar {
        position: absolute;
        width: 30px;
        right: -15px;
        top: -20px;
        text-align: center;
        line-height: 30px;
        margin-top: 5px;
        background: #ff4545;
        border-radius: 50%;
        font-size: 16px;
        color: white;
    }


    .formulario input{
        display: block;
        width: 80%;
        padding: 15px;
        margin: 0 auto;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-size: 18px;
        cursor:pointer;
        margin-top:10px;
    }
    #enviar{
        background: #1F84F3;
        color: white;
        border: none;
    }
    /* php estilo , validar */
    .erroNome{
        display: block;
        text-align: center;
        padding: 1px;  
        width: 100%;
        margin-bottom: 3px;
        margin-top: 3px;
        color: red;
        font-size:15px;
    }

    .erroEmail{
        display: block;
        text-align: center;
        padding: 1px;  
        width: 100%;
        margin-bottom: 3px;
        margin-top: 3px;
        color: red;
        font-size:15px;
    }
    .erroSenha{
        display: block;
        text-align: center;
        padding: 1px;  
        width: 100%;
        margin-bottom: 10px;
        color: red;
        font-size:15px;
    }

    .erro{
        display: block;
        margin: 0 auto;
        padding: 20px;  
        text-align: center;
        font-size: 20px;
        width: 80%;
        border-radius: 100px;
        color: white;
        background-color: red;
        margin-bottom: 15px;
    }
    #abrirModal{
        display:flex;
        cursor:pointer;
    }
    .inputCerto{
        border: 1px solid #47d214;
    }
    .inputErro{
        border: 1px solid red;
    }
    .enviado{
        color: green;
    }
    .cencelado{
        color: #FF0000;
    }
 
</style>
</head>
<body>

  <p> Aluno(a) Preencha o formulário<a href="#abrirModal">Abrir Formulario</a>. </p>  

    </form>
    <div id="abrirModal" class="modal">
        <div>
            <a href="#fechar" title="Fechar" class="fechar">x</a>
            <form action="pagina.php" method="post" class="formulario">

                <div class="">
                    <small> <?php if(isset($erroGeral)){echo $erroGeral;} ?></small>
                </div>


                <input type="text" class="<?php if($name == null){
                    echo 'inputErro';
                }
                else{echo 'inputCerto';} ?>"                
                name="name" id ="nome"placeholder="Nome:" value="<?php echo "$name"; ?>" >
                <small class="erroNome" ><?php if(empty($name)){echo $valNome;} ?></small>


                <input type="text" class="<?php if($email == null || $erroEmail != null ){
                    echo 'inputErro';
                }
                else{echo 'inputCerto';} ?>"
                 name="email" placeholder="Email:" value="<?php echo "$email"; ?>">
                <small class="erroEmail"><?php if(empty($email)){echo $valEmail;} elseif(isset($erroEmail)){echo $erroEmail;} ?></small>


                <input type="password" class="<?php if($senha == null || $erroSenha != null  ){
                    echo 'inputErro';
                }
                else{echo 'inputCerto';} ?>"
                 name="senha"placeholder="Senha:" value="<?php echo "$senha"; ?>">
                <small class="erroSenha"><?php if(empty($senha)){echo $valSenha;}  elseif(isset($erroSenha)){echo $erroSenha;}?></small>
                <input type="submit"  name="enviar" velue="verdade" id="enviar">
      
            </form>
        </div>
    </div>
</body>
</html>


