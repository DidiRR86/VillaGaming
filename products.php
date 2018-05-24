<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<nav id="nav-bar" class="red lighten-2" style="width: 80%;margin: 0 auto;margin-top: 10%;">
    <div class="nav-wrapper">
      <ul class="left hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li> <a class="dropdown-trigger" href="#!" data-target="dropdown1">
              Genero<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">
              Plataforma<i class="material-icons right">arrow_drop_down</i></a></li>
              <li><a class="dropdown-trigger" href="products.php">
        Productos</a></li>
    </ul>
    <ul class="right hide-on-med-and-down">
        <?php 
        if(isset($_SESSION['loginUsu'])){
            echo "<li>".$_SESSION['loginUsu']."</li>";
            ?><li><a href='options.php?option=close'><img src="img/buttons/salida.png" 
            style="margin-top: 55%;"></a><li>
            <?php
        }else{
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
<div id="products">
    <?php
        foreach($products as $filas){
            ?>
             <div class="card product">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="<?php echo $filas['imagen']; ?>">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4"><?php echo $filas['nombre']; ?></span>
                  <p><a href="#">Ver detalles producto</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?php echo $filas['nombre']; ?></span>
                  <p><?php echo $filas['descripcion']; ?></p>
                </div>
             </div>
            <?php
        }?>
</div>
</body>
</html>