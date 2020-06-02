<?php
include "db.php";

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DATABASE);
if(!$conexion){
    echo"Error en la conexion con el servidor";
}

$conexion->set_charset('utf8'); /* Cambiar codificación para evitar problemas de caracteres especiales */
