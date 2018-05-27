<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Inventario</title>
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/admin-list.css">
    <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../js/admin-list.js" type="text/javascript"></script>
</head>
<body class="admin">
    <?php
    include '../classes/admin-consultas.php';
    ?>
    <div id="lista-admin">
        <div id="opciones-admin">
            <span class="inverse">Artículos</span>
            <span class="normal">Códigos Promoción</span>
            <span class="normal">Usuarios</span>
            <?php
            print('<a href="admin-productos.php?accion=agregar">
                <span class="normal">Agregar</span>
            </a>');
            ?>
        </div>
        <fieldset>
            <legend>Inventario</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">Imagen</th>
                    <th class="campoArticulo">ID</th>
                    <th class="campoArticulo">Nombre</th>
                    <th class="campoArticulo">Precio</th>
                    <th class="campoArticulo">Plataforma</th>
                    <th class="campoArticulo">Género</th>
                    <th class="campoArticulo">YouTube</th>
                    <th class="campoArticulo">Compras</th>
                    <th class="campoArticulo">Fecha Publicación</th>
                    <th class="campoArticulo" colspan="2">Opciones</th>
                </tr>
                <?php
                $consulta = new Consultas();
                $productos = array();
                $productos = $consulta->mostrarTodos();

                foreach($productos as $producto) {
                    print('<tr><td class="campoArticulo imagen"><img src="../'.$producto['imagen'].'"></td>');
                    print('<td class="campoArticulo">'.$producto['idproducto'].'</td>');
                    print('<td class="campoArticulo">'.$producto['nombre'].'</td>');
                    /*print('<td class="campoArticulo">'.$producto['descripcion'].'</td>');*/
                    print('<td class="campoArticulo">'.$producto['precio'].' €</td>');
                    /*print('<td class="campoArticulo">'.$producto['requisitos'].'</td>');*/
                    print('<td class="campoArticulo">'.$producto['plataforma'].'</td>');
                    print('<td class="campoArticulo">'.$producto['genero'].'</td>');
                    print('<td class="campoArticulo"><a href="'.$producto['youtube'].'" target="_blank"><button type="button">ver video</button></a></td>');
                    print('<td class="campoArticulo">'.$producto['compras'].'</td>');
                    print('<td class="campoArticulo">'.$producto['fechpubli'].'</td>');
                    print('<td class="campoArticulo boton"><span>Modificar</span></td>');
                    print('<td class="campoArticulo boton">
                            <a href="admin-productos.php?accion=eliminar&idproducto='.$producto['idproducto'].'">
                                <span>Eliminar</span>
                            </a></td></tr>');
                }
                ?>
            </table>
        </fieldset>
    </div>
</body>
</html>