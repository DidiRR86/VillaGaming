<<<<<<< HEAD
<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>VillaGaming - Inicio</title>

        <link rel="stylesheet" type="text/css" href="css/products.css"/>
        <link rel="stylesheet" type="text/css" href="css/index.css" /> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
         <header>
            <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
        </header>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Steam</a></li>
            <li><a href="#!">Origin</a></li>
            <li><a href="#!">Uplay</a></li>
            <li><a href="#!">Xbox</a></li>
            <li><a href="#!">PlayStation</a></li>
            <li><a href="#!">Nintendo</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            <li><a href="#!">Accion</a></li>
            <li><a href="#!">Arcade</a></li>
            <li><a href="#!">Aventura</a></li>
            <li><a href="#!">Carreras</a></li>
            <li><a href="#!">Deporte</a></li>
            <li><a href="#!">Lucha</a></li>
            <li><a href="#!">Estrategia</a></li>
            <li><a href="#!">Indi</a></li>
            <li><a href="#!">Plataformas</a></li>
        </ul>
        <nav id="nav-bar" class="red lighten-2" style="width: 80%;margin: 0 auto;margin-top: 5%;">
            <div class="nav-wrapper">
                <ul class="left hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">
                            Plataforma<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li> <a class="dropdown-trigger" href="#!" data-target="dropdown2">
                            Genero<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="products.php">
                            Productos</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <?php
                    if (isset($_SESSION['loginUsu'])) {
                        echo "<li>" . $_SESSION['loginUsu'] . "</li>";
                        ?><li><a href='options.php?option=close' style="height: 64px;">
                                <img src="img/buttons/salida.png" style="margin-top: 55%;"></a><li>
                            <?php
                        } else {
                            ?><li><a href='login.php'>Login</a></li>
                        <li><a href="register.php">Resgistrarse</a></li>
                        <?php
                    }
                    ?>  
                </ul>
                <ul class="center hide-on-med-and-down" style="margin-left: 40%;">
                    <!-- Dropdown Trigger -->
                    <li><input type="search" style="background-color: white;
                               border-radius: 20px;
                               width: 125%;" placeholder="Buscar" /></li>
                </ul>
            </div>
        </nav>

        <?php
        require_once 'classes/conexiones.php';

        $dats = new Conexiones();

        $products = $dats->getAllProducts();
        ?>
        <div class="container" style="margin-top:3%;">
            <?php
            foreach ($products as $filas) {
                ?>
                <div class="card product hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo $filas['imagen']; ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?></span>
                        <p> <a class="waves-effect waves-light btn modal-trigger" 
                               href="#modal<?php echo $filas['idproducto']; ?>">Ver detalles producto</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?></span>
                        <p>
                            <?php
                            echo $filas['descripcion'];
                            ?>
                        </p>
                    </div>
                </div>
                <!--        Modal para los articulos-->
                <div id="modal<?php echo $filas['idproducto']; ?>" class="modal">
                    <div class="modal-content">
                        <h3 style="display: inline-block;"><?php echo $filas['nombre']; ?></h3>
                        <div style="display: inline-block;">
                            <i class="medium material-icons">favorite</i>
                        </div>
                        <h3><?php echo $filas['precio'].'€'; ?></h3>
                        <div style="margin-left:30%;">
                            <a class="waves-effect waves-light btn">
                                <i class="material-icons right">local_grocery_store</i>
                                Comprar</a>
                        </div>

                        <p><?php echo $filas['descripcion']; ?></p>

                        <div style="text-align: center;">
                            <iframe width="560" height="315" src="<?php echo $filas['youtube']; ?>" 
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="materialize/js/bin/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.modal').modal();
                $(".dropdown-trigger").dropdown();
            });

        </script>
    </body>
