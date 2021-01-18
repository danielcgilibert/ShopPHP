<?php require_once "head.php" ?>


<body>
    <?php require_once "menu.php" ?>

    <div class="container">
        <?php //mensaje de error 

        session_start();
        if (isset($_SESSION["error"])) {
            echo '<div class="alert alert-danger text-center" role="alert">';
            echo $_SESSION["error"];
            echo '</div>';
            unset($_SESSION["error"]);
        }

        if (isset($_GET["redirigido"])) {
            echo '<div class="alert alert-danger text-center" role="alert">';
            echo "<p>Haga login para continuar</p>";
            echo '</div>';
        }

        ?>

        <?php
        if (!isset($_SESSION['datosUsuario'])) { ?>

            <div class="row justify-content-center" id="login">
                <div class="col-md-12">
                    <form action="php/login.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
    </div>
<?php  } else {

            echo '<div class="alert alert-success" role="alert">';
            echo 'Hola <strong>' . $_SESSION["datosUsuario"]["NOMBRE"] . " </strong>bienvenido/a";
            echo '</div>';
        }


?>






<?php require_once "footer.php" ?>

</body>

</html>