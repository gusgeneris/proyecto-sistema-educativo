$(document).ready(function() { //cuando se cargo completamente el documento
    $('.menu li:has(ul)').click(function(e) { //acceder a los elementos li que tengan un ul dentro

        if ($(this).hasClass('activado')) { //si el elemento tiene la clase activado se realiza la accion
            $(this).removeClass('activado'); //se remueve la clase
            $(this).children('ul').slideUp(); //se ocultan los hijos de ese elemento
        } else {
            $('.menu li ul').slideUp(); //se ocultan todos los sub menus "slideup()"
            $('.menu li').removeClass('activado'); //se remueve la clase a todos los elementos
            $(this).addClass('activado'); //se le agrega la cclase solo a el elemento clikeado
            $(this).children('ul').slideDown(); //a los hijos del elemento clikeado se los muestra
        }
    });

    $('.btnMenu').click(function() {



        if ($(this).hasClass('menuActivado')) {
            $(this).removeClass('menuActivado');
            $('.contenedorMenuVertical').css({ 'display': 'none' });
        } else {

            $(this).addClass('menuActivado');
            $('.contenedorMenuVertical').css({ 'display': 'inline-block' });
        }
        //$('.contenedorMenuVertical .menu').slideToggle(); //cerrar o abrir el menu cuando este en dispositivos moviles
    });

    $(window).resize(function() { //si el tamaño de la ventana cambia
        if ($(document).whidth > 450) { //cuando cambia preguntar si es mayor a 450px
            $('.contenedorMenuVertical .menu').css({ 'display': 'block' });
        }
        if ($(document).whidth < 450) { //cuando cambia preguntar si es menor a 450px
            $('.contenedorMenuVertical .menu').css({ 'display': 'none' })
            $('.menu li ul').slideUp();
            $('.menu li ').removeClass('activado');
        }
    })
})

$(document).on("click", function(e) {

    var container = $(".contenedorMenuVertical");
    var btnConteiner = $(".btnMenu");
    if (!btnConteiner.is(e.target) && btnConteiner.has(e.target).length === 0) {
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.contenedorMenuVertical').css({ 'display': 'none' });
            $(btnConteiner).removeClass('menuActivado');

            //Se ha pulsado en cualquier lado fuera de los elementos contenidos en la variable container

        }
    }
});

$(document).ready(function() {

    var height = $(window).height();

    $('#contenedorMenuVertical').height(height);
});