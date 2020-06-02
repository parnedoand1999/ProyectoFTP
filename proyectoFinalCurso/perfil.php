<?php
include('includes/cabecera.php');
include('functions/connectDB.php');

$consulta = "SELECT * FROM usuario where usuario = '" . $_SESSION['usuario_loged'] . "'"; // Busca la información del  usuario con la sesión iniciada

$ejecutarConsulta = mysqli_query($conexion, $consulta);
$verFilas = mysqli_num_rows($ejecutarConsulta);
$fila = mysqli_fetch_array($ejecutarConsulta);

?>

<main class="contaner-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offse-md-2">
                <h2>Hola <strong><?php echo $fila['nombre']; ?> </strong></h2>

                <h1>Tus datos:</h4>
                    <div><strong>Usuario: </strong><?php echo $fila['usuario']; ?></div>
                    <div><strong>Nombre</strong><?php echo $fila['nombre']; ?></div>
                    <div><strong>Apellido</strong><?php echo $fila['apellido']; ?></div>
                    <div><strong>Correo electrónico</strong><a href='mailto:<?php echo $fila['correo']; ?>'><?php echo $fila['correo']; ?></a></div>
                    <div><strong>Código postal </strong><?php echo $fila['codigo_postal']; ?></div>

            </div>
        </div>
    </div>

</main>



<?php
include('includes/pie.php');
?>