 <footer class="page-footer orange darken-2">
    <div class="container">
      <div class="row">
          Contenido Footer
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2018 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">VillaGaming S.L</a>
      </div>
    </div>
</footer>
<script src="js/jquery-331.js" type="text/javascript"></script>
<script type="text/javascript" src="materialize/js/bin/materialize.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#busqueda').focus();
        $('#busqueda').on('keyup',function(){
            var se = $('#busqueda').val();
            console.log(se);
            if(se.length != 0){
                $.ajax({
                type:'POST',
                url:'search.php',
                data:{'search':se}
                }).done(function(resultado){
                    $('#result').html(resultado);
                }).fail(function(){
                    alert("Hubo un error");
                })
            }else{
                $('#result').html("");
            }
            
            
        });
        $('.dropdown-trigger').dropdown();
    });
</script>

