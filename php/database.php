<?php

function comprobar_usuario($nombre, $clave)
{
	$bd = mysqli_connect("localhost", "root", "", "tienda");
	$ins = "select email, password from clientes where email = '$nombre' 
			and password = '$clave'";
	$resul = mysqli_query($bd, $ins);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {
		return FALSE;
	}
}

function listadoProductos($codCategoria)
{
	$bd = mysqli_connect("localhost", "root", "", "tienda");
	$consulta = "select * from producto where COD_FAMILIA=" . $codCategoria;

	$resul = mysqli_query($bd, $consulta);
	$listaProductos = array();

	while ($fila = mysqli_fetch_assoc($resul)) {
		$listaProductos[] = $fila;
	}

	return $listaProductos;
}

function cargar_categorias()
{
	$bd = mysqli_connect("localhost", "root", "", "tienda");
	$consulta = "select * from FAMILIA";
	$resul = mysqli_query($bd, $consulta);

	if (!$resul) {
		return FALSE;
	}
	if (mysqli_num_rows($resul) == 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}


function cargar_productos($codigosProductos)
{
	$bd = mysqli_connect("localhost", "root", "", "tienda");
	$texto_in = implode(",", $codigosProductos);
	$ins = "select * from producto where COD in($texto_in)";
	$resul = mysqli_query($bd, $ins);
	if (!$resul) {
		return FALSE;
	}
	return $resul;
}


function insertar_pedido($carrito, $codRes)
{
	$bd = mysqli_connect("localhost", "root", "", "tienda");
	$hora = date("Y-m-d H:i:s", time());
	// insertar el pedido
	echo "codRes";

	print_r($codRes);
	echo "<br>";

	print_r($hora);

	$sql = "insert into pedidos(CLIENTE, FECHA) 
			values($codRes,'$hora')";


	$resul = mysqli_query($bd, $sql);
	if (!$resul) {
		return FALSE;
	}
	// coger el id del nuevo pedido para las filas detalle
	$pedido = mysqli_insert_id($bd);
	// insertar las filas en pedidoproductos
	foreach ($carrito as $codProd => $unidades) {
		foreach ($_SESSION['total'] as $cod => $total) {
			$sql = "insert into lineas(NUM_PEDIDO, COD_PRODUCTO, PRECIO,CANTIDAD) 
		             values( $pedido, $cod,$total, $unidades)";

			$resul = mysqli_query($bd, $sql);
		}
	}

	return $pedido;
}


function actualizarDatos($datosNuevos){
	$bd = mysqli_connect("localhost", "root", "", "tienda");

	$dni =$datosNuevos['DNI'];
	$nombre =$datosNuevos["nombre"];
	$direccion =$datosNuevos["direccion"];
	$email =$datosNuevos["email"];
	$contraseña =$datosNuevos["contraseña"];
	$NUM_CLIENTE =$_SESSION["datosUsuario"]["NUM_CLIENTE"];

	$consulta = "UPDATE clientes SET DNI="."'$dni'".","."NOMBRE="."'$nombre'".","."DIRECCION="."'$direccion'".","."EMAIL="."'$email'".","."PASSWORD="."'$contraseña'" . " WHERE NUM_CLIENTE=".$NUM_CLIENTE;
	$resul = mysqli_query($bd, $consulta);

	if (!$resul) {
		return FALSE;
	}

	return $resul;
}