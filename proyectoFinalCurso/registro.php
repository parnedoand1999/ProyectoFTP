<?php
include "functions/connectDB.php";

if (isset($_POST['crear'])) {

    include "includes/cabecera.php";



    if (empty($_POST['usuario']) || empty($_POST['contrasena'])) { /* Si no hay usuario ni contraseña se vuelve atrás */

        $cadena = "<div class='container-fluid'>
        <div class='row'>
            <div class='col-12'>
                <h2>Error</h2>
            </div>
            <div class='col-12'>
                <div class='alert alert-danger' role='alert'>Introducir <strong>Usuario</strong> y <strong>Contraseña</strong>. </div>
            </div>
            <div class='col-12'>
                <button href='crearUsuario.php' class='btn btn-danger float-right' onclick='window.history.back();' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Vovler al registro </button>
            </div>
        </div>
    </div>";

        echo $cadena;
        include "includes/pie.php";
        exit(); // Termina la ejecución del script
    }

    if (!isset($_POST['terminos'])) { /* Si no se aceptan los términos se vuelve atrás al registro */

        $cadena = "<div class='container-fluid'>
        <div class='row'>
            <div class='col-12'>
                <h2>Error</h2>
            </div>
            <div class='col-12'>
                <div class='alert alert-danger' role='alert'><strong>No ha aceptado</strong> los términos y condiciones de registro. </div>
            </div>
            <div class='col-12'>
                <button href='crearUsuario.php' class='btn btn-danger float-right' onclick='window.history.back();' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Volver al registro </button>
            </div>
        </div>
    </div>";

        echo $cadena;
        include "includes/pie.php";
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
        $cadena = "<div class='container-fluid'>
        <div class='row'>
            <div class='col-12'>
                <h2>Error</h2>
            </div>
            <div class='col-12'>
                <div class='alert alert-danger' role='alert'>Este <strong>usuario ya existe. </strong></div>
            </div>
            <div class='col-12'>
                <button href='crearUsuario.php' class='btn btn-danger float-right' onclick='window.history.back();' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Volver al registro </button>
            </div>
        </div>
    </div>";

        echo $cadena;
    } else { /*El usuario no existe: Se inserta en la base de datos*/

        $insertarDatos = "INSERT INTO usuario VALUES('$user', ' $email' , '$pass', '$nombre','$apellido', '$ciudad', '$postal'  )";

        $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

        if (!$ejecutarInsertar) {
            $cadena = "<div class='container-fluid'>
            <div class='row'>
                <div class='col-12'>
                    <h2>Error</h2>
                </div>
                <div class='col-12'>
                    <div class='alert alert-danger' role='alert'><strong>Error En la linea sql</strong></div>
                </div>
                <div class='col-12'>
                    <button href='crearUsuario.php' class='btn btn-danger float-right' onclick='window.history.back();' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Volver al registro </button>
                </div>
            </div>
        </div>";

            echo $cadena;
        } else {
            $cadena = "<div class='container-fluid'>
            <div class='row'>
                <div class='col-12'>
                    <h2>Éxito</h2>
                </div>
                <div class='col-12'>
                    <div class='alert alert-success' role='alert'>Usuario <strong> registrado con éxito</strong></div>
                </div>
                <div class='col-12'>
                    <a href='iniciarsesion.php' class='btn btn-success float-right'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>  Iniciar sesión</a>
                </div>
            </div>
        </div>";

            echo $cadena;
        }
    }
} else {
        header("Location: perfil.php", true); 
        exit();
}


mysqli_close($conexion);
include "includes/pie.php";
