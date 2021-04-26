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

if(isset($_POST['motivo_desinteresse']) && empty($_POST['motivo_desinteresse'])==false ){

  $motivo_desinteresse     =addslashes($_POST['motivo_desinteresse']);

        
  $sql = "UPDATE oportunidade_crm SET motivo_desinteresse='$motivo_desinteresse', status='5' WHERE id_oportunidade='$id_oportunidade'";

  $pdo-> query($sql);

  header("Location: interessado.php");
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
        <h3> Desinteresse </h3>
      </div>
        <hr>
        <div class="row justify-content-center">            
            <div class="col">
                <form method="POST">

                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-4">
                            <label>Motivo do desinteresse:</label>
                            <select class="form-control" name="motivo_desinteresse" required>
                              <option value=""> -- Selecione o motivo -- </option>
                              <option> Preço </option>
                              <option> Tecnologia </option>
                              <option> Não confia na marca </option>
                              <option> Pós venda </option>
                              <option> Relacionamento </option>
                              <option> Crédito </option>
                              <option> Condições pagamento </option>
                              <option> Velocidade entrega </option>
                            </select>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-2"></div>

                    </div>
                    

                    <hr>
                    <br>
                    <div class="form-row">

                        <div class="col-md-2"></div>

                        <div class="col-md-2 mb-3">
                            <a href="follow-up.php" class="btn btn-secondary btn-block">Cancelar</a>
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