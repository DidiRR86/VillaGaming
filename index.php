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
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
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
        <h2 class="container center" style="color:white;margin-top: 4%;">Top Ventas</h2>
        <div class="center" style="width:auto;margin: 0 auto;margin-top: 3%;">
            <?php 
            include_once 'classes/conexiones.php';
            $con = new Conexiones();
            $num = 1;
            $datos = $con->cincoMasVendidos();
            foreach ($datos as $d){
            ?>
            <div class="card product hoverable" style="display:inline-block;width:17%;">
                <div class="card-image waves-effect waves-block waves-light">
                    <img width="650" src="<?php echo $d['imagen']; ?>">
                </div>
                <div id="text-card" class="card-content">
                    <a class="card-title activator grey-text text-darken-4">
                        <?php echo "<strong>".$num; 
                        $num++; 
                        echo "º</strong> - ";
                        echo $d['nombre']; ?></a>
                </div>
                <div class="card-action">
                    <strong><?php echo $d['precio']; ?> €</strong>
                </div>
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