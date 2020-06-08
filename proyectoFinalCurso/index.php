<?php
include "includes/cabecera.php";
?>
<div id="hero-wrapper" class="container-fluid">
  <div class="carousel-wrapper">
    <div id="hero-carousel" class="carousel slide carousel-fade">
      <ol class="carousel-indicators">
        <li data-target="#hero-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#hero-carousel" data-slide-to="1"></li>
        <li data-target="#hero-carousel" data-slide-to="2"></li>
        <li data-target="#hero-carousel" data-slide-to="3"></li>
        <li data-target="#hero-carousel" data-slide-to="4"></li>

      </ol>
      <h2>Imagenes Sobre El Juego</h2>
      <div class="carousel-inner">

        <div class="item active">
          <img src="img/algunospersonajes.jpg">
        </div>

        <div class="item">
          <img src="img/bichos.webp">
        </div>

        <div class="item">
          <img src="img/malos.jpg">

        </div>

        <div class="item">
          <img src="img/otrospersonajes.webp">

        </div>

        <div class="item">
          <img src="img/juegos.jpg">
        </div>


      </div>
      <a class="left carousel-control" href="#hero-carousel" data-slide="prev">
        <i class="fa fa-chevron-left left"></i>
      </a>
      <a class="right carousel-control" href="#hero-carousel" data-slide="next">
        <i class="fa fa-chevron-right right"></i>
      </a>
    </div>
  </div>
</div>

<div class="texto-bienvenida  ">

  <p>
    ¡Bienvenido a nuestra página web Kingdom Hearth Info-Store! No se arrepentira de haber
    entrado , puede informarse, puede comprar y puede hacer muchas cosas mas.
  </p>

</div>

<?php
include "includes/pie.php";
?>