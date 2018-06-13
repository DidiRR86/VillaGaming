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
        <?php include("footer.php");?>
        <script type="text/javascript">
            $(function () {
                $('.slider').slider();
            });
        </script>

    </body>
</html>