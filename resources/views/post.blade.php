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
            <div class="list-group-item" id="list-group-item{{$comment->id}}">
              <p>{{$comment->content}}</p>
              <div id="kr-view-button{{$comment->id}}">
                <form method="post" action="post?id={{$post->id}}">
                  @csrf
                  <button type="submit" name="edit" value="{{$comment->id}} "class="btn btn-outline-dark">Korrigieren</button>
                </form>
              </div>              
            </div>
          @endforeach
        </div>          
        <form class="form-group" method="POST" action="post?id={{$post->id}}">        
        @csrf
          <div class="form-group">
            <textarea class="form-control" name="comment">
              {{$commentEdit}} 
            </textarea>
          </div>          
          <button type="submit" class="btn btn-primary">
          @if (@empty($commentEdit)) 
            Hinzufügen
          @else
            Korrigieren
          @endif  
          </button>
        </form>
      </div>
    </div>
</div>

<script>
  $(document).ready(function() {
      var arrayCom = <?php echo json_encode($comments, JSON_PRETTY_PRINT);  ?>;
    
      arrayCom.forEach(myFunction)

      function myFunction(value, index, array) {      
          $("#kr-view-button"+value.id).css("display", "none");
      
          $("#list-group-item"+value.id).hover(function() {
          $("#kr-view-button"+value.id).slideToggle(200);          
          });
      }
  });
</script>

<footer>
  @include('elements.footer') 
</footer>

