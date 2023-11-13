<?php
session_start();
$_SESSION['usuario'] = NULL;
unset($_SESSION['usuario']);
session_destroy();
//Redireccionamos a la pagina Principal
header('Location: ../../index.php');
?>