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
                          <div class='alert alert-danger' role='alert'><strong>Registrate</strong> o <strong>incia sesión</stron> para acceder a la tienda. </div>
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
function printProducto($producto, $numColumnas)
{
  echo ' <div class="col-sm-6 col-md-' . $numColumnas . '"> 
          <div class="card ">              
            <h5 class="card-header card-title">' . $producto['nombre_prod'] . '</h5> 
            <img src="img/tienda/' . $producto['imagen'] . '" class="card-img-top" alt="KH1">
            <div class="card-body">         
              <h6 class="card-subtitle mb-2 text-muted">' . $producto['categoria'] . '</h6>
              <p class="card-text">' . $producto['descripcion'] . '</p>
              <a href="producto.php?id_producto=' . $producto['id_producto'] . '" class="btn btn-primary float-right" title="Ver ' . $producto['nombre_prod'] . '" > <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Ver producto</a>
            </div>
          </div>
        </div> ';
}

?>

<section class="container-fluid">
  <div class="row ">
    <div class="col-12">
      <h2>¡Tu tienda online de Kingdom Hearts!</h2>
    </div>
</section>

<section class="container-fluid">
  <div class="row row-eq-height">
    <div class="col-12">
      <h3>Sección de videojuegos:</h3>
    </div>
    <?php
    $consulta = "SELECT * FROM productos  WHERE categoria = 'videojuegos'";
    $ejecutarConsulta = mysqli_query($conexion, $consulta);
    while ($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
      printProducto($producto, 4);
    }
    ?>

  </div>
  </div>
</section>

<section class="container-fluid">
  <div class="row row-eq-height">
    <div class="col-12">
      <h3>Sección de Ropa</h3>
    </div>
    <?php
    $consulta = "SELECT * FROM productos  WHERE categoria = 'ropa'";
    $ejecutarConsulta = mysqli_query($conexion, $consulta);
    while ($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
      printProducto($producto, 6);
    }
    ?>
  </div>
</section>




<section class="container-fluid">
  <div class="row row-eq-height">
    <div class="col-12">
      <h3>Sección de Accesorios y cosas:</h3>
    </div>
    <?php
    $consulta = "SELECT * FROM productos  WHERE categoria = 'accesorios'";
    $ejecutarConsulta = mysqli_query($conexion, $consulta);
    while ($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)) {
      printProducto($producto, 3);
    }
    ?>
  </div>
</section>



<?php
mysqli_close($conexion);
include "includes/pie.php";
?>