$(document).ready(function(){
    $('.editcolocacion').on('click', function(event)
    
    {
        
        $.ajax({
            
            type: "POST",
            url: getBaseUrl() + "CEL/users/home",
            dataType: "json",
            data: {
                id: $("#selectlinea").val(), 
                
            },
            success: function(data) {
                var objetivo = document.getElementById('cantidad');
                objetivo.innerHTML = data;

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