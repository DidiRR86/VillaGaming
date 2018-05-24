<?php
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
    private $articulos = array();


    //Para hacer la conexion a la BD.
    private function conect(){
        $this->conexion = new mysqli('localhost', 'root', '', 'villagaming');
    }
    //Para desconectar la BD.
    private function disconect(){
        $this->conexion->close();
    }
    
    //Logear usuario.
    function loginUsers($usu, $pass){
        $this->conect();
        $consult = "select * from administradores where usuario='$usu' "
                . "and contrasena='$pass'";
        $result = $this->conexion->query($consult);
        $value = $result->fetch_array();
        
        if($result->num_rows != 0){
            $_SESSION['loginAdmin'] = $usu;
            header('Location:index.php');
        }else{
            $consult = "select nick,correo from usuarios where correo='$usu' "
                    . "&& contrasena='$pass'";
            $result = $this->conexion->query($consult);
            if($result->num_rows != 0){
                $data = $result->fetch_array();
                $_SESSION['loginUsu'] = $data[0];
                $_SESSION['mailUsu'] = $data[1];
                header('Location:index.php');
            }else{
                echo '<script type="text/javascript">alert("Usuario o Password '
                . 'incorrecta!, vuelva a intentarlo");window.location='
                . '"login.php";</script>';
            }
        }
        $this->disconect();
    }
    
    //Funcion para comprobar si un correo ya esta registrado.
    function checkUser($mail){
        $this->conect();
        $consult = "select * from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        if($result->num_rows !=0){
            return true;
        }else{
            return false;
        }
        $this->disconect();
    }
    
    //Funcion para añadir un nuevo usuario. **Posible incorporacion de enviar
    //un correo cuando se ha registrado**
    function registerUser($nick,$correo,$pass,$name,$surnames,$address,
            $location,$cp,$birthDate){
        $this->conect();
        $consult = "insert into usuarios(nick,correo,contrasena,"
                . "nombre,apellidos,direccion,localidad,cp,"
                . "fechnac) values ('$nick','$correo','$pass','$name',"
                . "'$surnames','$address','$location','$cp','$birthDate')";
        
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
        $this->disconect();
    }
    
    //Modificar datos de usuario
    function modifyPerfilUser($nick,$mail,$name,$surnames,$address,
            $location,$cp,$birthDate){
        $this->conect();
        $consult = "update usuarios set nick='$nick', name='$nombre',"
                . "apellidos='$surnames',direccion='$address',"
                . "localidad='$location',cp='$cp',fechnac='$birthDate'"
                . " where correo='$mail'";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
    }
    
    //Modificar configuracion de usuario
    function modifyMailUser($newMail, $oldMail){
        $this->conect();
        $consult = "update usuarios set correo='$newMail' where correo='$oldMail'";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
    }

    //Para sacar la informacion del usuario.
    function getUser($mail){
        $this->conect();
        $consult = "select * from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $this->disconect();
        return $data;
    }
    
    //Para sacar un producto en concreto.
    function getProduct($id){
        $this->conect();
        $consult = "select * from productos where idproducto='$id'";
        $result = $this->conexion->query($consult);
        $fila = $result->fetch_array();

        $this->disconect();
        return $fila;
    }
    
    //Para sacar todos los productos
    function getAllProducts(){
        $this->conect();
        $consult = "select * from productos";
        $result = $this->conexion->query($consult);
        while($fila = $result->fetch_array()){
            array_push($this->articulos, $fila);
        }
        $this->disconect();
        return $this->articulos;
    }
    
    //Sacar productos por la plataforma
    function getPlataformProduct($plataform){
        $this->conect();
        $consult = "select * from productos where plataforma='$plataform'";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $this->disconect();
        return $data;
    }
    
    //Sacar productos por el genero
    function getGeneroProduct($gen){
        $this->conect();
        $consult = "select * from productos where genero='$gen'";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $this->disconect();
        return $data;
        
    }
    
    //Sacar el numero de compras con el id del producto
    function getPurchasesProduct(){
        $this->conect();
        $consult = "select compras,idproducto from productos";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $this->disconect();
        return $data;
    }
    
    //Modificar la lista de deseos
    function modifiListaDeseosUser($id,$mail,$option){
        $this->conect();
        $consult = "select listades from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        $data = $result->fetch_array();
        
        $lista = json_decode($data);
        
        if($option === 'add'){
            array_push($lista, $id);
            $listJSON = json_encode($lista);
            $consult = "update usuarios set listades='$listJSON' where "
                    . "correo='$mail'";
            if($result = $this->conexion->query($consult)){
                return true;
            }else{
                return false;
            }
        }else if($option === 'del'){
            array_push($lista, $id);
            for($i=0;$i<$lista.length;$i++){
                if($lista[$i] == $id){
                    unset($lista[$i]);
                }
            }
            $listJSON = json_encode($lista);
            $consult = "update usuarios set listades='$listJSON' where "
                    . "correo='$mail'";
            if($result = $this->conexion->query($consult)){
                return true;
            }else{
                return false;
            }
        }
    }
    
    //Sacar lista de deseos de un user
    function getListaDeseosUser($mail){
        $this->conect();
        $consult = "select listades from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        
        if($result->num_rows == 0){
            return false;
        }else{
            $data = $result->fetch_array();
            $lista = json_decode($data[0]);
            return $lista;
        }
    }
}
