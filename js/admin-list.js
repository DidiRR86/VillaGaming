$(document).ready(function() {
    $('#lista-admin #opciones-admin .normal').on('mouseenter', function(e) {
        $(e.currentTarget).addClass('active');
    });
    $('#lista-admin #opciones-admin .normal').on('mouseleave', function(e) {
        $(e.currentTarget).removeClass('active');
    });

    $('#lista-admin #articulos-admin td.campoArticulo').on('mouseenter', function(e) {
        $(e.currentTarget).addClass('active');
    });
    $('#lista-admin #articulos-admin td.campoArticulo').on('mouseleave', function(e) {
        $(e.currentTarget).removeClass('active');
    });

    $('#agregar-admin #producto-admin td.campoArticulo').on('mouseenter', function(e) {
        $(e.currentTarget).addClass('active');
    });
    $('#agregar-admin #producto-admin td.campoArticulo').on('mouseleave', function(e) {
        $(e.currentTarget).removeClass('active');
    });

    $('#agregar-admin #producto-admin td.campoArticulo input').on('focusin', function(e) {
        $(e.currentTarget).parent().addClass('intensity');
    });
    $('#agregar-admin #producto-admin td.campoArticulo textarea').on('focusin', function(e) {
        $(e.currentTarget).parent().addClass('intensity');
    });
    $('#agregar-admin #producto-admin td.campoArticulo select').on('focusin', function(e) {
        $(e.currentTarget).parent().addClass('intensity');
    });
    $('#agregar-admin #producto-admin td.campoArticulo input').on('focusout', function(e) {
        $(e.currentTarget).parent().removeClass('intensity');
    });
    $('#agregar-admin #producto-admin td.campoArticulo textarea').on('focusout', function(e) {
        $(e.currentTarget).parent().removeClass('intensity');
    });
    $('#agregar-admin #producto-admin td.campoArticulo select').on('focusout', function(e) {
        $(e.currentTarget).parent().removeClass('intensity');
    });

    $('#agregar-admin #agregar-options .inverse').on('mouseenter', function(e) {
        $(e.currentTarget).css('border', '2px solid #000000');
    });
    $('#agregar-admin #agregar-options .inverse').on('mouseleave', function(e) {
        $(e.currentTarget).css('border', '2px solid #ffffff');
    });
});