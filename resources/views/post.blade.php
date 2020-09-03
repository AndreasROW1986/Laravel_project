@include('elements.header')
    
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-5">{{$post->heading}}</h1>
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
    </div>
  </div>
    
<!-- ****************** BEGIN CONTENT ***************** -->
<div class="container">
    <div class="row">
        <p>{{$post->artikel}}</p>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <h5>Kommentare</h5>
        <div class="list-group list-group-flush">
          @foreach ($comments as $comment)
            <span class="list-group-item" id="list-group-item{{$comment->id}}">
              <p>{{$comment->content}}</p>
              <div id="kr-view-button{{$comment->id}}">                
                  <button type="submit" name="edit" value="{{$comment->id}}" class="btn btn-outline-dark edit">Korrigieren</button>
              </div>              
            </span>
          @endforeach
        </div>          
        
        <div class="form-group">
          <div class="form-group">
            <textarea id="comment" class="form-control" name="comment"> </textarea>
          </div>          
          <button id="buttonEdit" type="submit" class="btn btn-primary">          
              Hinzufügen         
          </button>
        </div>
      </div>
    </div>
</div>

<script>
  // global variable define

  var gl_arrayComments = <?php echo json_encode($comments, JSON_PRETTY_PRINT); ?>;
  var gl_csrf_token = "{{ csrf_token() }}";
  var gl_commentID; // number of the selected comment
  var gl_updateComment = false; // the comment is updated 
  
  var urlSearch = window.location.search;
  var gl_postID = urlSearch.slice(urlSearch.search("=")+1);
  
</script>

<script src="js/comments.js"></script>
<script src="js/buttonEdit.js"></script>
<script src="js/ajaxComments.js"></script>

<footer>
  @include('elements.footer') 
</footer>

