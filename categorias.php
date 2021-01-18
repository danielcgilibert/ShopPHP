<?php require_once "head.php" ?>
<?php require_once "php/database.php" ?>


<body>
    <?php require_once "menu.php"; ?>

    <div class="container">
        <?php $categorias = cargar_categorias();
        //print_r($categorias);
        if ($categorias === false) {
            echo "<p class='error'>Error al conectar con la base datos</p>";
        } else {

            echo '<div class="row">';
            while ($cat = mysqli_fetch_assoc($categorias)) {    ?>
                <div class="col-sm-4" id="categoria">
                    <?php $url = "productos.php?categoria=" . $cat['COD']; ?>
                    <div class="card mb-3">
                        <img class="card-img-top" src="img/img Categorias/<?php echo $cat['COD'] ?>.jpg " alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo "<a href='$url'>" . $cat['NOMBRE'] . "</a>" ?></h5>
                        </div>
                    </div>
                </div>


        <?php }
            echo '</div>';
        } ?>

    </div>

    <?php require_once "footer.php"; ?>


</body>