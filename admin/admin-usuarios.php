<!DOCTIPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
    <title>VillaGaming - Administrador - Administrar Productos</title>
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

    $correo = $_REQUEST['correo'];
    $consulta = new Consultas();

    $consulta->eliminarUsuarios($correo);
    header("location:usuarios.php");
    ?>
</body>
</html>
