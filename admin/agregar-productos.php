<?php
include "../classes/admin-consultas.php";
session_start();
if(!isset($_SESSION["admin"])) {
    header("location:../index.php");
}

$nombre = $_REQUEST["nombre"];
$descripcion = $_REQUEST["descripcion"];
$precioStr = $_REQUEST["precio"];
$precio = (int)$precioStr;
$requisitos = $_REQUEST["requisitos"];
$plataforma = $_REQUEST["plataforma"];
$genero = $_REQUEST["genero"];
$youtube = $_REQUEST["youtube"];
$compras = 0;
$fechpubli = new DateTime($_REQUEST["fechpubli"]);
$dateBD = $fechpubli->format('d/m/Y');

$imagen;
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
    if (!is_dir("img/covers/"))
        mkdir("img/covers/");
    $destino = "../img/covers/";
    $unica = time();
    $imagen = $destino.$unica.$_FILES['imagen']['name'];
    $imagenBD = "img/covers/".$unica.$_FILES['imagen']['name'];
    $archivo = $_FILES['imagen']['name'];
    if (!is_file($imagen)) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
        echo "fichero movido";
    } else
        echo "no se ha podido mover el fichero ya existe";
}

$consulta = new Consultas();

$consulta->agregar($nombre,$descripcion,(int)$precio,$requisitos,$plataforma,$genero,$youtube,$imagenBD,$compras,$dateBD);
header("location:productos.php");
?>