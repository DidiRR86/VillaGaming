<?php
    session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexiones
 *
 * @author Salas
 */
class Conexiones {
    //put your code here
    private $conexion;
    
    //Para hacer la conexion a la BD.
    private function conect(){
        $this->conexion = new mysqli('localhost', 'admin', 'admin', 'villagaming');
    }
    //Para desconectar la BD.
    private function disconect(){
        $this->conexion->close();
    }
    
    //Logear usuario.
    function loginUsers($usu, $pass){
        $this->conect();
        $consult = "select * from administradores where usuario='$usu' and contrasena='$pass'";
        $result = $this->conexion->query($consult);
        $value = $result->fetch_array();
        
        if($result->num_rows != 0){
            $_SESSION['loginAdmin'] = $usu;
            header('Location:index.php');
        }else{
            $consult = "select * from usuarios where usuario='$usu' and contrasena='$pass'";
            $result = $this->conexion->query($consult);
            if($result->num_rows != 0){
                $_SESSION['loginUsu'] = $usu;
                header('Location:index.php');
            }else{
                echo '<script type="text/javascript">alert("Usuario o Password '
                . 'incorrecta!, vuelva a intentarlo");window.location='
                . '"login.php";</script>';
            }
        }
        $result->free();
        $this->disconect();
    }
    
    //Funcion para añadir un nuevo usuario. **Posible incorporacion de enviar
    //un correo cuando se ha registrado**
    function registerUser($nick,$correo,$pass,$name,$surnames,$address,
            $location,$cp,$birthDate){
        $this->conect();
        $consulta = "insert into usuarios('nick','correo','contrasena',"
                . "'nombre','apellidos','direccion','localidad','cp',"
                . "'fechnac') values ('$nick','$correo','$pass','$name',"
                . "'$surnames','$address','$location','$cp','$birthDate')";
        
        if($result = $this->conexion->query($consulta)){
            echo '<script type="text/javascript">alert("Enhorabuena!, se ha '
            . 'completado el registro");window.location="login.php";</script>';
        }else{
            $this->disconect();
            echo '<script type="text/javascript">alert("No se ha podido '
            . 'completar el registro!, vuelva a intentarlo");'
            . 'window.location="registro.php";</script>';
        }
    }
}
