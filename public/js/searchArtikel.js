function showArtikelOnAutor(str) {
    if (str.length == 0) {            
        $(".dropdown-item").remove();
        $(".dropdown-menu").hide();
        return;
    }
    else {           
        $.ajax("ajax?autor="+str, {                  
            success: function(result) {                     
                if (result.length > 0) {
                  $(".dropdown-menu").empty();
                  $(".dropdown-menu").show();
                }                    
                for (i = 0; i < result.length; i++) {                     
                  $(".dropdown-menu").append("<a class='dropdown-item' href='#'>"+result[i]+"</a>");
                }  
            }
        });  
    }
}