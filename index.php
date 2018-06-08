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