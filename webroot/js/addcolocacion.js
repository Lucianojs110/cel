

$(document).ready(function(){
    var screen = $('#loading');
    configureload(screen);
    $('.addcolocacion').on('click', function(event)
    {
         colocacion1 = $("#colocacion").val();
         if (colocacion1 != "") {
        $.ajax({
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/query",
            dataType: "json",
            data: {
              
                caja: $("#caja").val(),
                  
            },
            success:function(data) {   

              
               var consulta = Object.keys(data).length;
               console.log(consulta);
               if (consulta==0){

                guardar();

               }else{

                for (let value of Object.values(data)) {
                    
                    value1 = JSON.stringify(value.colocacion);
                    value2 = value1.substring(1,11);
                    console.log(value1.substring(1,11)); 
                    
                  }

            
                  var salida = formato(value2);
                  console.log(salida);
                  function formato(value2){
                    return value2.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1');
                  }

                var opcion = confirm( "La caja se registro por ultima vez con fecha " + salida + ", desea guardarla nuevamente?");
                if (opcion == true) {
                    
                    guardar();
                    
                } else {
                    $('#msg1').html('<div class="alert alert-danger flash-msg">No se guardo el registro</div>');
                    $('.flash-msg').delay(4000).fadeOut('slow');
                    $('#resultpo').hide();
                    $('#caja').val('');
                    $('#linea').val(1);
                    borrarpo()
                }
               }
            },
            error: function(){
                alert('tenemos problemas');
            } 
        });
        return false;
    }
    else{alert("Ingrese Valores")}
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

    function configureload(screen) {
     $(document)
     .ajaxStart(function(){
             screen.fadeIn();
         })
         .ajaxStart(function(){
            screen.fadeOut();
        })
    }


   function guardar(){
    $.ajax({
        type: "POST",
        url: getBaseUrl() + "CEL/Colocacion/add",
        dataType: "html",
        
        data: {
            colocacion: $("#colocacion").val(),
            caja: $("#caja").val(),
            linea: $("#linea").val(),  
        },
        success:function(data) {   
            $('#msg1').html('<div class="alert alert-success flash-msg">Registro Guardado</div>');
            $('.flash-msg').delay(4000).fadeOut('slow');
            $('#resultpo').hide();
            $('#caja').val('');
            $('#linea').val(1);
        },
        error: function(){
            alert('tenemos problemas');
        } 
        
    });

    }

    function borrarpo(){
        $.ajax({
            type: "POST",
            url: getBaseUrl() + "CEL/Colocacion/borrarpo",
            dataType: "html",
            
            data: {
                colocacion: $("#colocacion").val(),
                caja: $("#caja").val(),
                linea: $("#linea").val(),  
            },
            success:function(data) {   
              
            },
            error: function(){
                alert('tenemos problemas');
            } 
            
        });
    
        }


    
    
