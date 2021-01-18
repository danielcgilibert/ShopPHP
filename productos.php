<?php require_once "head.php" ?>
<?php require_once "menu.php" ?>
<?php require_once "php/database.php";
session_start();
?>


<?php
$datosProductos = listadoProductos($_GET["categoria"]);

?>
<div class="container">
  <div class="row">
    <?php
    if (count($datosProductos) > 0) {
      foreach ($datosProductos as $valor => $con) {
        echo     '<div class="col-md-4">';

        echo '<div class="card" id="producto" style="width: 18rem;">';
        echo '<img class="card-img-top" src="..." alt="Card image cap">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $con["NOMBRE_CORTO"] . '</h5>';
        echo '<p class="card-text">' . $con["DESCRIPCION"] . '</p>';
        echo '<p class="card-text">' . $con["PVP"] . ' €' .'</p>';

        if (isset($_SESSION['usuario'])) {
          echo '<form action="php/añadir.php" method="POST">';
          echo '<div class="form-group">';
          echo '<label for="Cantidad">Cantidad</label>';
          echo '<select class="form-control" name="cantidades" id="cantidades">';
            for($i=1;$i<=$con["STOCK"];$i++){
              echo '<option>'. $i .'</option>';
            }
          echo '</select>';
          echo ' </div>';
          echo '<input name = cod type=hidden value ='. $con["COD"].'>';
          echo '<button type="submit" class="btn btn-primary botonCategoria">Añadir al carrito</button>';
          echo '</form>';
        }
        echo '</div>';
        echo '</div>';

        echo '</div>';
      }
    }
    ?> </div>
</div>
</div>







<?php// require_once "footer.php" ?>