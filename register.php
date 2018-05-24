<!DOCTIPE html>
<?php
    session_start();
    if(isset($_SESSION['loginAdmin'])){
        header('Location:admin/admin.php'); //Pagina principal del admion es Productos.php
    }else if(isset($_SESSION['loginUsu'])){
        header('Location:admin/index.php');
    }
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Register</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav id="nav-bar" class="red lighten-2" style="width: 80%;margin: 0 auto;margin-top: 10%;">
    <div class="nav-wrapper">
      <ul class="left hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li> <a class="dropdown-trigger" href="products.php" data-target="dropdown1">
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
                <div class="input-field col s12">
                  <input type="password" class="validate" name="pass">
                  <label>Contraseña</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" class="validate" name="address">
                  <label>Direccion</label>
                </div>
                <div class="input-field col s6">
                  <input type="text" class="validate" name="location">
                  <label>Localidad</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input type="text" class="validate" name="cp">
                  <label>Codigo Postal</label>
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
 <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="materialize/js/bin/materialize.min.js"></script>
<script type="text/javascript">
    $(function(){
      M.updateTextFields();
      $('.datepicker').datepicker();
  });
</script>
</body>
</html>

