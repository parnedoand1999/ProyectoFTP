<?php
include "includes/cabecera.php";
include "functions/connectDB.php";

if(isset($_POST['iniciar'])){
$user = $_POST['user'];
$pass = $_POST['contra'];
}
$consulta = "SELECT * FROM usuario where usuario = $user";

$ejecutarConsulta = mysqli_query($conexion , $consulta);
$verFilas = mysqli_num_rows($ejecutarConsulta);
$fila = mysqli_fetch_array($ejecutarConsulta);



if($verFilas == 0){
  header("Location: iniciarsesion.php");
}
else{
    print_r($fila);
    echo "Usuario:" .$fila["usuario"];
}
include "includes/pie.php";
?>