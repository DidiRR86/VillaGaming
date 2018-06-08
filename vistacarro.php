<<<<<<< HEAD
<?php
session_start();

if (isset($_SESSION['loginAdmin'])) {
    header('Location:admin/admin.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>VillaGaming - Inicio</title>
        <link rel="stylesheet" type="text/css" href="css/global.css" /> 
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <li></li>
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


        <div class="container" style="color: white;">
                <?php
                if(isset($_SESSION['carrito'])){
                    $precioTotal = 0;
                ?>
                    <table class="responsive-table">
                        <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>Precio</th>
                          </tr>
                        </thead>

                        <tbody>
                <?php
                    foreach ($_SESSION['carrito'] as $productos){
                        $precioTotal += $productos['precio'];
                ?>
                          <tr>
                            <td><?php echo $productos['nombre']; ?></td>
                            <td><?php echo $productos['precio']; ?> €</td>
                          </tr>
                <?php
                    }
                ?>
                          <tr>
                              <td></td>
                            <th>Precio Total</th>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="2"><?php echo $precioTotal; ?></td>
                          </tr>
                        </tbody>
                    </table>
                    <a class="waves-effect waves-light right btn" 
                       href="options.php?option=addPedido&prec=<?php echo $precioTotal; ?>" style="margin-top: 2%;">
                    <i class="material-icons right">local_grocery_store</i>
                    Finalizar Compra</a>
                    
                <?php
                }else{
                    echo 'No hay articulos añadidos';
                }
                ?>
        </div>

        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="materialize/js/bin/materialize.js">
        </script>
        <script type="text/javascript">
            $(function () {
                $(".dropdown-trigger").dropdown();
            });
        </script>

    </body>
</html>

=======
<?php
session_start();

if (isset($_SESSION['loginAdmin'])) {
    header('Location:admin/admin.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>VillaGaming - Inicio</title>
        <link rel="stylesheet" type="text/css" href="css/index.css" /> 
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body>
<?php include("header.php");?>

        <div class="container" style="color: white;">
                <?php
                if(isset($_SESSION['carrito'])){
                    if(count($_SESSION['carrito']) > 0){
                        $precioTotal = 0;
                    ?>
                        <table class="responsive-table">
                            <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Precio</th>
                              </tr>
                            </thead>

                            <tbody>
                    <?php
                        foreach ($_SESSION['carrito'] as $productos){
                            $precioTotal += $productos['precio'];
                    ?>
                              <tr>
                                <td><?php echo $productos['nombre']; ?></td>
                                <td><?php echo $productos['precio']; ?> €</td>
                                <td><a href="options.php?option=del&delete=<?php 
                                echo $productos['idproducto']; ?>">
                                 <i class="small material-icons">clear</i></a></td>
                              </tr>
                    <?php
                        }
                    ?>
                              <tr>
                                  <td></td>
                                <th>Precio Total</th>
                              </tr>
                              <tr>
                                <td></td>
                                <td colspan="2"><?php echo $precioTotal; ?></td>
                              </tr>
                            </tbody>
                        </table>
            <span class="center"><h4>Opciones de pago</h4></span>
            <form action="options.php?option=addPedido&prec=<?php echo $precioTotal; ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <label>
                                <input name="group1" value="paypal" type="radio" required/>
                              <span><img src="img/buttons/paypal.png">
                              &nbsp;Compra con PayPal
                              </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input name="group1" value="tarjeta" type="radio" />
                              <span><img src="img/buttons/tarjeta-mastercard.png">
                                  <img src="img/buttons/visa.png">
                                  &nbsp;Compra con tarjeta Visa o MasteCard
                              </span>
                            </label>
                        </td>
                    </tr>
                </table>         
                <button class="btn waves-effect waves-light right" 
                        style="margin-top: 2%;" type="submit" 
                        name="action">Finalizar Compra
                  <i class="material-icons right">local_grocery_store</i>
                </button>
            </form>                    
                    <?php
                    }else{
                        echo 'No hay articulos añadidos';
                    }
                }else{
                    echo 'No hay articulos añadidos';
                }
                ?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>

>>>>>>> parent of ba28b61... Ya se eliminan productos de carro y no se permite comprar sin estar registrado
