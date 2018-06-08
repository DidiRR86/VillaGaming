<?php
session_start();
require_once 'classes/conexiones.php';
    $id = $_REQUEST['id'];
    $option2 = $_REQUEST['option2'];
    $mail = $_SESSION['mailUsu'];
    
    $init = new Conexiones();
    return $init->modifiListaDeseosUser($id, $mail, $option2);
    
    