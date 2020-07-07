$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.editorbis').on('click', function(event)
    {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/editorbis",
            dataType: "html",
            data: {
                idcoloc: $("#idcoloc2").val(),
                orbisFactura: $("#orbisFactura").val(),
                orbisCliente: $("#orbisCliente").val(),
                orbisPeso: $("#orbisPeso").val(),
                orbisDolares: $("#orbisDolares").val(),
                orbisTotalFactura: $("#orbisTotalFactura").val(),
                orbisEnvio: $("#orbisEnvio").val(),
                orbisRelacion: $("#orbisRelacion").val(),
                orbisPago: $("#orbisPago").val(),
                orbisCheque: $("#orbisCheque").val(),
                orbisObs: $("#orbisObs").val(),
                orbisCotizacion: $("#orbisCotizacion").val(),
                       
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