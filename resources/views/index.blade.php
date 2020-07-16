@include('elements.header') 

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <div class="row">         
          <h3 class="display-4">Herzlich willkommen zu meinem Blog!</h3>
          <p>Da werden verschiedene Beiträge aus aller berümtesten Zeitungen zusammengestellt</p>        
       
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($artikeln as $artikel)
      <div class="col-md-4">        
        <h2> {{$artikel->autor}} </h2>
        <p> {{$artikel->heading}} </p> 
        <p><a class="btn btn-secondary" href="post?id=<?php echo $artikel->id?>" role="button">Mehr lesen &raquo;</a></p>
      </div>
      
      @endforeach
    </div>
    
  </div> <!-- /container -->

  <!-- <div class="container-sm">      
      <div>
        Datum: <?php //echo $course['date']; echo $course['currency'].": "; echo $course['rate'] ?>
      </div>
  </div> -->

</main>

<footer>
  @include('elements.footer') 
</footer>