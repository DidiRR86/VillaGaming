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
    <meta charset="UTF-8"/>
    <title>VillaGaming - Login</title>
    <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</header>
<body>
    <?php include("header.php");?>
    
    <div id="lista-admin" style="color: white;">
        <div class="row">
            <form class="col s12" method="post" action="options.php?option=log">
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" class="validate" name="user">
                  <label>Email</label>
                </div>
                <div class="input-field col s6">
                    <input type="password" class="validate" name="pass">
                  <label>Correo</label>
                </div>
              </div>
              <button class="btn waves-effect waves-light red lighten-2" type="submit" 
                      name="action">Acceder
                <i class="material-icons right">send</i>
              </button>
                &nbsp;&nbsp; <a href="register.php">¿Aún no estas registrado?</a><br /><br />
                    <a href="#">¿Has olvidado la contraseña?</a>
            </form>
        </div>
    </div>
    <?php include("footer.php");?>
</body>
</html>

