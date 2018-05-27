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

    function eliminar($idproducto) {
        $consulta = 'DELETE FROM productos WHERE idproducto = "'.$idproducto.'"';
        if($this->conexion->query($consulta)) {
            return true;
        }
    }
}