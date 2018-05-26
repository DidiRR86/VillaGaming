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

    function agregar($idproducto,$nombre,$descripcion,$precio,$requisitos,$plataforma,$genero,$youtube,$imagen,$compras,$fechpubli) {
        $consulta = "INSERT INTO productos(CODIGOJUEGO,NOMBREJUEGO,PRECIO,ANYO,PLATAFORMA,CANTIDAD,IMAGEN) "
            . "VALUES('$idproducto','$nombre',$descripcion,$precio,'$requisitos',$plataforma,'$genero','$youtube','$imagen','$compras','$fechpubli')";
        $this->resultado = $this->conexion->query($consulta);
    }

    function eliminar($idproducto) {
        $consulta = 'DELETE FROM productos WHERE idproducto = "'.$idproducto.'"';
        if($this->conexion->query($consulta)) {
            return true;
        }
    }
}