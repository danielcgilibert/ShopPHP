<?php
require_once 'sesiones.php';
require_once 'database.php';

comprobar_sesion();


$resultado = actualizarDatos($_POST);

if($resultado){
    $_SESSION["datosUsuario"]["DNI"] = $_POST["DNI"];
    $_SESSION["datosUsuario"]["NOMBRE"] = $_POST["nombre"];
    $_SESSION["datosUsuario"]["DIRECCION"] = $_POST["direccion"];
    $_SESSION["datosUsuario"]["EMAIL"] = $_POST["email"];
    $_SESSION["datosUsuario"]["PASSWORD"] = $_POST["contraseña"];
    $_SESSION["actualizado"] = "<div><p>Actualizado </p></div>";
    header("Location:../misDatos.php");
}else{
    $_SESSION["noActualizado"] = "<div><p>No se a podido actualizar</p></div>";
    header("Location:../misDatos.php");
}

