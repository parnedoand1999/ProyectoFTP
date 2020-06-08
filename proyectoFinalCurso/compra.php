<?php
include "includes/cabecera.php";



if (!isset($_SESSION['usuario_loged'])) { //Si el usuario no está logueado, se le pide que se registro
    $cadena = "<div class='container-fluid'>
                    <div class='row'>
                        <div class='col-12'>
                            <h2>Acceso restringido</h2>
                        </div>
                        <div class='col-12'>
                            <div class='alert alert-danger' role='alert'><strong>Registrate</strong> o <strong>incia sesión</stron> para acceder a la tienda. </div>
                        </div>
                        <div class='col-12'>
                            <a href='crearUsuario.php' class='btn btn-primary float-right   mx-2' ><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Acceder al registro </a>
                            <a href='iniciarsesion.php' class='btn btn-default float-right mx-2' ><span class='glyphicon glyphicon-off' aria-hidden='true'></span>  Iniciar sesión </a>
                        </div>
                    </div>
                </div>";

    echo $cadena;
    include "includes/pie.php";
    exit(); // Termina la ejecución del script

} else if (!isset($_SESSION['carrito'])) { //Si no hay productos en el carrito

    $cadena = "<div class='container-fluid'>
    <div class='row'>
        <div class='col-12'>
            <h2>Carrito vacío</h2>
        </div>
        <div class='col-12'>
            <div class='alert alert-warning' role='alert'>Actualmente <strong>no existen productos</strong> en el carrito. </div>
        </div>
        <div class='col-12'>
            <a href='tienda.php' class='btn btn-primary float-right' ><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>  Acceder a la tienda </a>
        </div>
    </div>
</div>";

    echo $cadena;
    include "includes/pie.php";
    exit();
} else {


?>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">
                <h2>Mi carrito (<span id="cart-items-count">
                        <?PHP if (isset($_SESSION["carrito"])) {
                            echo count($_SESSION["carrito"]);
                        } ?> productos) </h2>

            </div>

            <div class="table-responsive col-12">
                <table summary="Resultado de la compra realizada a través de la tienda" class="table table-hover table-striped">
                    <caption>Factura de la compra en la tienda Kingdom Hearts. Los precios son IVA incluído</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" id="Numero_producto">#</th>
                            <th scope="col" id="Imagen">Imagen</th>
                            <th scope="col" id="Nombre_producto">Nombre producto</th>
                            <th scope="col" id="Descripción">Descripción producto</th>
                            <th scope="col" id="Precio_unidad">Precio unidad</th>
                            <th scope="col" id="Cantidad">Cantidad</th>
                            <th scope="col" id="Precio">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num_producto = 1;
                        $total = 0;
                        foreach ($_SESSION['carrito'] as $producto) {
                            echo "<tr scope='row'>";

                            echo "<td headers='Numero_producto'>" . $num_producto . "</td>";

                            echo "<td headers='Imagen'><img src='img/tienda/" . $producto['imagen'] . "' alt=''/></td>";

                            echo "<td headers='Nombre_producto'><a href='producto.php?id_producto=" . $producto['id_producto'] . "' >" . $producto['nombre_prod'] . "</a></td>";

                            echo "<td headers='Descripcion'>" . $producto['descripcion'] . "</td>";

                            echo "<td headers='Precio_unidad'>" . $producto['precio'] . " €/ud.</td>";

                            echo "<td headers='Cantidad'>" . $producto['cantidad'] . "</td>";

                            $precio = $producto['precio'] * $producto['cantidad'];
                            $total += $precio;

                            echo "<td headers='Precio'>" . $precio . " € </td>";


                            echo "</tr>";


                            $num_producto++;
                            
                        }

                        
                        $_SESSION['total'] = $total; //Se gurda el total de la comrpa en una varable de sesión


                        ?>
                    </tbody>
                    <tfoot>
                        <thead scope="row" class="table-info">
                            <td colspan="6" class="text-right">Total</td>
                            <td class="text-left"><?php echo $total; ?> €</td>
                        </thead>
                    </tfoot>
                </table>
            </div>

            <div class="col-12">
                <form class="limpiar-carrito">
                    <button type="submit" class="btn btn-danger float-right mx-3">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Limpiar carrito
                    </button>
                </form>

                <form action="confirm_compra.php" method="POST" class="mx-3"  onsubmit=" return  confirm('¿Confirmar compra?');">
                    <input type="hidden" name="confirmacion" value="true"/>
                    <button type="submit" class="btn btn-success float-right">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true" ></span> Confirmar compra
                    </button>
                </form>

            </div>

        </div>
    </div>

<?php

    include "includes/pie.php";
}

?>