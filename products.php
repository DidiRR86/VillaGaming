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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>

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