<?php
session_start();
unset($_SESSION['logado']);
unset($_SESSION['nome']);

header("Location: login.php");
exit;