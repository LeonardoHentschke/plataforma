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

if(isset($_POST['primeiro_contato']) && empty($_POST['primeiro_contato'])==false ){

  $primeiro_contato     =addslashes($_POST['primeiro_contato']);
  $data_agendada        =addslashes($_POST['data_agendada']);
  $hora_agendada        =addslashes($_POST['hora_agendada']);
  $formato_reuniao      =addslashes($_POST['formato_reuniao']);

        
  $sql = "UPDATE oportunidade_crm SET primeiro_contato='$primeiro_contato', data_agendada='$data_agendada', hora_agendada='$hora_agendada', formato_reuniao='$formato_reuniao', status='2' WHERE id_oportunidade='$id_oportunidade'";

  $pdo-> query($sql);

  header("Location: agendamentos.php");
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
        <h3> Agendamento </h3>
      </div>
        <hr>
        <div class="row justify-content-center">            
            <div class="col">
                <form method="POST">

                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-4">
                            <label>Primeiro contato:</label>
                            <select class="form-control" name="primeiro_contato" required>
                              <option value=""> -- Selecione o formato -- </option>
                              <option> Visita </option>
                              <option> Telefone </option>
                              <option> E-mail </option>
                              <option> Chat </option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>Data Agendada:</label>
                            <input type="date" name="data_agendada" class="form-control" required/><br/>
                        </div>

                        <div class="col-md-2"></div>

                    </div>

                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-4">
                            <label>Hora Agendada:</label>
                            <input type="time" name="hora_agendada" class="form-control" required/><br/>
                        </div>

                        <div class="col-md-4">
                            <label>Formato da reunião:</label>
                            <select class="form-control" name="formato_reuniao" required>
                              <option value=""> -- Selecione o formato -- </option>
                              <option> Vídeo conferência </option>
                              <option> Telefone </option>
                              <option> Presencial </option>
                            </select>
                        </div>

                        <div class="col-md-2"></div>

                    </div>

                    

                    <hr>
                    <br>
                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-2 mb-3">
                            <a href="oportunidades.php" class="btn btn-secondary btn-block">Cancelar</a>
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
