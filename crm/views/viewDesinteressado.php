<?php
session_start();
require '../../config.php';
require '../../classes/usuarios.class.php';

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);

if(!isset($_SESSION['logado'])) {
    header("Location: ../../login.php");
    exit;
}elseif ($usuarios->temSistema('CRM')) {
    
}else{
    header("Location: ../../index.php");
    exit;
}

if(isset($_GET['id_oportunidade']) && empty($_GET['id_oportunidade'])==false )
{
  $id_oportunidade=addslashes($_GET['id_oportunidade']);
}

$sql = "SELECT e.razao_social, o.origem, o.tipo, o.descricao, o.primeiro_contato, o.data_agendada, o.hora_agendada, o.formato_reuniao,
o.conhecia_marca, o.apresentou_interesse, o.segundo_contato, o.formato_segunda_reuniao
        FROM oportunidade_crm o, empresas_crm e
        WHERE o.id_oportunidade = '$id_oportunidade' AND e.id_empresa = o.id_empresa";
$sql = $pdo -> query($sql);

if($sql -> rowCount() > 0 ){        
  $dado = $sql -> fetch(); 
}else{
  header("Location: ../albetech.php");
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <title> CRM | Grupo Cero </title>   
</head>
<body style="background-color: #DCDCDC; color: #000">

  <div class="container">
    <br>
      <div class="row justify-content-center">
        <h3> View Desinteressado </h3>
      </div>
        <hr>
        <div class="row justify-content-center">            
            <div class="col">
                <form method="POST">

                    <div class="form-row">
                        
                        <div class="col-md-4">
                          <label>Razão Social:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['razao_social']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Origem:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['origem']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Tipo:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['tipo']; ?>" readonly/><br/>
                        </div>

                    </div>                    

                    <div class="form-row">                                             
                        <div class="col-md-12 mb-3">
                          Observações:<br/>
                          <textarea class="form-control" rows="2" readonly><?php echo $dado['descricao']; ?></textarea>
                        </div>
                    </div>

                    <br>
                    <h5> Dados primeiro agendamento </h5>
                    <hr>

                    <div class="form-row">                        

                        <div class="col-md-4">
                          <label>Primeiro Contato:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['primeiro_contato']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Data Agendada:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['data_agendada']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Hora Agendada:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['hora_agendada']; ?>" readonly/><br/>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="col-md-4">
                          <label>Formato da reunião:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['formato_reuniao']; ?>" readonly/><br/>
                        </div>

                    </div>

                    <br>
                    <h5> Dados segundo agendamento </h5>
                    <hr>

                    <div class="form-row">

                        <div class="col-md-4">
                          <label>Cliente já conhecia a marca?</label>
                          <input type="text" class="form-control" value="<?php echo $dado['conhecia_marca']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Cliente apresentou interesse?</label>
                          <input type="text" class="form-control" value="<?php echo $dado['apresentou_interesse']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-4">
                          <label>Próximo contato:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['segundo_contato']; ?>" readonly/><br/>
                        </div>                        

                    </div>

                    <div class="form-row">

                        <div class="col-md-4">
                          <label>Forma do contato:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['formato_segunda_reuniao']; ?>" readonly/><br/>
                        </div>                        

                    </div>

                    

                    <hr>
                    <br>
                    <div class="form-row">                        

                      <div class="col-md-4">
                        <a href="../desinteressado.php" class="btn btn-secondary btn-block">Voltar</a>
                      </div>

                    </div>
                    
                
                </form>
                <br><br>
                
            </div>
        </div> 



  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
