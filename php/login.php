<?php
require_once 'sesiones.php';
session_start();
extract($_POST);

print_r($_POST);
//usuario
//clave
$_SESSION['usuario'] = $email;

print_r($_SESSION['usuario']);
$bd=mysqli_connect("localhost","root","","tienda");
$ins = "select * from clientes where email = '$email' and PASSWORD = '$password'";
$resul = mysqli_query($bd,$ins);


if ($fila=mysqli_fetch_assoc($resul)){

    $_SESSION["datosUsuario"]=$fila;
    $_SESSION['carrito'] = [];

    header("Location: ../categorias.php");

}else{

    $_SESSION["error"] = "<div><p>No se a encontrado el usuario</p></div>";
    header("Location: ../index.php");
}
