$(document).ready(function () {
    $(".product-form").submit(function (e) {
        var form_data = $(this).serialize(); //Se hace un string con los campos del formulario tipo id_producto=2&cantidad=1
        var button_content = $(this).find('button[type=submit]');
        button_content.html('<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Añadiendo...'); //El texto del botón añadir pasa a Añadiendo durante la petición
        $.ajax({  //Peticion Ajax
            url: "gestion_carro.php",//Els cript gestion_carro.php
            type: "POST", //tipo de petición POST
            dataType: "json",
            data: form_data //Se pasa por parámetro el id_producto del producto a añadir al carrito y la cantidad
        }).done(function (data) {
            if ($('#cart-container').length == 0) { // Si se añade el primer carrito, se añade el enlace al carrito
                $('.navbar-nav').append('<li class="nav-item" id="cart-container"><a class="nav-link" href="compra.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Carrito <span class="badge-pill badge-info">1</span></a> </li>');
            } 
            else {  //Se actualiza el númro de productos en el enlace del menú al carrito
                $("#cart-container").text(data.carrito);
            }

            setTimeout(function () { button_content.html('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir al carro') }, 700); //Tras la petición, el texto del botón vuelve a ser "Añadir al carro" tras un retraso de 7 segundos
        })
        e.preventDefault();
    });

    $(".limpiar-carrito").submit(function (e) {
        if (confirm('¿Estás seguro de querer limpiar el carrito?')) { // Solicita confirmación para limpiar el carrito
            var button_content = $(this).find('button[type=submit]');
            button_content.html('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Limpiando...');

            $.ajax({
                url: 'gestion_carro.php',
                type: "POST",
                dataType: "json",
                data: {
                    reset: 'reset'
                }
            }).done(function () {
                window.location.replace("compra.php"); //Cuando termina de limpiar el carrito recarga la página compra.php
            });
        }
        else {
            e.preventDefault(); // Si no se confirma evita recargar la página
        }



    });

});