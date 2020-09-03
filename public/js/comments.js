$(document).ready(function() {    
    var arrayCom = gl_arrayComments;

    arrayCom.forEach(myFunction)

    function myFunction(value, index, array) {      
        $("#kr-view-button"+value.id).css("display", "none");
    
        $("#list-group-item"+value.id).hover(function() {
        $("#kr-view-button"+value.id).slideToggle(200);          
        });
    }
});