<?php
include "functions/connectDB.php";

session_start();

if (isset($_POST['reset']) && $_POST['reset'] == 'reset') {

    unset($_SESSION['carrito']);

} 
else if (isset($_POST["id_producto"]) && isset($_SESSION['usuario_loged'])) {
    foreach ($_POST as $key => $value) {
        $product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    $consulta = "SELECT * FROM productos WHERE id_producto=" . $_POST['id_producto'] . " LIMIT 1";
    $ejecutarConsulta = mysqli_query($conexion, $consulta);

    while ($producto =  mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
        if (isset($_SESSION['carrito'])) { // Se pregunta si existe el carrito en la sesión
            if (isset($_SESSION['carrito'][$producto['id_producto']])) { // Si ya existe el producto en el carrito, se suma
                $_SESSION["carrito"][$producto['id_producto']]["cantidad"] = $_SESSION["carrito"][$producto['id_producto']]["cantidad"] + $_POST["cantidad"];
            } else {
                $_SESSION['carrito'][$producto['id_producto']] = $producto;
                $_SESSION["carrito"][$producto['id_producto']]["cantidad"] = $_POST['cantidad'];
            }
        } else {
            $_SESSION['carrito'][$producto['id_producto']] = $producto;
            $_SESSION["carrito"][$producto['id_producto']]["cantidad"] = $_POST['cantidad'];
        }
    }


    $total_productos = count($_SESSION['carrito']);
    die(json_encode(array('carrito' => $total_productos)));

    mysqli_close($conexion);
}
