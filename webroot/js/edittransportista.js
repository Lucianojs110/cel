$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.edittransportista').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/edittransportista",
            dataType: "html",
            data: {
                idcoloc: $("#idcoloc").val(),
                recepcion: $("#transRecepcion").val(),
                transportista: $("#transportista").val(),
                transFactura: $("#transFactura").val(),  
                transImportePesos: $("#transImportePesos").val(), 
                transImporteDolar: $("#transImporteDolar").val(), 
                transPago: $("#transPago").val(), 
                transCheque: $("#transCheque").val(),   
                transObs: $("#transObs").val(),            
            },
            success: function(data) {
                $('#msg1').html('<div class="alert alert-success flash-msg">Registro Actualizado. </div>');
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