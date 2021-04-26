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

if(isset($_POST['razao_social']) && empty($_POST['razao_social'])==false ){
              
  $razao_social =addslashes($_POST['razao_social']);

  $gt = "SELECT id_empresa FROM empresas_crm WHERE razao_social='$razao_social'";
  $result = $pdo-> query($gt)->fetch(PDO::FETCH_ASSOC);
  $result = $result['id_empresa'];
  
  $origem       =addslashes($_POST['origem']);
  $tipo         =addslashes($_POST['tipo']);
  $descricao    =addslashes($_POST['descricao']);
        
  $sql = "INSERT INTO oportunidade_crm SET id_empresa='$result', origem='$origem', tipo='$tipo', descricao='$descricao', status=1";
  $pdo-> query($sql);  
        
  header("Location: oportunidades.php");
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
    <br><br>
    
    <div class="row justify-content-center">            
      <div class="col-12">

        <form method="POST">

          <div class="form-row">
            <div class="col-md-3 mb-3">

              <select class="form-control" name="razao_social" required>
                <option value=""> -- Cliente -- </option>
                  <?php            
                  $sql = "SELECT razao_social FROM empresas_crm";
                  $sql = $pdo -> query($sql);

                  if($sql -> rowCount() > 0 )
                  {        
                    foreach($sql->fetchALL() as $dado)
                  {                                     
                    echo '<option>'.$dado['razao_social'].'</option>';                                        
                  }
                  }else{
                    echo "  <div class='alert alert-info' role='alert' style='text-align: center;'>
                              Nenhuma empresa encontrada
                            </div>
                          ";}
                  ?>
                  </select>
            </div>
          </div>          

          <div class="form-row">
            <div class="col-md-3 mb-3">
                <select class="form-control" name="origem" required>
                  <option value=""> -- Origem --  </option>
                  <option> B.I </option>
                  <option> Marketing </option>
                  <option> Indicação </option>
                  <option> Prospecção </option>
                  <option> Pesquisa </option>
                </select>
            </div>

            
            <div class="col-md-3 mb-3">
                <select class="form-control" name="tipo" required>
                  <option value=""> -- Tipo --  </option>
                  <option> Venda de Produto </option>
                  <option> Prestação de Serviço </option>
                  <option> Consultoria </option>
                  <option> Locação </option>
                </select>
            </div>
                      
          </div>          

          <div class="form-row">
            <div class="col-md-12 mb-3">
              <textarea class="form-control" name="descricao" rows="3" placeholder="Descrição da oportunidade"></textarea>
            </div>
          </div>

          <hr>
          <br>
          <div class="form-row">
              <div class="col-md-2 mb-3">
                <a href="oportunidades.php" class="btn btn-secondary btn-block">Cancelar</a>
              </div>

              <div class="col-md-4">
                <input type="submit" value="Salvar" class="btn btn-primary btn-block"/>
              </div>
          </div>

        </form>


      </div>

    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
