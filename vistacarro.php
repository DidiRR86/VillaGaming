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

        <div class="container center" style="color: white;">
                <?php
                
                if(isset($_SESSION['carrito'])){
                    if(count($_SESSION['carrito']) > 0){
                        $precioTotal = 0;
                    ?>
                    <form action="options.php?option=codPromo" method="get">
                        <table class="responsive-table">
                            <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th colspan="2">Precio</th>
                              </tr>
                            </thead>

                            <tbody>
                    <?php
                        foreach ($_SESSION['carrito'] as $productos){
                            $precioTotal += $productos['precio'];
                    ?>
                              <tr>
                                <td><?php echo $productos['nombre']; ?></td>
                                <td><?php echo $productos['precio']; ?> €</td>
                                <td><a href="options.php?option=del&delete=<?php 
                                echo $productos['idproducto']; ?>">
                                 <i class="small material-icons">clear</i></a></td>
                              </tr>
                    <?php
                        }
                            if(isset($_SESSION['codpromocion'])){
                                ?>
                            <tr>
                                <td></td>
                                <th colspan="2">Descuento código promocional</th>
                            </tr>
                            <tr>
                            <tr>
                              <td></td>
                              <td>
                              <?php 
                              $descuento = ($precioTotal*$_SESSION['codpromocion']['valor'])/100;
                              echo $descuento;?>
                              € (<?php echo $_SESSION['codpromocion']['valor']; ?> %)
                              </td>
                              <td><a href="options.php?option=delCodPromo">
                                 <i class="small material-icons">clear</i></a></td>
                            </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td></td>
                              <th>Precio Total</th>
                            </tr>
                            <?php 
                                if(isset($_SESSION['codpromocion'])){
                            ?>
                            <tr>
                              <td></td>
                              <td colspan="2"><?php echo $precioTotal-$descuento; ?></td>
                            </tr>
                            <?php 
                                }else{
                                ?>
                                <tr>
                                    <td></td>
                                    <td colspan="2"><?php echo $precioTotal; ?></td>
                                </tr>
                                <?php
                                }
                            ?>
                                <td>Código Promocional&nbsp;&nbsp;
                                        <input style="width:30%;" type="text" 
                                        required name="CodPromocional">
                                </td>
                                <td class="left">
                                  <button class="btn waves-effect waves-light right" 
                                      type="submit" 
                                      name="action">Aplicar
                                  </button>
                                </td>
                                <td></td>
                            </tr>
                          </tbody>
                      </table>
                    </form>
            <span class="center"><h4>Opciones de pago</h4></span>
            <form action="options.php?option=addPedido&prec=<?php echo $precioTotal; ?>" method="post">
                <table>
                    <tr>
                        <td>
                            <label>
                                <input name="group1" value="paypal" type="radio" required/>
                              <span><img src="img/buttons/paypal.png">
                              &nbsp;Compra con PayPal
                              </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input name="group1" value="tarjeta" type="radio" />
                              <span><img src="img/buttons/tarjeta-mastercard.png">
                                  <img src="img/buttons/visa.png">
                                  &nbsp;Compra con tarjeta Visa o MasteCard
                              </span>
                            </label>
                        </td>
                    </tr>
                </table>         
                <button class="btn waves-effect waves-light right" 
                        style="margin-top: 2%;" type="submit" 
                        name="action">Finalizar Compra
                  <i class="material-icons right">local_grocery_store</i>
                </button>
            </form>                    
                    <?php
                    }else{
                        echo 'No hay articulos añadidos';
                    }
                }else{
                    echo 'No hay articulos añadidos';
                }
                ?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>

