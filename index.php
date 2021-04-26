<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';


if(!isset($_SESSION['logado'])) {    
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <title> Sistemas | Grupo Cero </title>   
</head>
<body style="background-color: #DCDCDC; color: #000">
    <div class="container">

        <hr>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand"><h2>Sistemas | Grupo Cero </h2><span>Bem-Vindo <?php echo $_SESSION['nome']; ?></span></a>

            <div class="navbar-collapse collapse justify-content-stretch">
                <ul class="navbar-nav ml-auto">

                    <?php if($usuarios->temSistema('ADMIN')): ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-danger" href="admin.php" style="margin-right: 15px">ADMIN</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-outline-dark" href="sair.php">Sair</a>
                    </li>

                </ul>
            </div>
        </nav>
        <hr>

        <br>

        <div class="row justify-content-start">

            <?php if($usuarios->temSistema('PCP')): ?>
            <div class="col-sm-3">
                <div class="card text-center border border-secondary" style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/pcp.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary" >
                    <h5 class="card-title">PCP</h5>
                    <p class="card-text">Controle e acompanhamento de compras.</p>
                    <a href="pcp/index.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>
            <?php endif; ?>

            <?php if($usuarios->temSistema('FINANCEIRO')): ?>
             <div class="col-sm-3">
                <div class="card text-center border border-secondary" style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/financeiro.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary" >
                    <h5 class="card-title">FINANCEIRO</h5>
                    <p class="card-text">Controle de operação financeira.</p>
                    <a href="financeiro/index.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>
            <?php endif; ?>

            <?php if($usuarios->temSistema('RELATORIOS')): ?>
             <div class="col-sm-3">
                <div class="card text-center border border-secondary" style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/relatorios.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary" >
                    <h5 class="card-title">RELATORIOS</h5>
                    <p class="card-text">Relatórios completos para análise e tomada de decisão.</p>
                    <a href="relatorios/index.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>
            <?php endif; ?>


            <?php if($usuarios->temSistema('ONBOARDING')): ?>
             <div class="col-sm-3">
                <div class="card text-center border border-secondary" style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/onboarding.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary">
                    <h5 class="card-title">ONBOARDING</h5>
                    <p class="card-text">E-learning exclusivo do Grupo Cero.</p>
                    <a href="onboarding/index.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>
            <?php endif; ?>

        </div>

        <br>

        <div class="row justify-content-start">

            <?php if($usuarios->temSistema('LOGISTICA')): ?>
             <div class="col-sm-3">
                <div class="card text-center border border-secondary " style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/logistica.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary" >
                    <h5 class="card-title">LOGISTICA</h5>
                    <p class="card-text">Grupo Cero.</p>
                    <a href="logistica/index.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>            
            <?php endif; ?>
            
            <?php if($usuarios->temSistema('CRM')): ?>
             <div class="col-sm-3 col-md-3">
                <div class="card text-center border border-secondary " style="background-color: #DCDCDC; color: #000">
                  <div class="card-header">
                    <img class="card-img-top" src="assets/images/crm.jpeg" alt="Imagem de capa do card">
                  </div>
                  <div class="card-body border-top border-secondary" >
                    <h5 class="card-title">CRM</h5>
                    <p class="card-text">Grupo Cero.</p>
                    <a href="crm/oportunidades.php" class="btn btn-primary">Entrar</a>
                  </div>                  
                </div>
            </div>            
            <?php endif; ?>

        </div>


        <br><br>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>