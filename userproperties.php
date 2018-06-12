<?php
session_start();

if (isset($_SESSION['loginAdmin'])) {
    header('Location:admin/admin.php');
}
?>
<!DOCTYPE html>
<html>
    <header>
        
        <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>VillaGaming - Inicio</title>
       <link rel="stylesheet" type="text/css" href="css/index.css" /> 
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </header>
    <body>
    <?php include("header.php");?>
        <?php 
            require_once 'classes/conexiones.php';
            $lista = new Conexiones();
            $nums = $lista->getListaDeseosUser($_SESSION['mailUsu']);
            $pedidos = $lista->getPedidosUser($_SESSION['mailUsu']);
            $user = $lista->getUser($_SESSION['mailUsu']);
        

        ?>
        <div class="container" style="margin-top: 3%;">
            <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col s3"><a href="#test-swipe-1">Lista de deseos</a></li>
                <li class="tab col s3"><a href="#test-swipe-2">Pedidos</a></li>
                <li class="tab col s3"><a href="#test-swipe-3">Modificar datos</a></li>
            </ul>
            <div id="test-swipe-1" class="col s12">
                <?php 
                if(!$nums){
                    echo "No hay lista";
                }else{
                for($i=0;$i<count($nums);$i++){
       
                    if(null != $nums[$i]){
                        $product = $lista->getProduct($nums[$i])
                ?>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <a href="products.php?option=one&id=<?php echo $product['idproducto'];?>">
                          <img src="<?php echo $product['imagen'];?>" alt="" class="square"
                               style="width: 120px;">
                          <span class="title"><?php echo $product['nombre']." - ".$product['precio']." €";?></span></a>
                          <a href="options.php?option=delLike&id=<?php echo $product['idproducto'];?>" 
                             class="secondary-content"><i class="medium material-icons">clear</i></a>
                        </li>
                    </ul>
               <?php            
                           }
                       }
                }
               ?>
            </div>
            <div id="test-swipe-2" class="col s12">
                <?php
                    if(!$pedidos){
                        echo "Aún no hay pedidos";
                    }else{
                        ?>
                        <div class="collection">
                            <?php
                            for($i=0;$i<count($pedidos);$i++){
                            ?>
                                <a href="<?php echo $pedidos[$i]['factura'];?>" target="_blank"
                                class="collection-item center"><?php echo $pedidos[$i]['idpedido'];?></a>
                            <?php
                            }
                            ?>
                        </div>
                <?php
                    }
                ?>
            </div>
            <div id="test-swipe-3" class="col s12">
                <div id="lista-admin">
                    <div class="row">
                        <form class="col s12" method="post" action="options.php?option=update">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" class="validate" name="user" value="<?php echo $user['nick'];?>">
                                    <label>Nick</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" class="validate" name="mail"
                                        readonly="readonly" value="<?php echo $user['correo'];?>">
                                    <label>Correo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" class="validate" name="name" value="<?php echo $user['nombre'];?>">
                                    <label>Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="validate" name="surname" value="<?php echo $user['apellidos'];?>">
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="password" class="validate" name="pass" value="<?php echo $user['contrasena'];?>">
                                    <label>Contraseña</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" name="birthdate" value="<?php echo $user['fechnac'];?>">
                                    <label>Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light orange darken-2" type="submit" 
                                    name="action">Actualizar
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    <?php include("footer.php");?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tabs').tabs();
                $('.datepicker').datepicker();
            });
        </script>
    </body>
</html>
