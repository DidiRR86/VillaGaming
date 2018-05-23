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
    <title>VillaGaming - Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div id="lista-admin">
        <fieldset>
            <legend>Login Users</legend>
            <form method="post" action="options.php?option=log">
                <div id="log">
                    <table>
                        <tr>
                            <td>Correo</td>
                            <td><input type="text" name="user" required/></td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="pass" required/></td>
                        </tr>
                    </table>
                    <input type="submit" value="Acceder"/>
                    &nbsp;&nbsp; <a href="register.php">¿Aún no estas registrado?</a><br /><br />
                    <a href="#">¿Has olvidado la contraseña?</a>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>

