<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Inventario</title>
    <link rel="stylesheet" type="text/css" href="../css/admin-list.css">
</head>
<body>
    <div id="lista-admin">
        <fieldset>
            <legend>Inventario</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">ID</th>
                    <th class="campoArticulo">Nombre</th>
                    <th class="campoArticulo">Descripción</th>
                    <th class="campoArticulo">Precio</th>
                    <th class="campoArticulo">Requisitos</th>
                    <th class="campoArticulo">Plataforma</th>
                    <th class="campoArticulo">Género</th>
                    <th class="campoArticulo">YouTube</th>
                    <th class="campoArticulo">Fecha Publicación</th>
                    <th class="campoArticulo" colspan="2">Opciones</th>
                </tr>
                <?php
                for($i=0;$i<5;$i++) {
                    print('<tr>');
                    for ($j = 0; $j < 9; $j++) {
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