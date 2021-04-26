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

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="d-flex w-95">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="oportunidades.php">Oportunidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agendamentos.php">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="follow-up.php">Follow-Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="interessado.php">Interessados</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="desinteressado.php">Desinteressados</a>
                </li>
                
            </ul>
        </div>
        <span class="navbar-text small text-truncate mt-1 w-5 text-right">
          <a class="btn text-white" href="../index.php">Sair</a>
        </span>
    </nav>

  <div class="container-fluid">

    <br><br>
  
    <div class="table-responsive-sm">
    <table class="table table-default table-hover table-bordered" style="text-align: center;">              

            <?php            
            $sql = "SELECT o.id_oportunidade, e.razao_social, e.segmento FROM empresas_crm e, oportunidade_crm o WHERE o.`status`= 5 AND o.id_empresa = e.id_empresa";
            $sql = $pdo -> query($sql);

            if($sql -> rowCount() > 0 )
            {        
                foreach($sql->fetchALL() as $usuario)
                {
                    echo '<tr>';
                    echo '<td>'.$usuario['razao_social'].'</td>';
                    echo '<td>'.$usuario['segmento'].'</td>';                 
                    echo '<td><a href="views/viewDesinteressado.php?id_oportunidade='.$usuario['id_oportunidade'].'">Detalhes</a>';
                    echo '</tr>';
                }
            }else
            {
                echo "  <div class='alert alert-primary' role='alert' style='text-align: center;'>
                          Nada cadastrado por enquanto!
                        </div>
                     ";
            }
            ?>

    </table>
    </div>

    <br><br>



  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
