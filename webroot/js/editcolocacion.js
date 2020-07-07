$(document).ready(function(){
    $('.editcolocacion').on('click', function(event)
   
    {

        var idgeneral = $("#idgeneral").val();
         if (idgeneral != "") {
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/edit2",
            dataType: "html",
            data: {
                idcoloc: $("#id1").val(),
                colocacion: $("#colocacion").val(),
                caja: $("#caja").val(),
                linea: $("#linea").val(),  
                pickup: $("#pickup").val(), 
                cliente: $("#cliente").val(), 
                entregada: $("#entregada").val(), 
                poanexo: $("#poanexo").val(), 
                transfer: $("#transfer").val(), 
                trasbordo: $("#trasbordo").val(), 
                importacion: $("#importacion").val(), 
                estatus: $("#estatus").val(), 
                entrega: $("#entrega").val(), 
                cruce: $("#cruce").val(), 
                despacho: $("#despacho").val(), 
                descargada: $("#descargada").val(), 
                idgeneral: idgeneral, 
                
            },
            success: function(data) {
                window.location.href = getBaseUrl() + "CEL/Colocacion/index";

            },
            error: function(){
                alert('tenemos problemas');
            }
        });
        return false;
     } else{alert("Elija un P.O. del listado")}
   
    });

   

    });

 

function getBaseUrl() {
    var pathArray = location.href.split('/');
    var protocol = pathArray[0];
    var host = pathArray[2];
    var url = protocol + '//' + host + '/';
    
    return url;
    }