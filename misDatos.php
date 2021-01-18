<?php
//print_r($_SESSION["datosUsuario"]);
require_once "php/sesiones.php";
comprobar_sesion();
require_once "head.php";
require_once "menu.php";
?>


<div class="container">

<?php

if (isset($_SESSION['actualizado'])) { 
    echo '<div class="alert alert-success" role="alert">';
    echo $_SESSION["actualizado"] ;
    echo '</div>';
    unset($_SESSION["actualizado"]);

}else{
    if(isset($_SESSION['noActualizado'])){
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION["noActualizado"];
        echo '</div>';
        unset($_SESSION["noActualizado"]);
    }
}
?>


    <form id="formMisDatos" action="php/actualizarDatos.php" method="POST">
    <h5><span class="badge badge-info">Cuenta</span></h5>
        <hr>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Correo electronico</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email"  value="<?php echo $_SESSION["datosUsuario"]["EMAIL"]; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="contraseña" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="contraseña" name="contraseña" value="<?php echo $_SESSION["datosUsuario"]["PASSWORD"]; ?>">
            </div>
        </div>

        <h5><span class="badge badge-info">Datos personales</span></h5>
        <hr>

        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_SESSION["datosUsuario"]["NOMBRE"]; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="dni" class="col-sm-2 col-form-label">DNI</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="DNI" name="DNI" value="<?php echo $_SESSION["datosUsuario"]["DNI"]; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $_SESSION["datosUsuario"]["DIRECCION"]; ?>">
            </div>
        </div>

        <button type="reset" class="btn btn-info botonMisdatos">Resetear</button>
        <button type="submit" class="btn btn-success botonMisdatos">Actualizar</button>


</div>
</form>


<?php // require_once "footer.php" 
?>