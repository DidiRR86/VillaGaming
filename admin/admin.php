<!DOCTIPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Administrador - Inventario</title>
    <link rel="stylesheet" type="text/css" href="../css/global.css">
</head>
<body>
    <div id="lista-admin">
        <fieldset>
            <legend>Inventario</legend>
            <table id="articulos-admin">
                <tr>
                    <th class="campoArticulo">CampoTest1</th>
                    <th class="campoArticulo">CampoTest2</th>
                    <th class="campoArticulo">CampoTest3</th>
                    <th class="campoArticulo">CampoTest4</th>
                    <th class="campoArticulo">CampoTest5</th>
                    <th class="campoArticulo" colspan="2">Opciones</th>
                </tr>
                <?php
                for($i=0;$i<5;$i++) {
                    print('<tr>');
                    for ($j = 0; $j < 5; $j++) {
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