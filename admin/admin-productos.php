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
    <?php
    include '../classes/admin-consultas.php';
    $accion = $_REQUEST['accion'];

    if($accion == "agregar") {
        print('<div id="agregar-admin">');
        print("<form action=agregar.php method='POST' ENCTYPE='multipart/form-data'/>");
        print('<fieldset>');
        print('<legend>Modificar Producto</legend>');
        print('<table id="producto-admin">');
        print('<tr><td class="nombreArticulo">Nombre</td>');
        print('<td class="campoArticulo"><input type="text" name="nombre" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Descripcion</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50" name="descripcion" required>Descripción del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Precio</td>');
        print('<td class="campoArticulo"><input type="text" name="precio" required/><span>€ (Euros)</span></td></tr>');
        print('<tr><td class="nombreArticulo">Requisitos</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50" name="requisitos" required>Requisitos del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Plataforma</td>');
        print('<td class="campoArticulo">
                    <select name="plataforma" required>
                        <option value="PC">PC</option>
                        <option value="PS4">PS4</option>
                        <option value="Xbox One">Xbox One</option>
                        <option value="Nintendo Switch">Nintendo Switch</option>
                    </select>
               </td></tr>');
        print('<tr><td class="nombreArticulo">Genero</td>');
        print('<td class="campoArticulo">
                    <select name="genero" required>
                        <option value="Accion">Accion</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Carreras">Carreras</option>
                        <option value="Plataformas">Plataformas</option>
                        <option value="RPG">Nintendo Switch</option>
                        <option value="Shooter">Shooter</option>
                        <option value="Terror">Terror</option>
                    </select>
               </td></tr>');
        print('<tr><td class="nombreArticulo">URL YouTube</td>');
        print('<td class="campoArticulo"><input type="text" name="youtube" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Fecha Publicación</td>');
        print('<td class="campoArticulo"><input type="date" name="fechpubli" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Portada</td>');
        print('<td class="campoArticulo"><input type="file" name="imagen" required/></td></tr>');
        print('</table>');
        print('<div id="agregar-options">');
        print('<button type="button">
                <a href="productos.php">Cancelar</a>
               </button>');
        print('<input type="submit" value="Agregar"/>');
        print('</fieldset>');
        print('</form>');
        print('</div>');
    } elseif($accion == "modificar") {
        print('<div id="agregar-admin">');
        print("<form action=agregar.php method='POST' ENCTYPE='multipart/form-data'/>");
        print('<fieldset>');
        print('<legend>Agregar Producto</legend>');
        print('<table id="producto-admin">');
        print('<tr><td class="nombreArticulo">Nombre</td>');
        print('<td class="campoArticulo"><input type="text" name="nombre" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Descripcion</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50" name="descripcion" required>Descripción del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Precio</td>');
        print('<td class="campoArticulo"><input type="text" name="precio" required/><span>€ (Euros)</span></td></tr>');
        print('<tr><td class="nombreArticulo">Requisitos</td>');
        print('<td class="campoArticulo"><textarea rows="4" cols="50" name="requisitos" required>Requisitos del producto</textarea></td></tr>');
        print('<tr><td class="nombreArticulo">Plataforma</td>');
        print('<td class="campoArticulo">
                    <select name="plataforma" required>
                        <option value="PC">PC</option>
                        <option value="PS4">PS4</option>
                        <option value="Xbox One">Xbox One</option>
                        <option value="Nintendo Switch">Nintendo Switch</option>
                    </select>
               </td></tr>');
        print('<tr><td class="nombreArticulo">Genero</td>');
        print('<td class="campoArticulo">
                    <select name="genero" required>
                        <option value="Accion">Accion</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Carreras">Carreras</option>
                        <option value="Plataformas">Plataformas</option>
                        <option value="RPG">Nintendo Switch</option>
                        <option value="Shooter">Shooter</option>
                        <option value="Terror">Terror</option>
                    </select>
               </td></tr>');
        print('<tr><td class="nombreArticulo">URL YouTube</td>');
        print('<td class="campoArticulo"><input type="text" name="youtube" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Fecha Publicación</td>');
        print('<td class="campoArticulo"><input type="date" name="fechpubli" required/></td></tr>');
        print('<tr><td class="nombreArticulo">Portada</td>');
        print('<td class="campoArticulo"><input type="file" name="imagen" required/></td></tr>');
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
        $idproducto = $_REQUEST['idproducto'];
        $consulta = new Consultas();

        $consulta->eliminar($idproducto);
        header("location:productos.php");
    }
    ?>
</body>
</html>
