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
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <title>Admin | Grupo Cero</title>             
    </head>

  <body style="background-color: #DCDCDC; color: #000">

    <!-- INCIO DO CONTAINER PRINCIPAL -->
    <div class="container">
        
         <hr>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand"><h3>Área de administração | Grupo Cero</h3></a>

            <div class="navbar-collapse collapse justify-content-stretch">
                <ul class="navbar-nav ml-auto">                    

                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-outline-dark" href="index.php">Voltar</a>
                    </li>

                </ul>
            </div>
        </nav>
        <hr>

        <table class="table table-success table-hover" style="text-align: center;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">VISUALIZAR</th>
                </tr>
            </thead>
  

            <?php
            $sql = "SELECT * FROM usuarios ORDER BY id";
            $sql = $pdo -> query($sql);

            if($sql -> rowCount() > 0 )
            {        
                foreach($sql->fetchALL() as $usuario)
                {
                    echo '<tr>';
                    echo '<td>'.$usuario['id'].'</td>';
                    echo '<td>'.$usuario['nome'].'</td>';
                    echo '<td>'.$usuario['email'].'</td>';
                    echo '<td><a href="permissoes.php?id='.$usuario['id'].'">Permissões</a>';
                    echo '</tr>';
                }
            }else
            {
                echo "  <div class='alert alert-danger' role='alert'>
                          Nenhum usuario encontrado!
                        </div>
                        ";
            }
            ?>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
  </body> 
</html>