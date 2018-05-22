$(document).ready(function() {
    $('#lista-admin #articulos-admin td.campoArticulo').on('mouseenter', function(e) {
        $(e.currentTarget).addClass('active');
    });

    $('#lista-admin #articulos-admin td.campoArticulo').on('mouseleave', function(e) {
        $(e.currentTarget).removeClass('active');
    });
});