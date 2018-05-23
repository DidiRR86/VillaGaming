<?php
    session_start();
    
    if(isset($_SESSION['loginAdmin'])){
        header('Location:admin/admin.php');
    }
?>
<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Inicio</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Steam</a></li>
      <li><a href="#!">Origin</a></li>
      <li><a href="#!">Uplay</a></li>
      <li><a href="#!">Xbox</a></li>
      <li><a href="#!">PlayStation</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="#!">Accion</a></li>
      <li><a href="#!">Arcade</a></li>
      <li><a href="#!">Aventura</a></li>
      <li><a href="#!">Carreras</a></li>
      <li><a href="#!">Deporte</a></li>
      <li><a href="#!">Estrategia</a></li>
      <li><a href="#!">Indi</a></li>
    </ul>
<nav id="nav-bar">
    <div class="nav-wrapper" style="display: inline-block;">
      <ul class="left hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li> <a class="dropdown-trigger" href="products.php" data-target="dropdown1"><i class="material-icons right">Genero</i></a></li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons right">Plataforma</i></a></li>
    </ul>
  </div>
    <div style="display: inline-block;margin-left: 40%;">
        <span><?php 
        if(isset($_SESSION['loginUsu'])){
            echo $_SESSION['loginUsu']."<br />";
            ?><a href='options.php?option=close'>Cerrar sesion</a>
            <?php
        }else{
            ?><a href='login.php'>Login <img src="img/buttons/login.png"></a>
            <?php
        }
        ?></span>
        <a href="register.php">Resgistrarse</a>
    </div>
  
</nav>
    
</body>
</html>