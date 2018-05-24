<?php
include "../classes/consultas.php";
/*session_start();

if(!isset($_SESSION["admin"])) {
    header("location:index.php");
}*/

$codigo = $_REQUEST["codigo"];
$nombre = $_REQUEST["nombre"];
$precio = $_REQUEST["precio"];
$anyo = $_REQUEST["anyo"];
$plataforma = $_REQUEST["plataforma"];
$cantidad = $_REQUEST["cantidad"];
$imagen;


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

$consulta->agregar($idproducto,$nombre,$descripcion,$precio,$requisitos,$plataforma,$genero,$youtube,$imagen,$compras,$fechpubli);
header("location:articulos.php");
?>