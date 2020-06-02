<?php
session_Start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Kingdom Hearth Info-Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!--Scripts para que funcione el bootstrap-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <!--Para que las imagenes se vean asi y hagan ese efecto-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/styles.css">



    <!--Favicon-->

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--Java Script -->
    <script src="js/javascript.js"></script>

</head>


<body>

    <header>
        <div class="jumbotron text-center bg-secondary" style="margin-bottom:0">

            <div>
                <a href="index.php" tabindex="2"> <img id="logo" src="img/logo.jpg" alt="Pagina Principal" /> </a>
            </div>
            <p>¡No esperes más tiempo! Visite nuestra pagina web sobre la mejor saga de videojuegos de la historia!
            </p>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="#">Menú</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="info.php">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.php">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Foro</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                        if(isset($_SESSION['usuario_loged'])) /*Si la sesión está iniciad: accede al peril si no, al formulario de inicio */
                        {
                            $ruta = "<a class='nav-link' href='perfil.php' ><strong> ". $_SESSION['usuario_loged'] ."</strong></a>";
                        }
                        else
                        {
                            $ruta =  "<a class='nav-link' href='iniciarsesion.php'>Iniciar Sesión</a>";
                        }

                        echo $ruta;
                        
                        ?>
                       
                        
                    </li>

                    <?php 
                        if(isset($_SESSION['usuario_loged'])) /*Si la sesión está iniciada acceso al cierre de sesión */
                        {
                            echo ' <li class="nav-item">';
                            echo "<a class='nav-link' href='logout.php'>Salir</a>";
                            echo '</li>';                           
                        }
                        
                        ?>
                </ul>
            </div>
        </nav>
