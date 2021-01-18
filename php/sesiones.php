<?php
function comprobar_sesion(){
	session_start();
	if(!isset($_SESSION['datosUsuario'])){	
		header("Location: index.php?redirigido=true");
	}		
}