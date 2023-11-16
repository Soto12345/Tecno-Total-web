<?php
session_start();
$_SESSION['usuario'] = NULL;
$_SESSION['Tipo_usuario'] = NULL;
unset($_SESSION['usuario']);
unset($_SESSION['Tipo_usuario']);
session_destroy();
//Redireccionamos a la pagina Principal
header('Location: ../../index.php');
?>