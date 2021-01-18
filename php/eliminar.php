<?php 
/*comprueba que el usuario haya abierto sesión o redirige*/
require_once 'sesiones.php';
comprobar_sesion();
print_r($_POST);
$cod = $_POST['cod'];
unset($_SESSION['carrito'][$cod]);
header("Location: ../carrito.php");