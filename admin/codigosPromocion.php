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
    session_start();
    if(!isset($_SESSION["loginAdmin"])) {
        header("location:../index.php");
    }

    ?>
    <div id="admin-header">
        <span>VillaGaming BackOffice</span>
    </div>
    <div id="lista-admin">
        <div id="opciones-admin">
            <?php
            print('<a href="productos.php">
                <span class="normal">Artículos</span>
            </a>');
            print('<a href="codigosPromocion.php">
                <span class="inverse">Códigos Promoción</span>
            </a>');
            print('<a href="usuarios.php">
                <span class="normal">Usuarios</span>
            </a>');
            print('<a href="admin-codigosPromocion.php?accion=agregar">
                <span class="normal">Agregar</span>
            </a>');
            print('<a href="admin-logout.php">
                <span class="normal">Salir</span>
            </a>');
            ?>
        </div>
        <fieldset>
            <legend>Códigos de promoción</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">Código</th>
                    <th class="campoArticulo">Valor</th>
                    <th class="campoArticulo" style="width: 20%">Opciones</th>
                </tr>
                <?php
                $consulta = new Consultas();
                $codigosPromocion = array();
                $codigosPromocion = $consulta->mostrarTodosCodigosPromocion();

                foreach($codigosPromocion as $codigoPromocion) {
                    print('<td class="campoArticulo">'.$codigoPromocion['codigo'].'</td>');
                    print('<td class="campoArticulo">'.$codigoPromocion['valor'].' €</td>');
                    print('<td class="campoArticulo boton">
                            <a href="admin-codigosPromocion.php?accion=eliminar&codigo='.$codigoPromocion['codigo'].'">
                                <span>Eliminar</span>
                            </a></td></tr>');
                }
                ?>
            </table>
        </fieldset>
    </div>
</body>
</html>