<?php
include "../classes/consultas.php";
/*session_start();

if(!isset($_SESSION["admin"])) {
    header("location:index.php");
}*/

$nombre = $_REQUEST["nombre"];
$descripcion = $_REQUEST["descripcion"];
$precioStr = $_REQUEST["precio"];
$precio = (int)$precioStr;
$requisitos = $_REQUEST["requisitos"];
$plataforma = $_REQUEST["plataforma"];
$genero = $_REQUEST["genero"];
$youtube = $_REQUEST["youtube"];
$imagen = "something";
$compras = 0;
$fechpubli = new DateTime($_REQUEST["fechpubli"]);
$dateBD = $fechpubli->format('d/m/Y');

/*$caratula;
if (is_uploaded_file($_FILES['caratula']['tmp_name'])) {
    if (!is_dir("../img/covers/"))
        mkdir("../img/covers/");
    $destino = "../img/covers/";
    $caratula = $destino.$_FILES['caratula']['name'];
    $imagen = "img/covers/".$_FILES['caratula']['name'];
    if (!is_file($caratula)) {
        move_uploaded_file($_FILES['caratula']['tmp_name'], $caratula);
        echo "fichero movido";
    } else
        echo "no se ha podido mover el fichero ya existe";
}*/

$consulta = new Consultas();

$consulta->agregar($nombre,$descripcion,(int)$precio,$requisitos,$plataforma,$genero,$youtube,$imagen,$compras,$dateBD);
header("location:productos.php");
?>