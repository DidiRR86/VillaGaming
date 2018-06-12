<?php
class Consultas
{
    private $consultas;
    private $resultado;

    function __construct() {
        $this->conexion = new mysqli('localhost','root','','villagaming');
        /*$this->conexion = new mysqli('localhost','admin','admin','villagaming');*/
    }

    function mostrarTodos() {
        $consulta = 'SELECT * FROM productos';
        $productos = array();
        $this->resultado = $this->conexion->query($consulta);

        while($fila = $this->resultado->fetch_array()) {
            array_push($productos,$fila);
        }

        return $productos;
    }

    function agregar($nombre,$descripcion,$precio,$requisitos,$plataforma,$genero,$youtube,$imagen,$compras,$dateBD) {
        $consulta = "INSERT INTO productos(nombre,descripcion,precio,requisitos,plataforma,genero,youtube,imagen,compras,fechpubli) "
            . "VALUES('$nombre','$descripcion','$precio','$requisitos','$plataforma','$genero','$youtube','$imagen','$compras','$dateBD')";
        $this->resultado = $this->conexion->query($consulta);
    }

    function seleccionarFila($idproducto) {
        $consulta = "SELECT * FROM productos WHERE idproducto = '$idproducto'";
        $producto = array();

        $this->resultado = $this->conexion->query($consulta);

        $producto = $this->resultado->fetch_array();

        return $producto;
    }

    function modificar($idproducto,$nombre,$descripcion,$precio,$requisitos,$plataforma,$genero,$youtube,$dateBD) {
        $consulta = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', "
            ."requisitos = '$requisitos', plataforma = '$plataforma', genero = '$genero', youtube = '$youtube', fechpubli = '$dateBD' "
            ."WHERE idproducto = '$idproducto'";

        $this->resultado = $this->conexion->query($consulta);
    }

    function eliminar($idproducto) {
        $consulta = 'DELETE FROM productos WHERE idproducto = "'.$idproducto.'"';
        if($this->conexion->query($consulta)) {
            return true;
        }
    }

    function mostrarTodosUsuarios() {
        $consulta = 'SELECT * FROM usuarios';
        $usuarios = array();
        $this->resultado = $this->conexion->query($consulta);

        while($fila = $this->resultado->fetch_array()) {
            array_push($usuarios,$fila);
        }

        return $usuarios;
    }

    function eliminarUsuarios($correo) {
        $consulta = 'DELETE FROM usuarios WHERE correo = "'.$correo.'"';
        if($this->conexion->query($consulta)) {
            return true;
        }
    }

    function mostrarTodosCodigosPromocion() {
        $consulta = 'SELECT * FROM codpromo';
        $codigosPromocion = array();
        $this->resultado = $this->conexion->query($consulta);

        while($fila = $this->resultado->fetch_array()) {
            array_push($codigosPromocion,$fila);
        }

        return $codigosPromocion;
    }

    function agregarCodigoPromocion($codigo,$precio,$descripcion) {
        $consulta = "INSERT INTO codpromo(codigo,valor,descripcion) "
            . "VALUES('$codigo','$precio','$descripcion')";
        $this->resultado = $this->conexion->query($consulta);
    }

    function eliminarCodigoPromocion($codigo) {
        $consulta = 'DELETE FROM codpromo WHERE codigo = "'.$codigo.'"';
        if($this->conexion->query($consulta)) {
            return true;
        }
    }
}