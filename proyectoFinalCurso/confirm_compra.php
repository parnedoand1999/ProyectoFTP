<?php
include "functions/connectDB.php";
include "functions/helper.php";


include "includes/cabecera.php";


if(!isset($_SESSION['usuario_loged'])){
    $cadena = "<div class='container-fluid'>
    <div class='row'>
        <div class='col-12'>
            <h2>Error</h2>
        </div>
        <div class='col-12'>
            <div class='alert alert-danger' role='alert'><strong>No estás logueado.</strong></div>
        </div>
        <div class='col-12'>
            <a href='iniciarsesion.php' class='btn btn-default float-right' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Iniciar sesión </a>
        </div>
    </div>
</div>";

echo $cadena;
include "includes/pie.php";
exit(); // Termina la ejecución del script

}
else if(!isset($_SESSION['carrito'])){
    $cadena = "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Error</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-danger' role='alert'><strong>No ha realizado compra.</strong></div>
                        </div>
                        <div class='col-12'>
                            <a href='tienda.php' class='btn btn-default float-right' ><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Acceder a la tienda </a>
                        </div>
                    </div>
                </div>";

    echo $cadena;
    include "includes/pie.php";
    exit(); // Termina la ejecución del script
}

if (!isset($_POST['confirmacion']) || $_POST['confirmacion'] === 'false') { //Si no se ha confirmado la compra
    $cadena = "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Error</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-danger' role='alert'><strong>No ha confirmado la compra.</strong></div>
                        </div>
                        <div class='col-12'>
                            <a href='compra.php' class='btn btn-default float-right' ><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>  Volver al carrito </a>
                        </div>
                    </div>
                </div>";
    echo $cadena;
    include "includes/pie.php";
    exit(); // Termina la ejecución del script

} else {

    $fecha = date('Y-m-d H:i:s');

    foreach($_SESSION['carrito'] as $producto)
    {
       
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];
        $usuario = $_SESSION['usuario_loged'];
        $insertarDatos = "INSERT INTO compras VALUES( '$fecha' , ' $id_producto' , '$cantidad', '$usuario'  )";
        $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);
    }

    
    unset($_SESSION['carrito']);

    $cadena = "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Compra finalizada con éxito</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-success' role='alert'>La compra ha sido <strong>realizada con éxito.</strong></div>
                            <p>Recibirá la compra próximamente a la dirección guardada en su perfil.</p>
                        </div>
                        <div class='col-12'>
                            <a href='perfil.php' class='btn btn-default float-right' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Acceder a tus compras </a>
                        </div>
                    </div>
                </div>";

    echo $cadena;

    echo "<script>$('#cart-container').closest('.nav-item').remove();</script>"; //Elimina el link del carrito



}
mysqli_close($conexion);
include "includes/pie.php";


?>