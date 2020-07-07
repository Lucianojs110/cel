$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.edittransfer').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/edittransfer",
            dataType: "html",
            data: {
                idcoloc: $("#idcoloc2").val(),
                transferFactura: $("#transferFactura").val(),
                transferRecepcion: $("#transferRecepcion").val(),
                transfer2: $("#transfer2").val(),
                transferImportePesos: $("#transferImportePesos").val(), 
                transferImporteDolar: $("#transferImporteDolar").val(),
                transferPago: $("#transferPago").val(), 
                transferCheque: $("#transferCheque").val(), 
                transferObs: $("#transferObs").val(),   
                        
            },
            success: function(data) {
                $('#msg1').html('<div class="alert alert-success flash-msg">Registro Actualizado </div>');
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