<?php
include "../classes/admin-consultas.php";
session_start();
if(!isset($_SESSION["admin"])) {
    header("location:../index.php");
}

$codigo = $_REQUEST["codigo"];
$valorStr = $_REQUEST["valor"];
$valor = (int)$valorStr;
$descripcion = $_REQUEST["descripcion"];

$consulta = new Consultas();

$consulta->agregarCodigoPromocion($codigo,(int)$valor,$descripcion);
header("location:codigosPromocion.php");
?>