<?php
include "includes/cabecera.php";
include "functions/connectDB.php";

if (isset($_POST['crear'])) {



    if (empty($_POST['usuario']) || empty($_POST['contrasena'])) { /* Si no hay usuario ni contraseña se vuelve atrás */
        echo '<div class="alert alert-danger">Error: Introducir Usuario y Contraseña</div>';
        echo "<button onclick='window.history.back();' class='btn btn-danger'>Volver</button>";
        include('includes/pie.php');
        exit();
    }

    if (!isset($_POST['terminos'])) { /* Si no se aceptan los términos se vuelve atrás al registro */
        echo '<div class="alert alert-danger">No ha aceptado los términos y condiciones de registro</div>';
        echo "<button onclick='window.history.back();' class='btn btn-danger'>Volver</button>";
        include('includes/pie.php');
        exit();
    }



    $user = $_POST["usuario"];
    $pass = $_POST["contrasena"];
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $ciudad = $_POST["ciudad"];
    $postal = $_POST["postal"];


    /** Consulta si este usuario ya existe en la base de datos */
    $consulta = "SELECT * FROM usuario where usuario = '$user'";
    $ejecutarConsulta = mysqli_query($conexion, $consulta);
    $verFilas = mysqli_num_rows($ejecutarConsulta);

    if ($verFilas == 1) {
        echo '<div class="alert alert-danger">Error: Este usuario ya existe</div>';
    } else { /*El usuario no existe: Se inserta en la base de datos*/

        $insertarDatos = "INSERT INTO usuario VALUES('$user', ' $email' , '$pass', '$nombre','$apellido', '$ciudad', '$postal'  )";

        $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

        if (!$ejecutarInsertar) {
            echo '<div class="alert alert-danger">Error En la linea sql</div>';
        } else {
            echo '<div class="alert alert-success">Usuario registrado con éxito </div>';
            echo "<a  href='iniciarSesion.php' class='btn btn-primary' >Iniciar sesión</a>";
        }
    }
}



include "includes/pie.php";
