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
        $this->conexion->set_charset('utf8');
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
    function registerUser($nick,$correo,$pass,$name,$surnames,$birthDate){
        $this->conect();
        $consult = "insert into usuarios(nick,correo,contrasena,"
                . "nombre,apellidos,"
                . "fechnac) values ('$nick','$correo','$pass','$name',"
                . "'$surnames','$birthDate')";
        
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
        $this->disconect();
    }
    
    //Modificar datos de usuario
    function modifyPerfilUser($nick,$mail,$pass,$name,$surnames,$birthDate){
        $this->conect();
        $consult = "update usuarios set nick='$nick', contrasena='$pass', nombre='$name',"
                . "apellidos='$surnames',fechnac='$birthDate'"
                . " where correo='$mail'";
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
    
    //Añadir compra al producto productos
    function setPuPurchasesProduct($id){
        $this->conect();
        $consult = "select compras from productos where idproducto='$id'";
        $result = $this->conexion->query($consult);
        $compras =$result->fetch_array();
        $compras[0] += 1;
        
        $consult = "update productos set compras='$compras[0]' where idproducto='$id'";
        $result = $this->conexion->query($consult);
        
        $this->disconect();
    }
    
    //Sacar productos por la plataforma
    function getPlataformProduct($plataform){
        $this->conect();
        $consult = "select * from productos where plataforma='$plataform'";
        $result = $this->conexion->query($consult);
        if($result->num_rows > 0){
            while($fila = $result->fetch_array()){
                array_push($this->articulos, $fila);
            }
            $this->disconect();
            return $this->articulos;
        }else{
            return false;
        }
    }
    
    //Sacar productos por el genero
    function getGeneroProduct($gen){
        $this->conect();
        $consult = "select * from productos where genero='$gen'";
        $result = $this->conexion->query($consult);
        if($result->num_rows > 0){
            while($fila = $result->fetch_array()){
                array_push($this->articulos, $fila);
            }
            $this->disconect();
            return $this->articulos;
        }else{
            return false;
        }  
    }
    
    //Sacar el numero de compras con el id del producto
    /**function getPurchasesProduct(){
        $this->conect();
        $consult = "select compras,idproducto from productos";
        $result = $this->conexion->query($consult);
        while($fila = $result->fetch_array()){
            array_push($this->articulos, $fila);
        }
        $this->disconect();
        return $this->articulos;
    }*/
    
    //Modificar la lista de deseos
    function addListaDeseos($id,$mail){
        $this->conect();
        $consult = "select listades from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
 
        $data = $result->fetch_array();
        $datosBD = array();
        array_push($datosBD, json_decode($data[0]));
        $lista = array();

        for($i=0;$i<count($datosBD[0]);$i++){
            if(null != $datosBD[0][$i]){
                array_push($lista,$datosBD[0][$i]);
            }
        }
        for($i=0;$i<count($lista);$i++){
            if($id == $lista[$i]){
                return false;
            }
        }
        array_push($lista, $id);
        $listJSON = json_encode($lista);
        $consult = "update usuarios set listades='$listJSON' where "
                . "correo='$mail'";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        } 
    }
    
    //Eliminar un producto de la lista de deseos
    function delListaDeseos($id,$mail){
        $this->conect();
        $consult = "select listades from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $datosBD = array();
        array_push($datosBD, json_decode($data[0]));
        $lista = array();

        for($i=0;$i<count($datosBD[0]);$i++){
            array_push($lista,$datosBD[0][$i]);
        }
 
        for($i=0;$i<count($lista);$i++){
            if($lista[$i] == $id){
                unset($lista[$i]);
            }
        }
        $listJSON = json_encode(array_values($lista));
        $consult = "update usuarios set listades='$listJSON' where "
                . "correo='$mail'";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
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
            $lista = json_decode($data[0], false);
            return $lista;
        }
    }
    
    //Comprobar si esta el producto en la lista de deseos
    function comprobarProduListaDeseos($id, $mail){
        $this->conect();
        $consult = "select listades from usuarios where correo='$mail'";
        $result = $this->conexion->query($consult);
        
        $data = $result->fetch_array();
        $datosBD = array();
        array_push($datosBD, json_decode($data[0], false));
        $lista = array();
        $num = false;
        
        for($i=0;$i<count($datosBD[0]);$i++){
            if(null != $datosBD[0][$i]){
                if($datosBD[0][$i] == $id){
                    $num = true;
                }
                array_push($lista,$datosBD[0][$i]);
            }
        }
        return $num;
    }
    
    //Sacar los pedidos del usuario
    function getPedidosUser($mail){
        $this->conect();
        $consult = "select * from pedidos where correo='$mail'";
        $result = $this->conexion->query($consult);
        
        if($result->num_rows == 0){
            return false;
        }else{
            while($fila = $result->fetch_array()){
                array_push($this->articulos, $fila);
            }
            $this->disconect();
            return $this->articulos;
        }
    }
    
    //Saca el ultimo número de pedido
    function numPedido(){
        $this->conect();
        $consulta = "select max(idpedido) from pedidos";
        $result = $this->conexion->query($consulta);
        $this->disconect();
        return $result->fetch_array();
    }
    
    //Iniciar pedidos
    function initPedidos($mail){
       $this->conect();
        $consult = "insert into pedidos (correo) values ('$mail')";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
    }
    
    //Añadir la direccion de el archivo pdf
    function addPdfDirect($directFactu,$numPedido){
        $this->conect();
        $consult = "update pedidos set factura='$directFactu' where idpedido='$numPedido'";
        
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
    }
    
    //Añadir el numero dle juego a la bd
    function addNumGame($numGame,$idProdu,$idPedido){
        $this->conect();
        
        $consult = "insert into codigos (numcod,idproducto,pedidos_idpedido) "
                . "values ('$numGame',$idProdu,$idPedido)";
        if($result = $this->conexion->query($consult)){
            return true;
        }else{
            return false;
        }
        $this->disconect();
    }
    
    //Comprobar que existe el numero creado aleatoriamente
    function checkNumGame($num){
        $this->conect();
        $consult = "select * from codigos where numcod='$num'";
        $result = $this->conexion->query($consult);
                
        if($result->num_rows != 0){
            return true;
        }else{
            return false;
        }
        $this->disconect();
    }
    
    //Comprobar pass
     function comprobarPass($correo){
        $this->conect();
        $consulta = "SELECT CORREO FROM USUARIOS WHERE CORREO LIKE '$correo'";
        $resultado = $this -> conexion -> query($consulta);
        if($resultado -> num_rows != 0){
            return true;
        }
    }
   
    
    //Recuperar la contraseña olvidada
    function recuperarPass($correo){
        $this->conect();
        $consulta = "SELECT CONTRASENA FROM USUARIOS WHERE CORREO LIKE '$correo'";
        $resultado = $this -> conexion -> query($consulta) -> fetch_array();
        return $resultado[0];
    }
    
}
