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
    <div id="lista-admin">
        <div id="opciones-admin">
            <?php
            print('<a href="productos.php">
                <span class="normal">Artículos</span>
            </a>');
            print('<a href="codigosPromocion.php">
                <span class="normal">Códigos Promoción</span>
            </a>');
            print('<a href="usuarios.php">
                <span class="inverse">Usuarios</span>
            </a>');
            print('<a href="admin-logout.php">
                <span class="normal">Salir</span>
            </a>');            ?>
        </div>
        <fieldset>
            <legend>Inventario</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">Nick</th>
                    <th class="campoArticulo">Correo</th>
                    <th class="campoArticulo">Nombre</th>
                    <th class="campoArticulo">Apellidos</th>
                    <th class="campoArticulo">Fecha Nacimiento</th>
                    <th class="campoArticulo">Opciones</th>
                </tr>
                <?php
                $consulta = new Consultas();
                $usuarios = array();
                $usuarios = $consulta->mostrarTodosUsuarios();

                foreach($usuarios as $usuario) {
                    print('<tr><td class="campoArticulo">'.$usuario['nick'].'</td>');
                    print('<td class="campoArticulo">'.$usuario['correo'].'</td>');
                    print('<td class="campoArticulo">'.$usuario['nombre'].'</td>');
                    print('<td class="campoArticulo">'.$usuario['apellidos'].'</td>');
                    print('<td class="campoArticulo">'.$usuario['fechnac'].'</td>');
                    print('<td class="campoArticulo boton">
                            <a href="admin-usuarios.php?correo='.$usuario['correo'].'">
                                <span>Eliminar</span>
                            </a></td></tr>');
                }
                ?>
            </table>
        </fieldset>
    </div>
</body>
</html>