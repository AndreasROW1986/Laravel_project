$(document).ready(function() {
    $(".edit").click(function() {        
        var commCur = $(this).parents("span").children("p").text();        
        $("#comment").text(commCur);
      
        $("#buttonEdit").text("Korrigieren");
        
        gl_commentID = $(this).attr("value");
        gl_updateComment = true;
    });
});