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
                        $this->carrito['articulos_total'] = 0;
                }
                $this->carrito = $_SESSION['carrito'];
        }
        //Añadir un producto
        public function add($articulo = array()){
            //comprobar si esta vacio el array o si no es un array
            if(!is_array($articulo) || empty($articulo)){
                    throw new Exception("El articulo no es un array o esta vacio",1);
            }

            //Si no esta vacio, recorremos el carrito para insertar el producto nuevo
            if(!empty($this->carrito)){
                foreach($this->carrito as $fila){
                    if($fila['iden'] === $iden){
                            $articulo['cantidad'] = $fila['cantidad'] + $articulo['cantidad'];
                    }
                }
            }
            //añadir un elemento total para saber el precio de este articulo
            $articulo['total'] = $articulo['cantidad'] * $articulo['precio'];

            //Eliminar el producto si es que esta en el carro
            $this->unset_product($articulo['cod_articulo']);

            //Añadir el producto al carrito
            $_SESSION['carrito'][$articulo['cod_articulo']] = $articulo;

            $this->actu_carro();

            $this->actu_precio_cantidad();
        }

        private function actu_precio_cantidad(){
                $precio = 0;
                $articulos = 0;

                //recorrer el carro para actualizar el precio total y el numero ade articulos
                foreach($this->carrito as $fila){
                        $precio += ($fila['precio'] * $fila['cantidad']);
                        $articulos += $fila['cantidad'];
                }
                $_SESSION['carrito']['articulos_total'] = $articulos;
                $_SESSION['carrito']['precio_total'] = $precio;

                //actualizar el carrito
                $this->actu_carro();
        }

        //Metodo para retornar el precio total del carro
        public function precio_total(){
                if(!isset($this->carrito['precio_total']) || $this->carrito === null){
                        return 0;
                }
                return $this->carrito['precio_total'];
        }

        //Muestra cuantos articulos hay en el carro
        public function articulos_total(){
                if(!isset($this->carrito['articulos_total']) || $this->carrito === null){
                        return 0;
                }
                return $this->carrito['articulos_total'];
        }

        //muestra el contenido del carro
        public function contenido(){
                $carrito = $this->carrito;

                //Borrar los articulos y el rpecio total, ya que estos los devuelven los metodos
                unset($carrito['articulos_total']);
                unset($carrito['precio_total']);

                //en el ejemplo pone retunr $carrito == null ? null : $carrito
                return $carrito;
        }

        //Eliminar un producto del carro si ya existia.
        private function unset_product($id){
                unset($_SESSION['carrito'][$id]);
        }

        //Eliminar un producto del carro
        public function remove_product($id){
                //Error para comprobar si existe el carro
                if($this->carrito == null){
                        throw new Exception("El carrito no existe",1);
                }

                //Error para comprobar si existe el articulo en el carro
                if(!isset($this->carrito[$id])){
                        throw new Exception("La id del producto no existe",1);
                }

                //Eliminamos en elemento del carro y actualizamos
                unset($_SESSION['carrito'][$id]);
                $this->actu_carro();
                $this->actu_precio_cantidad();

                return true;
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
