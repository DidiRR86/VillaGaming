<?php

/**
 * Created by PhpStorm.
 * User: Guzman
 * Date: 20/05/2018
 * Time: 17:18
 */
class Consultas
{
    private $consultas;
    private $resultado;

    function __construct() {
        $this->conexion = new mysqli('localhost','guzman','guzman','villagaming');
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
}