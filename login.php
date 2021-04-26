<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

$aviso=0;

if(!empty($_POST['email'])) {
	$email = addslashes($_POST['email']);
	$senha = md5($_POST['senha']);

	$usuarios = new Usuarios($pdo);

	if($usuarios->fazerLogin($email, $senha)) {
		header("Location: index.php");
		exit;
	} else {
		$aviso=1;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<title> Sistemas | Grupo Cero </title>
</head>
<body style="background-color: 	#D3D3D3; color: #000">

	<div class="container">

		<?php if ( $aviso==1 ) { ?>

	    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center;">
			Usuário e/ou senha não encontrados!
			<button class="close" data-dismiss="alert" arial-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<?php } ?>

		<br><br>
		<div class="row justify-content-center">
			<h1>Grupo Cero</h1><br><br><br>
		</div>

		<div class="row justify-content-center">
			<div class="col-sm-4">

				<form method="POST">

				  <div class="form-group">
				    <label>Endereço de email:</label>
				    <input type="email" name="email" class="form-control" placeholder="Seu email" required>
				  </div>

				  <div class="form-group">
				    <label>Senha:</label>
				    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
				  </div>			  
				  
				  <input type="submit" value="Entrar" class="btn btn-dark btn-block">

				  <br><br>
				  Não possui uma conta?  <a class="text-primary" href='cadastrar.php'>Cadastre-se</a>
			
				</form>
				
			</div>					
		</div>

	<!-- fim do container -->	
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>