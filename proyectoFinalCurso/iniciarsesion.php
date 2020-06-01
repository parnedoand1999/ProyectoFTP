<?php 
include "includes/cabecera.php";

?>

<main>

 <form action="login.php" method="POST">

  <div class="form-group row text-center">
    <label for="user" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
    </div>
  </div>

  <div class="form-group row text-center">
    <label for="contra" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="contra"  name="contra" placeholder="Contraseña">
    </div>
  </div>
  <div class="form-group row ">
   
    <div class="col-sm-10 col-sm-offset-2" >
      <div class="form-check">
 
        <input id="checkbox" class=" form-check-input " type="checkbox"> <label class=" form-check-label ml-4" for="checkbox" > Recordar contraseña</label>

      </div>
    </div>
  </div>
  <div class="form-group row text-center">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary" id="iniciar" name="iniciar" >Iniciar Sesion</button>
    </div>
    <div class="col-sm-5">
      <a  href="crearUsuario.php" class="btn btn-primary" onclick="registro()">Crear cuenta</a>
    </div>
  </div>
</form>

</main>

<?php 
include "includes/pie.php";
?>