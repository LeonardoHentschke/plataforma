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
    
    <div class="row justify-content-center">
        <a href="oportunidades.php" class="btn btn-primary">Voltar</a>
    </div>

    <br>
    <div class="row justify-content-center">        
        <div class="table-responsive-sm">
            <table class="table table-hover table-bordered" style="text-align: center;">              

              <thead class="thead">
                  <tr>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Email</th>
                    <th scope="col">CNPJ/CPF</th>
                    <th scope="col">Ação</th>            
                </tr>
              </thead>

                    <?php            
                    $sql = "SELECT e.id_empresa, e.razao_social, e.email, e.cnpj_cpf 
                            FROM empresas_crm e";
                    $sql = $pdo -> query($sql);

                    if($sql -> rowCount() > 0 )
                    {        
                        foreach($sql->fetchALL() as $usuario)
                        {
                            echo '<tr>';
                            echo '<td>'.$usuario['razao_social'].'</td>';
                            echo '<td>'.$usuario['email'].'</td>';
                            echo '<td>'.$usuario['cnpj_cpf'].'</td>';                
                            echo '<td><a href="edit-cliente.php?id_empresa='.$usuario['id_empresa'].'">Editar</a>';
                            echo '</tr>';
                        }
                    }else
                    {
                        echo "  <div class='alert alert-info' role='alert' style='text-align: center;'>
                                  Nada cadastrado por enquanto!
                                </div>
                             ";
                    }
                    ?>

            </table>
        </div>
    </div>

    <br><br>



  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
