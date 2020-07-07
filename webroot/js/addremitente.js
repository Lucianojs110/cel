$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.addremitente').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Remitente/addrem",
            dataType: "html",
            data: {
              
                remitente: $("#remitente2").val(),
                rfc: $("#rfc").val(),
                origen: $("#origen2").val(),
                domicilio: $("#domicilio").val(),
                recogida: $("#recogida").val(), 
        
                        
            },
            success: function(data) {
                $('#msg1').html('<div class="alert alert-success flash-msg">Registro Guardado </div>');
                $('.flash-msg').delay(4000).fadeOut('slow');

            },
            error: function(){
                alert('tenemos problemas');
            }
        });
        return false;
    });
    });

function getBaseUrl() {
    var pathArray = location.href.split('/');
    var protocol = pathArray[0];
    var host = pathArray[2];
    var url = protocol + '//' + host + '/';
    
    return url;
    }

    function configureload(screen) {
        $(document)
        .ajaxStart(function(){
                screen.fadeIn();
            })
            .ajaxStart(function(){
               screen.fadeOut();
           })
       }