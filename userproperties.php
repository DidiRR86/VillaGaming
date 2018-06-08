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
        

        ?>
        <div class="collection container" style="margin-top: 3%;">
            <ul id="tabs-swipe-demo" class="tabs">
                <li class="tab col s3"><a href="#test-swipe-1">Lista de deseos</a></li>
                <li class="tab col s3"><a href="#test-swipe-2">Test 2</a></li>
                <li class="tab col s3"><a href="#test-swipe-3">Test 3</a></li>
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
                          <img src="<?php echo $product['imagen'];?>" alt="" class="square"
                               style="width: 120px;">
                          <span class="title"><?php echo $product['nombre']." - ".$product['precio']." €";?></span>
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
            <div id="test-swipe-2" class="col s12">Test 2</div>
            <div id="test-swipe-3" class="col s12">Test</div>
        </div>
    <?php include("footer.php");?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tabs').tabs();
            });
        </script>
    </body>
</html>
