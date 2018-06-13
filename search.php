<?php

if(!isset($_POST['search'])) exit ('No se recibió el valor a buscar');


function search(){
    $mysqli = new mysqli('localhost', 'root', '', 'villagaming');
    $mysqli->set_charset('utf8');
    $search = $mysqli->real_escape_string($_POST['search']);
    $query = "select idproducto, nombre from productos where nombre like '%$search%'";
    $res = $mysqli->query($query);
    
    while($row = $res->fetch_array(MYSQLI_ASSOC)){
        echo "<a class='collection-item' href='products.php?option=one&id=$row[idproducto]'>$row[nombre]</a>";
    }
}

search();

