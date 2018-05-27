<?php
/**
 * Description of carro
 *
 * @author Salas
 */
class Carro {
    private $carrito = array();
	//Iniciamos el carrito exista o no
        public function __construct(){
                if(!isset($_SESSION['carrito'])){
                        $_SESSION['carrito'] = null;
                        $this->carrito['precio_total'] = 0;
                }
                $this->carrito = $_SESSION['carrito'];
        }
        //Añadir un producto
        public function add($articulo = array()){
            //comprobar si esta vacio el array o si no es un array
            if(!is_array($articulo) || empty($articulo)){
                    throw new Exception("El articulo no es un array o esta vacio",1);
            }
           
            //Añadir el producto al carrito
            $_SESSION['carrito'][$articulo['idproducto']] = $articulo;

            $this->actu_carro();

        }

        private function actu_precio_cantidad(){
                $precio = 0;

                //recorrer el carro para actualizar el precio total y el numero ade articulos
                foreach($this->carrito as $fila){
                        $precio += $fila['precio'];
                }
                $_SESSION['carrito']['precio_total'] = $precio;

                //actualizar el carrito
                $this->actu_carro();
        }

        public function destruir(){
                unset($_SESSION['carrito']);
                $this->carrito = null;
                return true;
        }

        public function actu_carro(){
                self::__construct();
        }
    
}
