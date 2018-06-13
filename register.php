<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION['loginAdmin'])){
        header('Location:admin/admin.php'); //Pagina principal del admion es Productos.php
    }else if(isset($_SESSION['loginUsu'])){
        header('Location:admin/index.php');
    }
?>
<html>
    <header>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>VillaGaming - Register</title>
        <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </header>
    <body>
        <?php include("header.php");?>
        <div id="lista-admin">
            <div class="row">
                <form class="col s12" method="post" action="options.php?option=register">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="user">
                            <label>Nick</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="email" class="validate" name="mail">
                            <label>Correo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="name">
                            <label>Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="validate" name="surname">
                            <label>Apellidos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="password" class="validate" name="pass">
                            <label>Contraseña</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" class="datepicker" name="birthdate">
                            <label>Fecha de Nacimiento</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light red lighten-2" type="submit" 
                            name="action">Registrar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <?php include("footer.php");?>
        <script type="text/javascript">
            $(function () {
                M.updateTextFields();
                $('.datepicker').datepicker();
            });
        </script>
    </body>
</html>

