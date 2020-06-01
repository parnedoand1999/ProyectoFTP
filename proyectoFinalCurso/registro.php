<?php
include "includes/cabecera.php";
include "functions/connectDB.php";

if(isset($_POST['crear']) ){
    $user = $_POST["usuario"];
    $pass = $_POST["contrasena"];
    $em = $_POST["email"];
    $name = $_POST["nombre"];
    $ape = $_POST["apellido"];
    $ciu = $_POST["ciudad"];
    $post = $_POST["postal"];
    
}
$insertarDatos = "INSERT INTO usuario VALUES('$user',  ' $em' , '$pass', '$name','$ape', '$ciu', '$post'  )";

$ejecutarInsertar = mysqli_query($conexion,$insertarDatos );
if(!$ejecutarInsertar){
    echo "Error En la linea sql";
}


$consulta = "SELECT * FROM usuario";
$ejecutarConsulta = mysqli_query($conexion , $consulta);
$verFilas = mysqli_num_rows($ejecutarConsulta);
$fila = mysqli_fetch_array($ejecutarConsulta);
if(!$ejecutarConsulta){
    echo "Error en la consulta";

}else{
    if($verFilas < 1){
        echo "<tr><td> Sin registros </td> </tr>";
    }
    else{
        for($i = 0 ; $i <= $fila ; $i++){
            echo '
            <tr>
                <td>'.$fila[0] .'</td>
                <td>'.$fila[1] .'</td>
                <td>'.$fila[2] .'</td>
                <td>'.$fila[3] .'</td>
                <td>'.$fila[4] .'</td>
                <td>'.$fila[5] .'</td>
                <td>'. $fila[6].'</td>

            </tr>
            ';
            $fila = mysqli_fetch_array($ejecutarConsulta);
        }
    }
}




include "includes/pie.php";


