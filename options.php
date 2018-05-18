<?php
    //Para controlar las peticiones del front.

    $option = $_REQUEST['option'];

    if($option === "log"){
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        
        require_once 'conexiones.php';
        $log = new Conexiones();
        
        $log->loginUsers($user, $pass);
    }
    
    if($option === "register"){
        $nick = $_REQUEST['user'];
        $mail = $_REQUEST['mail'];
        $pass = $_REQUEST['pass'];
        $name = $_REQUEST['name'];
        $surnames = $_REQUEST['surname'];
        $address = $_REQUEST['address'];
        $location = $_REQUEST['location'];
        $cp = $_REQUEST['cp'];
        $birthDate = $_REQUEST['birthdate'];
        
        require_once 'conexiones.php';
        $register = new Conexiones();
        
        if($register->registerUser($nick, $mail, $pass, $name, $surnames,
                $address, $location, $cp, $birthDate)){
            echo '<script type="text/javascript">alert("Registro completado '
                . 'correctamente!!");window.location="login.php";</script>';
        }else{
            echo '<script type="text/javascript">alert("Algo ha fallado en el '
            . 'registro, vuelve a intentarlo");window.location="login.php";</script>';
        }
    }
    

    