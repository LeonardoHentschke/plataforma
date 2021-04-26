<?php
    session_start();
    require 'config.php';
    require 'classes/usuarios.class.php';

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['logado']);
    

    if(isset($_GET['id']) && empty($_GET['id'])==false )
    {
        $id=addslashes($_GET['id']);
    }

    if(isset($_POST['nome']) && empty($_POST['nome'])==false ){

        $nome           =addslashes($_POST['nome']);      
        $sistema        =addslashes($_POST['sistema']);
        $empresas       =addslashes($_POST['empresas']);
        $relatorios     =addslashes($_POST['relatorios']);
        $onboarding     =addslashes($_POST['onboarding']);
        $pcp            =addslashes($_POST['pcp']);
        
        $sql = "UPDATE usuarios SET        
        nome='$nome',       
        sistema='$sistema', 
        empresas='$empresas',
        relatorios='$relatorios',
        onboarding='$onboarding',
        pcp='$pcp'
        WHERE id='$id'
        ";        

        $pdo-> query($sql);
        header("Location: admin.php");
    }


    if(isset($_POST['senhaNew']) && empty($_POST['senhaNew'])==false ){

        $senhaNew=addslashes(md5($_POST['senhaNew']));
        
        $sql = "UPDATE usuarios SET senha='$senhaNew' WHERE id='$id'";        

        $pdo-> query($sql);
        header("Location: admin.php");
    } 



    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $sql = $pdo -> query($sql);

    if($sql -> rowCount() > 0 )
	{		 
		$dado = $sql -> fetch();        
    }
    else
    {
        header("Location: index.php");
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title> Sistemas | Visualização</title>

</head>
<body style="background-color: #DCDCDC; color: #000">
    <div class="container">

        <hr>
        <div class="row justify-content-center">
            <h3>Dados do usuario</h3>
        </div>

        <hr>

        <div class="row justify-content-center">            
            <div class="col">

            <form method="POST">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Codigo:</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $dado['id']; ?>" readonly/>
                        </div>
                        <div class="col-md-4 mb-3">                
                            <label>Nome:</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $dado['nome']; ?>" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Email:</label>
                            <input type="text" name="email" class="form-control" id="money" value="<?php echo $dado['email']; ?>" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Senha:</label>
                            <input type="text" name="senhaOld" class="form-control" value="<?php echo $dado['senha']; ?>" readonly/>
                        </div>
                        <form method="POST">
                            <div class="col-md-4 mb-3">                
                                <label>Nova senha:</label>
                                <input type="text" name="senhaNew" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label style="color: #DCDCDC">.</label>
                                <input type="submit" value="Enviar" class="btn btn-danger btn-block"/>
                            </div>
                        <form method="POST">
                    </div>

                    <div class="form-row">                        
                        <div class="col-md-12 mb-3">
                            <label>Sistemas:</label>
                            <textarea class="form-control" name="sistema" ><?php echo $dado['sistema']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">                        
                        <div class="col-md-12 mb-3">
                            <label>Empresas:</label>
                            <textarea class="form-control" name="empresas" ><?php echo $dado['empresas']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">                        
                        <div class="col-md-12 mb-3">
                            <label>Relatorios:</label>
                            <textarea class="form-control" name="relatorios" ><?php echo $dado['relatorios']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">                        
                        <div class="col-md-12 mb-3">
                            <label>Onboarding:</label>
                            <textarea class="form-control" name="onboarding" ><?php echo $dado['onboarding']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">                        
                        <div class="col-md-12 mb-3">
                            <label>PCP:</label>
                            <textarea class="form-control" name="pcp" ><?php echo $dado['pcp']; ?></textarea>
                        </div>
                    </div>

                    <hr>
                    

                    <div class="form-row">
                                                   
                        <div class="col-md-6 mb-3">
                            <a href="admin.php" class="btn btn-secondary form-control">Voltar</a>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="submit" value="Salvar" class="btn btn-info btn-block"/>
                        </div>

                    </div>
                
            </form>
        </div>
        </div> 
        
   <!-- fim do container -->
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>