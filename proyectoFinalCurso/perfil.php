<?php
include('includes/cabecera.php');
include('functions/connectDB.php');

function printMensaje($mensaje)
{
    $cadena = ' <div class="col-6"><div class="card mb-5">
                    <div class="card-body">
                    <h5 class="card-title">' . $mensaje['titulo'] . '</h5>
                    <p class="card-text">' . $mensaje['cuerpo_mensaje'] . '</p>
                    <p class="card-text"><small class="text-muted">' . $mensaje['fecha'] . ' - ' . $mensaje['usuario'] . '</small></p>
                    </div>
                </div></div>';

    echo $cadena;
}


$consulta = "SELECT * FROM usuario where usuario = '" . $_SESSION['usuario_loged'] . "'"; // Busca la información del  usuario con la sesión iniciada

$ejecutarConsulta = mysqli_query($conexion, $consulta);
$verFilas = mysqli_num_rows($ejecutarConsulta);
$fila = mysqli_fetch_array($ejecutarConsulta);


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 ">
            <h2>Hola <strong><?php echo $fila['nombre'] . " " . $fila['apellido']; ?> </strong></h2>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Tus datos</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tus compras</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tus interacciones en el foro</a>
                    </div>
                </div>
                <div class="col-9">

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show in active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <!-- Tus datos pane -->
                            <h2>Tus datos:</h2>
                            <div><strong>Usuario: </strong><?php echo $fila['usuario']; ?></div>
                            <div><strong>Nombre: </strong><?php echo $fila['nombre']; ?></div>
                            <div><strong>Apellido: </strong><?php echo $fila['apellido']; ?></div>
                            <div><strong>Correo electrónico: </strong><a href='mailto:<?php echo $fila['correo']; ?>'><?php echo $fila['correo']; ?></a></div>
                            <div><strong>Dirección: </strong><?php echo $fila['codigo_postal'] . ", " . $fila['ciudad']; ?></div>
                        </div>


                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <!-- tus compras pane-->
                            <h2>Tus compras:</h2>

                            <?php
                            $consulta = "SELECT c.id_producto, c.id_fecha, c.cantidad, p.imagen, p.nombre_prod, p.precio 
                                         FROM compras c INNER JOIN productos p on c.id_producto = p.id_producto 
                                         WHERE c.usuario = '" . $_SESSION['usuario_loged'] . "'  
                                         ORDER BY c.id_Fecha DESC";
                            $ejecutarConsulta = mysqli_query($conexion, $consulta);

                            if (empty($ejecutarConsulta->num_rows)) { //Si no se han realizado compras aún, se muestra un me mensaje
                                $cadena = "
                                        <div class='alert alert-warning col-12' role='alert'>
                                        Todavía no has realizado ninguna compra.
                                        </div>
                                    
                                    <div class='col-12 my-4'>
                                        <a href='tienda.php' class='btn btn-default float-right' >
                                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>  Acceder a la tienda 
                                        </a>
                                    </div>";

                                echo $cadena;
                            } else { //Si se han realizado compras se meustra en una tabla
                            ?>

                                <div class="table-responsive">

                                    <table summary="Las compras que has realizado" class="table table-hover table-striped">
                                        <caption>Relación de compras realizadas</caption>
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col" id="Fecha">Fecha</th>
                                                <th scope="col" id="Imagen">Imagen</th>
                                                <th scope="col" id="Nombre_producto">Nombre producto</th>
                                                <th scope="col" id="Cantidad_producto">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
                                                echo "<tr scope='row'>";

                                                echo "<td headers='Fecha'>" . $producto['id_fecha'] . "</td>";

                                                echo "<td headers='Imagen' class='text-center'><img src='img/tienda/" . $producto['imagen'] . "' alt=''/></td>";

                                                echo "<td headers='Nombre_producto'><a href='producto.php?id_producto=" . $producto['id_producto'] . "' >" . $producto['nombre_prod'] . "</a></td>";

                                                echo "<td headers='Cantidad_producto'>" . $producto['cantidad'] . "</td>";

                                                echo "</tr>";
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            <?php
                            } // Fin else if 
                            ?>




                        </div>


                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <!-- mensajes foro -->

                            <?php

                            $consulta = "SELECT f.id_mensaje, f.fecha, f.cuerpo_mensaje, f.titulo, u.nombre, f.usuario 
                                        FROM foro f INNER JOIN usuario u on f.usuario = u.usuario 
                                        WHERE u.usuario = '". $_SESSION['usuario_loged']."'
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
                </div>
            </div>


        </div>
    </div>
</div>


<?php
mysqli_close($conexion);
include('includes/pie.php');
?>