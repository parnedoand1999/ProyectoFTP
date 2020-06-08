<?php



if (!isset($_GET['id_producto']) || !is_numeric($_GET['id_producto'])) /*Se pregunta si hay parámetro Get con el id del Producto */ {
    header("Location:404.php");
    exit();
}
/*Se pone los includes debajo del if porque sino da error la sesión */
include "includes/cabecera.php";
include "functions/connectDB.php";




/* Consulta para sacar los datos dle producto*/
$consulta = "SELECT * FROM productos  WHERE id_producto = '" . $_GET['id_producto'] . "'";
$ejecutarConsulta = mysqli_query($conexion, $consulta);
$producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC);



$nombre = $producto['nombre_prod'];
$precio = $producto['precio'];
$imagen = $producto['imagen'];
$descripcion = $producto['descripcion'];
$id = $producto['id_producto'];
$categoria = $producto['categoria'];

mysqli_close($conexion);
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <a href='tienda.php' class='btn btn-primary'><span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> Volver a la tienda</a>
        </div>

        <div class="item-container col-12">

            <div class="col-md-4 text-center">
                <img id="item-display" src="img/tienda/<?php echo $imagen; ?>" alt="" class="img-fluid my-4" data-toggle="modal" data-target=".bd-example-modal-md"></img>
            </div>

            <div class="col-md-8">
                <h2><?php echo $nombre; ?></h2>
                <div class="product-cat card-subtitle">Categoría: <?php echo $categoria; ?></div>
                <div class="product-desc"><?php echo $descripcion; ?></div>
                <hr />
                <div class="product-price">Precio <?php echo $precio; ?> €/ud.</div>
                <hr />

                <form class="product-form">
                    <select name="cantidad" class="browser-default custom-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

                    <input name="id_producto" type="hidden" value="<?php echo $id; ?>" />
                    <button type="submit" class="btn btn-success my-4 ">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir al carro
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-md">

        <!--Content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <img src="img/tienda/<?php echo $imagen; ?>" alt="" class="img-fluid m-0 p-0" />

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>

<?php
include "includes/pie.php";
?>