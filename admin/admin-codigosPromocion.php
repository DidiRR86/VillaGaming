<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Administrar Productos</title>
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/admin-list.css">
    <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../js/admin-list.js" type="text/javascript"></script>
</head>
<body class="admin">
    <div id="admin-header">
        <span>VillaGaming BackOffice</span>
    </div>
    <?php
    include '../classes/admin-consultas.php';
    session_start();
    if(!isset($_SESSION["loginAdmin"])) {
        header("location:../index.php");
    }

    $accion = $_REQUEST['accion'];

    if($accion == "agregar") {
        print('<div id="agregar-admin">');
        print("<form action=agregar-codigosPromocion.php method='POST' ENCTYPE='multipart/form-data'/>");
        print('<fieldset>');
        print('<legend>Agregar Código de Promoción</legend>');
        print('<table id="producto-admin">');
        print('<tr><td class="nombreArticulo">Código</td>');
        print('<td class="campoArticulo"><input type="text" name="codigo" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Valor</td>');
        print('<td class="campoArticulo"><input type="text" name="valor" required/><span>€ (Euros)</span></td></tr>');
        print('<tr><td class="nombreArticulo">Descripcion</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50" name="descripcion" required>Descripción del código de promoción</textarea></td></tr>');
        print('</table>');
        print('<div id="agregar-options">');
        print('<button type="button">
                <a href="productos.php">Cancelar</a>
               </button>');
        print('<input type="submit" value="Agregar"/>');
        print('</fieldset>');
        print('</form>');
        print('</div>');
    } elseif($accion == "eliminar") {
        $codigo = $_REQUEST['codigo'];
        $consulta = new Consultas();

        $consulta->eliminarCodigoPromocion($codigo);
        header("location:codigosPromocion.php");
    }
    ?>
</body>
</html>
