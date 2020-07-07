$(document).ready(function(){

     $('#remitente').autocomplete({
        source: function( request, response ) {
            $.ajax({
                    url: getBaseUrl() + "CEL/Remitente/getremitentes" + '?term=' + request.term,
                    dataType: "json",
                   
                   
                    success: function (data)
                    {
                       
                        console.log(data);

                        if(data.length){
                            result = $.map(data, function(obj){

                                return{

                                    label: obj.remitente,
                                    value: obj.remitente,
                                    data: obj
                                };
                            });
                            response(result);
                        }
                    }
                    
              });
              
          },
          autoFocus: true,
                    minLength: 1,
                    select: function(event, selectedData){
                        if(selectedData && selectedData.item && selectedData.item.data){
                            var data = selectedData.item.data;
                            $("#rfcrem").val(data.rfc);
                            $("#origen").val(data.origen);
                            $("#domiciliorem").val(data.domicilio);
                            $("#lugarrecogida").val(data.recogida);
                        }
                    }
     });

     $('#operador').autocomplete({
        source: function( request, response ) {
            $.ajax({
                    url: getBaseUrl() + "CEL/Operador/getoperador" + '?term=' + request.term,
                    dataType: "json",
                   
                   
                    success: function (data)
                    {
                       
                        console.log(data);

                        if(data.length){
                            result = $.map(data, function(obj){

                                return{

                                    label: obj.operador,
                                    value: obj.operador,
                                    data: obj
                                };
                            });
                            response(result);
                        }
                    }
                    
              });
              
          },
          autoFocus: true,
                    minLength: 1,
                    select: function(event, selectedData){
                        if(selectedData && selectedData.item && selectedData.item.data){
                            var data = selectedData.item.data;
                            $("#operador").val(data.operador);
                            $("#unidad").val(data.unidad);
                            $("#tractorplacas").val(data.placatractor);
                         
                        }
                    }
     });

     $('#remolque').autocomplete({
        source: function( request, response ) {
            $.ajax({
                    url: getBaseUrl() + "CEL/Remolque/getremolque" + '?term=' + request.term,
                    dataType: "json",
                   
                   
                    success: function (data)
                    {
                       
                        console.log(data);

                        if(data.length){
                            result = $.map(data, function(obj){

                                return{

                                    label: obj.remolque,
                                    value: obj.remolque,
                                    data: obj
                                };
                            });
                            response(result);
                        }
                    }
                    
              });
              
          },
          autoFocus: true,
                    minLength: 1,
                    select: function(event, selectedData){
                        if(selectedData && selectedData.item && selectedData.item.data){
                            var data = selectedData.item.data;
                            $("#remolque").val(data.remolque);
                            $("#remolqueplacas").val(data.placaremolque);
                          
                         
                        }
                    }
     });


     $('#destinatario').autocomplete({
        source: function( request2, response ) {
            $.ajax({
                    url: getBaseUrl() + "CEL/Destinatario/getdestinatarios" + '?term=' + request2.term,
                    dataType: "json",
                   
                   
                    success: function (data2)
                    {
                       
                        console.log(data2);

                        if(data2.length){
                            result = $.map(data2, function(obj){

                                return{

                                    label: obj.destinatario,
                                    value: obj.destinatario,
                                    data: obj
                                };
                            });
                            response(result);
                        }
                    }
                    
              });
              
          },
          autoFocus: true,
                    minLength: 1,
                    select: function(event, selectedData){
                        if(selectedData && selectedData.item && selectedData.item.data){
                            var data2 = selectedData.item.data;
                            $("#rfcdes").val(data2.rfc);
                            $("#destino").val(data2.destino);
                            $("#patiodestino").val(data2.domicilio);
                            $("#lugarentrega").val(data2.entrega);
                        }
                    }
     });
    });

     function getBaseUrl() {
        var pathArray = location.href.split('/');
        var protocol = pathArray[0];
        var host = pathArray[2];
        var url = protocol + '//' + host + '/';
        
        return url;
    }

