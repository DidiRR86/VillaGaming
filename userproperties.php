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
        <?php 
            require_once 'classes/conexiones.php';
            $lista = new Conexiones();
            $nums = $lista->getListaDeseosUser($_SESSION['mailUsu']);
        
            if(!$nums){
                echo "No hay lista";
            }else{
        ?>
        <div class="collection container" style="margin-top: 3%;">
        <?php 
                for($i=0;$i<count($nums);$i++){
       
                    if(null != $nums[$i]){
             ?>
           
                        <a class="collection-item"><?php echo $nums[$i];?></a>
            <?php 
                    }
                }
            }
            
        ?>
        </div>
    <?php include("footer.php");?>
    </body>
</html>
