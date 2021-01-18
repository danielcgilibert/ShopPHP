<?php
require_once 'sesiones.php';
comprobar_sesion();

echo "<pre>";
print_r($_POST);
echo "</pre>";


$cod = $_POST['cod'];
$unidades = (int)$_POST['cantidades'];
/*si existe el código sumamos las unidades*/
if(isset($_SESSION['carrito'][$cod])){
	$_SESSION['carrito'][$cod] += $unidades;
}else{
	$_SESSION['carrito'][$cod] = $unidades;		
}
header("Location: ../carrito.php");
