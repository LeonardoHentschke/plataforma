<?php

require 'config.php';

    if(isset($_POST['email']) && empty($_POST['email'])==false )    {
              
        $email=addslashes($_POST['email']);
        $nome=addslashes(ucwords(strtolower($_POST['nome'])));
        $senha=md5(addslashes($_POST['senha']));
        
        $sql = "INSERT INTO usuarios SET email='$email', senha='$senha', nome='$nome', empresas=''";
        $pdo-> query($sql);
        
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title> Sistemas | Grupo Cero </title>

</head>
<body style="background-color: #D3D3D3; color: #000">
    <div class="container">

        <br><br>
        <div class="row justify-content-center">
            <h2 class="text-dark">CADASTRE-SE</h2>
        </div>

        <div class="row justify-content-center">
            <div class="color-sm-4">
                <form method="POST">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
                    </div>

                    <div class="form-group">
                        <label>Endereço de email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
                    </div>

                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                    </div>

                    <input type="submit" value="Cadastrar" class="btn btn-dark btn-block"/>
                </form>
            </div>
        </div>  
        
   <!-- fim do container -->
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>