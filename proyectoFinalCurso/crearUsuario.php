<?php
include "includes/cabecera.php";
?>
<div class="container-fluid">

<div class="row">
  <div class="col-12">
    <h2>Crear usuario nuevo</h2>
  </div>
</div>

  <form action="registro.php" method="post" class="container-fluid">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="usuario">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
      </div>
      <div class="form-group col-md-6">
        <label for="contrasena">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="email">Correo electronico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 ">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Julian">
      </div>
      <div class="form-group col-md-6">
        <label for="apellido">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Pérez">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad">
      </div>

      <div class="form-group col-md-7">
        <label for="postal">Código Postal</label>
        <input type="text" class="form-control" id="postal" name="postal" placeholder="54780">
      </div>
    </div>
    <div class="form-row">
      <div class="col-sm-12">
        <div class="form-check">
          <input id="checkbox" class=" form-check-input " type="checkbox" name="terminos"> <label class=" form-check-label ml-4" for="checkbox"> Aceptar terminos y condiciones de registro</label>
        </div>
      </div>
    </div>

    <div class="form-row my-4">
      <button type="submit" class="btn btn-primary" id="crear" name="crear" value="crear">Crear Cuenta</button>
    </div>
  </form>

</div>
<?php
include "includes/pie.php";
?>