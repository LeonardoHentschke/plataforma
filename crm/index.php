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


    if ($usuarios->temEmpresas('ALBETECH')) {
        header("Location: albetech.php");
        exit;
    }else{
        header("Location: ../index.php");
        exit;
    }

    
}else{

    header("Location: ../index.php");
    exit;

}

?>