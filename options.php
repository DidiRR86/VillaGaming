<?php
    session_start();
    //Para controlar las peticiones del front.

    $option = $_REQUEST['option'];
    require_once 'classes/conexiones.php';
    
    if($option === "close"){
        session_destroy();
        header('Location:index.php');
    }

    if($option === "log"){
        $user = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        
        
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
        
        $date = new DateTime($birthDate);
        $dateBD = $date->format('d-m-Y');
        
        $register = new Conexiones();
        
        if(!$register->checkUser($mail)){
            if($register->registerUser($nick, $mail, $pass, $name, $surnames,
                $address, $location, $cp,$dateBD)){
            echo '<script type="text/javascript">alert("Registro completado '
                . 'correctamente!!");window.location="index.php";</script>';
            }else{
                echo '<script type="text/javascript">alert("Algo ha fallado en el '
                . 'registro, vuelve a intentarlo");window.location="register.php";</script>';
            }
        }else{
            echo '<script type="text/javascript">alert("Email ya registrado!")'
            . ';window.location="login.php";</script>';
        }
 
    }
    
    if($option === "add"){
        $id = $_REQUEST['id'];
        
        
    }
    

    