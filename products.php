<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>        
    <header>
            <a title="Inicio" href="index.php"><img src="img/banner.png"></a>
            <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
            <title>VillaGaming - Inicio</title>

            <link rel="stylesheet" type="text/css" href="css/products.css"/>
            <link rel="stylesheet" type="text/css" href="css/index.css" />  
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
            <link rel="stylesheet" href="materialize/css/materialize.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </header>
    
    <body>
    <?php include("header.php");?>

        <?php
        require_once 'classes/conexiones.php';

        $dats = new Conexiones();
        
        $option = $_REQUEST['option'];
        $products = null;
        $gen = null;
        $plat = null;
        if($option == 'all'){
            $products = $dats->getAllProducts();
        }else if($option == 'categorie'){
            $gen = $_REQUEST['gen'];
            $products = $dats->getGeneroProduct($gen);
        }else if($option == 'plataform'){
            $plat = $_REQUEST['plat'];
            $products = $dats->getPlataformProduct($plat);
        }
        ?>
        <div class="container center" style="color:white;">
            <?php 
                if($option == 'all'){
                    echo '<h2>Todos los productos</h2>';
                }else if($option == 'categorie'){
                    echo '<h2>Productos por genero: '.ucwords($gen).'</h2>';
                }else{
                    echo '<h2>Productos por plataforma: '.$plat.'</h2>';
                }
            ?>
        </div>
        <div class="container" style="margin-top:3%;">
            <?php
            if(null != $products){
            foreach ($products as $filas) {
                ?>
                <div class="card product hoverable">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="materialboxed" width="650" src="<?php echo $filas['imagen']; ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?></span>
                        <p> <a class="waves-effect waves-light btn modal-trigger" 
                               href="#modal<?php echo $filas['idproducto']; ?>">Ver detalles producto</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">
                            <?php echo $filas['nombre']; ?><i class="material-icons right">close</i></span>
                        <p>
                            <?php
                            echo $filas['descripcion'];
                            ?>
                        </p>
                    </div>
                </div>
                <!--        Modal para los articulos-->
                <div id="modal<?php echo $filas['idproducto']; ?>" class="modal">
                    <div class="modal-content">
                        <input id="idproducto" type="text" value="<?php echo $filas['idproducto']; ?>" style="display:none;" />
                        <h2 style="display: inline-block;"><?php echo $filas['nombre']; ?></h2>
                        
                        <span class="right"><img src="img/buttons/<?php echo $filas['plataforma']; ?>.png"></span>
                        
                        <h4 class="center"><u><?php echo $filas['precio'].'€'; ?></u></h4>
                        <div style="text-align:right;">
                            <?php 
                            if(isset($_SESSION['loginUsu'])){
                                if($dats->comprobarProduListaDeseos($filas['idproducto'],$_SESSION['mailUsu'])){
                                ?>
                                    <img src="img/buttons/liked.png" class="left">
                                <?php
                                }else{
                                ?>
                                    <a class="like" id="<?php echo $filas['idproducto']; ?>"
                                       href="#">
                                    <img src="img/buttons/like.png" class="left"></a>
                                <?php 
                                }
                            }else{
                            ?>
                                <img src="img/buttons/like.png" class="left">
                            <?php
                            }
                            if(isset($_SESSION['carrito'][$filas['idproducto']])){
                                ?>
                                <a class="waves-effect waves-light btn disabled" 
                                href="options.php?option=add&id=<?php echo $filas['idproducto']; ?>">
                                <i class="material-icons right">local_grocery_store</i>
                                Comprar</a>
                                <?php
                            }else{
                                ?>
                                <a class="waves-effect waves-light btn" 
                                href="options.php?option=add&id=<?php echo $filas['idproducto']; ?>">
                                <i class="material-icons right">local_grocery_store</i>
                                Comprar</a>
                                <?php
                            }
                            ?>
                        </div>

                        <p><?php echo $filas['descripcion']; ?></p>

                        <div style="text-align: center;">
                            <iframe width="560" height="315" src="<?php echo $filas['youtube']; ?>" 
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>

                </div>
                <?php
            }
            }else{
                echo "No hay productos";
            }
            ?>
        </div>
        <?php include("footer.php");?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.modal').modal();
                $('.materialboxed').materialbox();
                $('.like').click(function(){
                    if (window.XMLHttpRequest) {
                        peticion_http=new XMLHttpRequest(); 
                      } else if (window.ActiveXObject) {
                        peticion_http=ActiveXObject("Microsoft.XMLHTTP"); 
                      } 

                    var id = $(this).attr('id');

                    if(peticion_http) {
                        peticion_http.onreadystatechange = function(){
                            if(peticion_http.readyState == 4 && peticion_http.status == 200) {
                                if(peticion_http.responseText){
                                    M.toast({html: 'Agregado correctamente!'});
                                }else{
                                    M.toast({html: 'Fallo al agregar artículo!'});
                                }
                            }
                        };
                      peticion_http.open("POST", "options.php");

                      //Meto cabeceras y cuerpo de la petición para enviar los datos del formulario 
                      // que me interesa enviar. En este caso solo el login

                      peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                      peticion_http.send("option=addLike&id="+id);
                    }    
                });
            });
        </script>
    </body>
</html>
