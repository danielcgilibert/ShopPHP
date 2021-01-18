<?php

require_once "php/sesiones.php";
comprobar_sesion();

require_once "php/database.php";
require_once "head.php";
require_once "menu.php";
//error_reporting(0); //Mirar porque saltan errores en la linea 11 (cargar_productos)

$productos = cargar_productos(array_keys($_SESSION['carrito']));

if ($productos === FALSE) {
    echo "<p>No hay productos en el pedido</p>";
    if(isset($_SESSION["realizado"])){

        echo '<div class="alert alert-success text-center" role="alert">';
        echo '<strong>' .$_SESSION["realizado"] . " </strong>";
        echo '</div>';

        unset($_SESSION["realizado"]);

    }else{
        if(isset($_SESSION["noRealizado"])){
            echo '<div class="alert alert-danger text-center" role="alert">';
            echo '<strong>' .$_SESSION["noRealizado"] . " </strong>";
            echo '</div>';

            unset($_SESSION["noRealizado"]);

        }
    }
    exit;
}

?>

<body>
    <?php require_once "menu.php" ?>

    <div class="container">

<div class="row">
    
</div>

        
        <h1 class="display-4">Carrito</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">PVP</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Total</th>

                    <th scope="col">Borrar</th>

                </tr>
            </thead>
            <tbody>

                <?php
                while ($producto = mysqli_fetch_assoc($productos)) {
                    echo '<tr>';
                    echo '<th>' . $producto["NOMBRE_CORTO"] . '</td>';
                    echo '<td>' . $producto["DESCRIPCION"] . '</td>';
                    echo '<td>' . $producto["PVP"] . " €" . '</td>';
                    echo '<td>' . $_SESSION['carrito'][$producto["COD"]] . '</td>';
                    echo '<td>' .$producto["PVP"] * $_SESSION['carrito'][$producto["COD"]] . " €" . '</td>';
                    $_SESSION['total'][$producto["COD"]]= $producto["PVP"] * $_SESSION['carrito'][$producto["COD"]]; //cantidad 

                    echo '<td><form action="php/eliminar.php" method="POST">';
                    echo '<button type="submit" class="btn btn-danger" value=""><i class="bi bi-trash"></i></button>';
                    echo '<input name=cod type="hidden" value=' . $producto["COD"] . '> </form></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
         <a class="btn btn-primary btn-lg btn-block" href="php/procesar_pedido.php" role="button"> Realizar pedido</a>

    </div>

</body>