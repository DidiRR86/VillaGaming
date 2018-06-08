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
    <?php include("header.php");?>
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
        <?php include("footer.php");?>
    </body>
</html>
