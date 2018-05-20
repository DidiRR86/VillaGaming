<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Administrar Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-list.css">
</head>
<body>
    <?php
    include '../classes/consultas.php';
    $accion = $_REQUEST['accion'];

    if($accion == "agregar") {
        print('<div id="agregar-admin">');
        print('<fieldset>');
        print('<legend>Agregar Producto</legend>');
        print('<table id="producto-admin">');
        print('</table>');
        print('</fieldset>');
    } elseif($accion == "modificar") {

    } elseif($accion == "eliminar") {
        $idproducto = $_REQUEST['idproducto'];
        $consulta = new Consultas();

        $consulta->eliminar($idproducto);
        header("location:productos.php");
    }
    ?>
</body>
</html>
