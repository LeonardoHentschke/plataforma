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
    
    <div class="row">
      <div class="col-12">
        <nav class="navbar">

          <div class="btn-group">

            <a class="btn btn-outline-primary" href="oportunidades.php" role="button">Oportunidades</a>
            <a class="btn btn-outline-primary" href="agendamentos.php" role="button">Agendamentos</a>
            <a class="btn btn-outline-primary" href="follow-up.php" role="button">Follow-up</a>

          </div>

          <div class="btn-group">

            <a class="btn btn-success" href="interessado.php"    role="button">Interessado</a>
            <a class="btn btn-danger" href="desinteressado.php" role="button">Desinteressado</a>

          </div>

          <form class="form-inline">
            <div class="btn-group">

              <a class="btn btn-outline-primary" href="intel-de-mercado.php" role="button">Inteligência de Mercado</a>
              <a class="btn btn-primary"         href="indicadores.php" role="button">Indicadores</a>

            </div>
          </form>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-12" style="margin-left: 15px;">

        <a class="btn btn-outline-primary" href="nova-oportunidade.php"   role="button">Nova oportunidades</a>
        <a class="btn btn-outline-primary" href="cadastro-de-cliente.php" role="button">Cadastro de cliente</a>
        <a class="btn btn-outline-primary" href="allclientes.php" role="button">Editar Clientes</a>

      </div>
    </div>

    <br>
    
    <div class="row">
      <div class="col-12">
        
        <div class="embed-responsive embed-responsive-1by1">
          <iframe id="areadoframe" src="https://datastudio.google.com/embed/reporting/3989e16b-f5d5-4331-b061-5b0e38b4d67f/page/3xDOB"></iframe>
        </div>

      </div>
     </div>

     <br>


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
