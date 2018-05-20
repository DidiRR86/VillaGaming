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

    $idproducto = $_REQUEST['idproducto'];
    $consulta = new Consultas();

    $consulta->eliminar($idproducto);
    header("location:productos.php");
    ?>
</body>
</html>
