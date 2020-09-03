$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': gl_csrf_token
      }
    });
  
    $("#buttonEdit").click(function() {        
        
      $.ajax("ajax_edit_comment", {
          type: 'post',
          data: {              
            commentID:  gl_commentID,
            comment:    $("#comment").val(),
            update:     gl_updateComment,
            postID:     gl_postID
          },
            success: function(request) {                     
                var commentNew = request['comment'];
              
                if (commentNew.length) { 
                    $("#buttonEdit").text("Hinzufügen");
                    $("#comment").val('');
                    $("#list-group-item"+gl_commentID).children("p").text(commentNew);
                    gl_updateComment = false;
                } else {
                    console.log(request['error']);
                }
            }
      });  
    });
});