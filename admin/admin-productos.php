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
        print("<form action=agregar.php method='POST' ENCTYPE='multipart/form-data'/>");
        print('<fieldset>');
        print('<legend>Agregar Producto</legend>');
        print('<table id="producto-admin">');
        print('<tr><td class="nombreArticulo">Nombre</td>');
        print('<td class="campoArticulo"><input type="text"/></td></tr>');
        print('<tr><td class="nombreArticulo">Descripcion</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50">Descripción del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Precio</td>');
        print('<td class="campoArticulo"><input type="text"/> € (Euros)</td></tr>');
        print('<tr><td class="nombreArticulo">Requisitos</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50">Requisitos del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Plataforma</td>');
        print('<td class="campoArticulo"><input type="text"/></td></tr>');
        print('<tr><td class="nombreArticulo">Genero</td>');
        print('<td class="campoArticulo"><input type="text"/></td></tr>');
        print('<tr><td class="nombreArticulo">URL YouTube</td>');
        print('<td class="campoArticulo"><input type="text"/></td></tr>');
        print('<tr><td class="nombreArticulo">Fecha Publicación</td>');
        print('<td class="campoArticulo"><input type="text"/></td></tr>');
        print('</table>');
        print('</fieldset>');
        print('</form>');
        print('</div>');
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
