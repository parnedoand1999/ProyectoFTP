<?php
include "functions/connectDB.php";


if (isset($_POST['iniciar'])) {
  $user = $_POST['user'];
  $pass = $_POST['contra'];



  $consulta = "SELECT * FROM usuario where usuario = '" . $user . "' and contraseña = '" . $pass . "'";

  $ejecutarConsulta = mysqli_query($conexion, $consulta);
  $verFilas = mysqli_num_rows($ejecutarConsulta);
  $fila = mysqli_fetch_array($ejecutarConsulta);


  if ($verFilas == 1) { // El usuario existe
    if ($fila['contraseña'] === $pass) { //La contraseña coincide con el usuario

      session_start();
      $_SESSION['usuario_loged'] = $fila['usuario']; /* Se guarda la sesión como variable de entorno */

      if (headers_sent()) {
        die("Error: headers already sent!");
      } else {
        header("Location: perfil.php", true); //Si el nicio es correcto, se redirige al perfil del usuario
        exit();
      }
    }
  }
}

include "includes/cabecera.php";
echo "<div class='alert alert-danger'>Acceso incorrecto</div>";
echo "<button onclick='window.history.back();' class='btn btn-danger'>Volver</button>";
include "includes/pie.php";
mysqli_close($conexion);
exit();
