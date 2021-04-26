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

$sql = "SELECT e.razao_social, e.email, e.cnpj_cpf, e.cidade, o.origem, o.tipo, o.descricao
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
        <h3> View Oportunidade </h3>
      </div>
        <h5> Dados cliente </h5>
        <hr>
        <div class="row justify-content-center">            
            <div class="col">
                <form method="POST">

                    <div class="form-row">                        

                        <div class="col-md-3">
                          <label>Razão Social:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['razao_social']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-3">
                          <label>E-mail:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['email']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-3">
                          <label>CNPJ / CPF:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['cnpj_cpf']; ?>" readonly/><br/>
                        </div>

                        <div class="col-md-3">
                          <label>Cidade:</label>
                          <input type="text" class="form-control" value="<?php echo $dado['cidade']; ?>" readonly/><br/>
                        </div>

                    </div>
                    
                    <h5> Dados da oportunidade </h5>
                    <hr>

                    <div class="form-row">

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

                    

                    <hr>
                    <br>
                    <div class="form-row">                       

                      <div class="col-md-4">
                        <a href="../oportunidades.php" class="btn btn-secondary btn-block">Voltar</a>
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
