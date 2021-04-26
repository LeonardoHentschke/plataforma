<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

if(!isset($_SESSION['logado'])) {
    header("Location: ../login.php");
    exit;
}elseif ($usuarios->temSistema('CRM')) {
    
}else{
    header("Location: ../index.php");
    exit;
}

if(isset($_GET['id_oportunidade']) && empty($_GET['id_oportunidade'])==false )
{
  $id_oportunidade=addslashes($_GET['id_oportunidade']);
}

if(isset($_POST['conhecia_marca']) && empty($_POST['conhecia_marca'])==false ){

  $conhecia_marca            =addslashes($_POST['conhecia_marca']);
  $apresentou_interesse      =addslashes($_POST['apresentou_interesse']);
  $segundo_contato           =addslashes($_POST['segundo_contato']);
  $formato_segunda_reuniao   =addslashes($_POST['formato_segunda_reuniao']);

        
  $sql = "UPDATE oportunidade_crm SET conhecia_marca='$conhecia_marca', apresentou_interesse='$apresentou_interesse', segundo_contato='$segundo_contato', formato_segunda_reuniao='$formato_segunda_reuniao', status='3' WHERE id_oportunidade='$id_oportunidade'";

  $pdo-> query($sql);

  header("Location: follow-up.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <title> CRM | Grupo Cero </title>   
</head>
<body style="background-color: #DCDCDC; color: #000">

  <div class="container">
    <br>
      <div class="row justify-content-center">
        <h3> Follow-Up </h3>
      </div>
        <hr>
        <div class="row justify-content-center">            
            <div class="col">
                <form method="POST">

                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-4">
                            <label>Cliente já conhecia a marca?</label>
                            <select class="form-control" name="conhecia_marca" required>
                              <option value=""> -- sim / não -- </option>
                              <option> Sim </option>
                              <option> Não </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Cliente apresentou interesse?</label>
                            <select class="form-control" name="apresentou_interesse" required>
                              <option value=""> -- sim / não -- </option>
                              <option> Sim </option>
                              <option> Não </option>
                            </select>
                        </div>

                        <div class="col-md-2"></div>

                    </div>

                    <br>

                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-4">
                            <label>Próximo contato:</label>
                            <input type="date" name="segundo_contato" class="form-control" required/><br/>
                        </div>

                        <div class="col-md-4">
                            <label>Forma do contato:</label>
                            <select class="form-control" name="formato_segunda_reuniao" required>
                              <option value=""> -- Selecione formato -- </option>
                              <option> Vídeo conferência </option>
                              <option> Telefone </option>
                              <option> Presencial </option>
                              <option> E-mail </option>
                              <option> Chat </option>
                            </select>
                        </div>

                        <div class="col-md-2"></div>

                    </div>

                    

                    <hr>
                    <br>
                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-2 mb-3">
                            <a href="agendamentos.php" class="btn btn-secondary btn-block">Cancelar</a>
                        </div>
                        
                        
                        
                        <div class="col-md-6">
                            <input type="submit" value="Salvar" class="btn btn-primary btn-block"/>
                        </div>

                        <div class="col-md-2"></div>

                    </div>
                    
                
                </form>
            </div>
        </div> 



  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