</html>
=======
<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>VillaGaming - Inicio</title>

        <link rel="stylesheet" type="text/css" href="css/products.css"/>
        <link rel="stylesheet" type="text/css" href="css/global.css" /> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
         <header>
            <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
        </header>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Steam</a></li>
            <li><a href="#!">Origin</a></li>
            <li><a href="#!">Uplay</a></li>
            <li><a href="#!">Xbox</a></li>
            <li><a href="#!">PlayStation</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            <li><a href="#!">Accion</a></li>
            <li><a href="#!">Arcade</a></li>
            <li><a href="#!">Aventura</a></li>
            <li><a href="#!">Carreras</a></li>
            <li><a href="#!">Deporte</a></li>
            <li><a href="#!">Estrategia</a></li>
            <li><a href="#!">Indi</a></li>
        </ul>
        <nav id="nav-bar" class="red lighten-2" style="width: 80%;margin: 0 auto;margin-top: 5%;">
            <div class="nav-wrapper">
                <ul class="left hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">
                            Plataforma<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li> <a class="dropdown-trigger" href="#!" data-target="dropdown2">
                            Genero<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger" href="products.php">
                            Productos</a></li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <?php
                    if (isset($_SESSION['loginUsu'])) {
                        echo "<li>" . $_SESSION['loginUsu'] . "</li>";
                        ?><li><a href='options.php?option=close' style="height: 64px;">
                                <img src="img/buttons/salida.png" style="margin-top: 55%;"></a><li>
                            <li><a href='vistacarro.php' style="height: 64px;">
                                <img src="img/buttons/carro.png" style="margin-top: 55%;"></a></li>
                            <?php
                        } else {
                            ?><li><a href='login.php'>Login</a></li>
                        <li><a href="register.php">Resgistrarse</a></li>
                        <?php
                    }
                    ?>  
                </ul>
                <ul class="center hide-on-med-and-down" style="margin-left: 40%;">
                    <!-- Dropdown Trigger -->
                    <li><input type="search" style="background-color: white;
                               border-radius: 20px;
                               width: 125%;" placeholder="Buscar" /></li>
                </ul>
            </div>
        </nav>

        <?php
        require_once 'classes/conexiones.php';

        $dats = new Conexiones();

        $products = $dats->getAllProducts();
        ?>
        <div class="container" style="margin-top:3%;">
            <?php
            foreach ($products as $filas) {
                ?>
                <div class="card product hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="materialboxed" width="650" src="<?php echo $filas['imagen']; ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?></span>
                        <p> <a class="waves-effect waves-light btn modal-trigger" 
                               href="#modal<?php echo $filas['idproducto']; ?>">Ver detalles producto</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?></span>
                        <p>
                            <?php
                            echo $filas['descripcion'];
                            ?>
                        </p>
                    </div>
                </div>
                <!--        Modal para los articulos-->
                <div id="modal<?php echo $filas['idproducto']; ?>" class="modal">
                    <div class="modal-content">
                        <h3 style="display: inline-block;"><?php echo $filas['nombre']; ?></h3>
                        <div style="display: inline-block;">
                            <i class="medium material-icons">favorite</i>
                        </div>
                        <div style="text-align:right;">
                            
                                <?php 
                                    if(isset($_SESSION['carrito'][$filas['idproducto']])){
                                        ?>
                                        <a class="waves-effect waves-light btn disabled" 
                                        href="options.php?option=add&id=<?php echo $filas['idproducto']; ?>">
                                        <i class="material-icons right">local_grocery_store</i>
                                        Comprar</a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="waves-effect waves-light btn" 
                                        href="options.php?option=add&id=<?php echo $filas['idproducto']; ?>">
                                        <i class="material-icons right">local_grocery_store</i>
                                        Comprar</a>
                                        <?php
                                    }
                                ?>
                        </div>

                        <p><?php echo $filas['descripcion']; ?></p>

                        <div style="text-align: center;">
                            <iframe width="560" height="315" src="<?php echo $filas['youtube']; ?>" 
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="materialize/js/bin/materialize.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.modal').modal();
                $(".dropdown-trigger").dropdown();
                $('.materialboxed').materialbox();
            });

        </script>
    </body>
</html>
>>>>>>> 7deba9fbe155eead55d2e797ab42215a440a5ca0
