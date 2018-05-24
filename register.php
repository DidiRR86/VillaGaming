<!DOCTIPE html>
<?php
    session_start();
    if(isset($_SESSION['loginAdmin'])){
        header('Location:admin/admin.php'); //Pagina principal del admion es Productos.php
    }else if(isset($_SESSION['loginUsu'])){
        header('Location:admin/index.php');
    }
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>VillaGaming - Register</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div id="lista-admin">
        <fieldset>
            <legend>Register Users</legend>
            <form method="post" action="options.php?option=register">
                <div id="log">
                    <table>
                        <tr>
                            <td>Nick</td>
                            <td><input type="text" name="user" required/></td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td><input type="text" name="mail" required/></td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="pass" required/></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="name" required/></td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="surname" required/></td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td><input type="text" name="address" required/></td>
                        </tr>
                        <tr>
                            <td>Localidad</td>
                            <td><input type="text" name="location" required/></td>
                        </tr>
                        <tr>
                            <td>Codigo Postal</td>
                            <td><input type="text" name="cp" required/></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td><input type="date" name="birthdate" required/></td>
                        </tr>
                    </table>
                    <input type="submit" value="Registrar"/>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>

