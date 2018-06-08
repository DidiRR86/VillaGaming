<?php
session_start();
if (isset($_SESSION['loginUsu'])) {
    header('Location:admin/index.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>VillaGaming - Login</title>
        <link rel="stylesheet" type="text/css" href="css/olvidoPass.css">
        <link rel="stylesheet" type="text/css" href="css/index.css" /> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div id="lista-admin">
             <div class="text">
                    <h3>¿Has olvidado tu contraseña?</h3>
                    <p>Por favor, introduce la dirección de correo electrónico que utilizaste para registrarte. Te enviaremos un e-mail con tu nueva contraseña</p>
                </div>
            <div class="row">
               
                <form class="col s12" method="post" action="password.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="correo">
                            <label>Email</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light red lighten-2" type="submit" 
                            name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="materialize/js/bin/materialize.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $(".dropdown-trigger").dropdown();
            });
        </script>
    </body>
</html>
