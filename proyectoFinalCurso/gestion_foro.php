<?php
include "includes/cabecera.php";
include "functions/connectDB.php";
include "functions/helper.php";


if (isset($_POST['enviar'])) {


    $fecha = date('Y-m-d H:i:s');
    $titulo = $_POST['titulo'];
    $cuerpo_mensaje = $_POST['cuerpo'];
    $usuario = $_POST['usuario'];
    $insertarDatos = "INSERT INTO foro ( titulo, cuerpo_mensaje, fecha, usuario) VALUES( '$titulo' , ' $cuerpo_mensaje' , '$fecha', '$usuario'  )";
    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);


    $cadena = " <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Mensaje enviado</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-success' role='alert'>Foro envíado con éxito.</strong></div>
                            <p>Podrá dejar otros mensajes si lo desea.</p>
                        </div>
                        <div class='col-12'>
                            <a href='foro.php' class='btn btn-default float-right' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Acceder al foro </a>
                        </div>
                    </div>
                </div>";

    echo $cadena;
}


mysqli_close($conexion);
include "includes/pie.php";
