<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Inventario</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-list.css">
</head>
<body>
    <div id="lista-admin">
        <div id="opciones-admin">
            <span class="inverse">Artículos</span>
            <span class="normal">Códigos Promoción</span>
            <span class="normal">Usuarios</span>
            <span class="inverse">Agregar</span>
        </div>
        <fieldset>
            <legend>Inventario</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">Imagen</th>
                    <th class="campoArticulo">ID</th>
                    <th class="campoArticulo">Nombre</th>
                    <th class="campoArticulo">Descripción</th>
                    <th class="campoArticulo">Precio</th>
                    <th class="campoArticulo">Requisitos</th>
                    <th class="campoArticulo">Plataforma</th>
                    <th class="campoArticulo">Género</th>
                    <th class="campoArticulo">YouTube</th>
                    <th class="campoArticulo">Compras</th>
                    <th class="campoArticulo">Fecha Publicación</th>
                    <th class="campoArticulo" colspan="2">Opciones</th>
                </tr>
                <?php
                for($i=0;$i<5;$i++) {
                    print('<tr><td class="campoArticulo imagen"></td>');
                    for ($j = 0; $j < 10; $j++) {
                        print('<td class="campoArticulo">CeldaTest' . $j . '</td>');

                    }
                    print('<td class="campoArticulo boton"><span>Modificar</span></span></td>');
                    print('<td class="campoArticulo boton"><span>Eliminar</span></span></td>');
                    print('</tr>');
                }
                ?>
            </table>
        </fieldset>
    </div>
</body>
</html>