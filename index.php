<?php
session_start();

if (isset($_SESSION['loginAdmin'])) {
    header('Location:admin/productos.php');
}
?>
<!DOCTYPE html>
<html>
    <header>
        <meta charset="UTF-8"/>
        <title>VillaGaming - Inicio</title>
        <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
       <link rel="stylesheet" type="text/css" href="css/index.css" /> 
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </header>
    <body>
    <?php include("header.php");?>
        <div class="slider" style="width: 73%;
             margin: 0 auto;
             margin-top: 3%;">
            <ul class="slides">
                <li>
                    <img src="img/portada/img1.jpg"> <!-- random image -->
                </li>
                <li>
                    <img src="img/portada/img2.jpg"> <!-- random image -->
                </li>
                <li>
                    <img src="img/portada/img3.jpg"> <!-- random image -->
                </li>
                <li>
                    <img src="img/portada/img4.jpg"> <!-- random image -->
                </li>
            </ul>
        </div>
        <div class="carousel container carousel-slider center" style="width:30%;">
            <?php 
            include_once 'classes/conexiones.php';
            $con = new Conexiones();
            
            $datos = $con->cincoMasVendidos();
            foreach ($datos as $d){
            ?>
            <div class="carousel-item white-text" 
                 href="products.php?option=one&id=<?php echo $d['idproducto']; ?>"
                 style="background-image: url(<?php echo $d['imagen']; ?>);
                 background-repeat: no-repeat, repeat;">
              <h2><?php echo $d['nombre']; ?></h2>
              <p class="white-text"><?php echo $d['precio']; ?></p>
            </div>
            <?php
            }
            ?>
        </div>
        <?php include("footer.php");?>
        <script type="text/javascript">
            $(function () {
                $('.slider').slider();
                $('.carousel.carousel-slider').carousel({
                    fullWidth: true,
                    indicators: true
                  });
            });
        </script>

    </body>
</html>