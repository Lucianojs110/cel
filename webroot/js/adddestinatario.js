$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    
    
    $('.adddestinatario').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Destinatario/adddes",
            dataType: "html",
            data: {
              
                destinatario: $("#destinatario2").val(),
                rfc: $("#rfcdes2").val(),
                destino: $("#destino2").val(),
                domicilio: $("#domiciliodes").val(),
                entrega: $("#entrega2").val(), 
        
                        
            },
            success: function(data) {
                $('#msg2').html('<div class="alert alert-success flash-msg">Registro Guardado </div>');
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