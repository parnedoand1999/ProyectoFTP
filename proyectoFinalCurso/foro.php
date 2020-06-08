<?php
include "includes/cabecera.php";
include "functions/connectDB.php";


if (!isset($_SESSION['usuario_loged'])) { //Si el usuario no está logueado, se le pide que se registro
    $cadena = "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Acceso restringido</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-danger' role='alert'><strong>Registrate</strong> o <strong>incia sesión</stron> para acceder al foro. </div>
                        </div>
                        <div class='col-12'>
                            <a href='crearUsuario.php' class='btn btn-primary float-right mx-2' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Acceder al registro </a>
                            <a href='iniciarsesion.php' class='btn btn-default float-right mx-2' ><span class='glyphicon glyphicon-off' aria-hidden='true'></span>  Iniciar sesión </a>
                        </div>
                    </div>
                </div>";

    echo $cadena;
    include "includes/pie.php";
    exit(); // Termina la ejecución del script

}

function printMensaje($mensaje)
{
    $cadena = '<div class="col-6"><div class="card mb-5">
    <div class="card-body">
    <h5 class="card-title">' . $mensaje['titulo'] . '</h5>
    <p class="card-text">' . $mensaje['cuerpo_mensaje'] . '</p>
    <p class="card-text"><small class="text-muted">' . $mensaje['fecha'] . ' - ' . $mensaje['usuario'] . '</small></p>
    </div>
</div></div>';

    echo $cadena;
}



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Foro Kingdom Hearts</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php

            $consulta = "SELECT f.id_mensaje, f.fecha, f.cuerpo_mensaje, f.titulo, u.nombre, f.usuario 
            FROM foro f INNER JOIN usuario u on f.usuario = u.usuario 
            ORDER BY f.fecha DESC";
            $ejecutarConsulta = mysqli_query($conexion, $consulta);

            if (empty($ejecutarConsulta->num_rows)) {
                $cadena = " <div class='alert alert-warning' role='alert'>
                                El foro aún no tiene registros
                            </div>";

                echo $cadena;
            } else {
                while ($mensaje = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
                    printMensaje($mensaje);
                }
            }


            ?>
        </div>
    </div>

    <div class='row'>
        <form class="container-fluid col-6 border py-4 px-3" action="gestion_foro.php" method="POST">
            <label for="titulo" class="ol-form-label">Título</label>
            <div class="col-12 mt-0">
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
            </div>

            <label for="cuerpo" class="col-form-label">Cuerpo del mensaje</label>
            <div class="col-12 mt-0">
                <textarea type="text" class="form-control" id="cuerpo" name="cuerpo" placeholder="Cuerpo del mensaje"></textarea>
            </div>

            <input type="hidden" name="usuario" value="<?php echo  $_SESSION['usuario_loged'];  ?>" />

            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary" id="enviar" name="enviar">Enviar mensaje</button>
            </div>
        </form>
    </div>

</div>


<?php
mysqli_close($conexion);
include "includes/pie.php";
?>