$(document).ready(function(){
    $('.addpo').on('click', function(event)
    
    {
        
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/addpotemp",
            dataType: "html",
            data: {
                id: $(this).attr("id"),
                pickup: $(this).attr("pickup"),
                cliente: $(this).attr("cliente"),
                entrega: $(this).attr("entrega"),
                
               
            },
            success: function(data) {
              $('#msg1').html('<div class="alert alert-primary flash-msg">Po agregado. </div>');
              $('.flash-msg').delay(4000).fadeOut('slow');
              obtener_datospo();
              $('#Modalpo').modal('hide').toggle("slow");
            },
            error: function(){
                alert('tenemos problemas');
            }
        });
        return false;

    });

   

    });

   function obtener_datospo(){

    $.ajax({
        url: getBaseUrl() + "CEL/Colocacion/obtener_datospo",
        method: "POST",
        success: function(data){
            $("#resultpo").html(data)
        }
    });

}

function getBaseUrl() {
    var pathArray = location.href.split('/');
    var protocol = pathArray[0];
    var host = pathArray[2];
    var url = protocol + '//' + host + '/';
    
    return url;
    }