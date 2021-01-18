<?php
	require 'sesiones.php';
	require_once 'database.php';
	comprobar_sesion();

    echo "<pre>";
    print_r($_SESSION['carrito']);
	echo "</pre>";
	
	echo "<pre>";
	print_r($_SESSION['total']);
	


	echo "<pre>";
    print_r($_SESSION['datosUsuario']["NUM_CLIENTE"]);
	echo "</pre>"; 

	$resul = insertar_pedido($_SESSION['carrito'], $_SESSION['datosUsuario']["NUM_CLIENTE"]);
	if($resul === FALSE){
		$_SESSION["noRealizado"]= "No se ha podido realizar el pedido<br>";			
	}
	else{
	$_SESSION["realizado"]="Pedido nº".$resul." almacenado correctamente";}
	$_SESSION['carrito'] = [];
	header("Location:../carrito.php");