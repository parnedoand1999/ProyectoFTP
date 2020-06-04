<?php
include "includes/cabecera.php";
include "functions/connectDB.php";
function printProducto($producto, $numColumnas){
echo '   <div class="card col-md-'.$numColumnas.'">      
  <img src="img/tienda/'.$producto['imagen'].'" class="card-img-top" alt="KH1">
  <div class="card-body">
    <h5 class="card-title">'.$producto['nombre_prod'].'</h5>
    <p class="card-text">'.$producto['descripcion'].'</p>
    <p class="card-text">'.$producto['precio'].'€</p>
    <i class="card-text">'.$producto['categoria'].'</i>
    <a href="#" class="btn btn-primary" id="comprar" name="comprar">Comprar</a>
  </div>
  </div> ';
}

?>
<main class="container-fluid">

<section class="container">

   <div class="row">
    <div class="col-12">
       <h2>¡Tu tienda online de Kingdom Hearth!</h2>
    </div>
 </section>

   <section class="container" >
    <div class="col-12"  >
       <h3>Sección de videojuegos:</h3>
    </div>
      <?php 
            $consulta = "SELECT * FROM productos  WHERE categoria = 'videojuegos'";
            $ejecutarConsulta = mysqli_query($conexion, $consulta);
            while($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)){
              printProducto($producto , 3);
            }
       ?>
 
  </div>
   </section>

<section class="container">
 <div class="row">
        <div class="col-12">
          <h3>Sección de Ropa</h3>
        </div>
        <?php 
            $consulta = "SELECT * FROM productos  WHERE categoria = 'ropa'";
            $ejecutarConsulta = mysqli_query($conexion, $consulta);
            while($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)){
              printProducto($producto , 5);
            }
        ?>
 </div>     
</section>




<section class="container">
 <div class="row">
        <div class="col-12">
         <h3>Sección de Accesorios y cosas:</h3>
        </div>
        <?php 
            $consulta = "SELECT * FROM productos  WHERE categoria = 'accesorios'";
            $ejecutarConsulta = mysqli_query($conexion, $consulta);
            while($producto = mysqli_fetch_array($ejecutarConsulta, MYSQLI_ASSOC)){
              printProducto($producto , 2);
            }
        ?>
 </div>     
</section> 

 
</main>

<?php
include "includes/pie.php";
?>
