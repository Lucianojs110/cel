$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.addremolque').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Remolque/addrem",
            dataType: "html",
            data: {
              
                remolque: $("#remolque2").val(),
                placaremolque: $("#placaremolque2").val(),
                
        
                        
            },
            success: function(data) {
                $('#msg4').html('<div class="alert alert-success flash-msg">Registro Guardado </div>');
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