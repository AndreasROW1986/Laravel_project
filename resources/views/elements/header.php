<!DOCTYPE html>
<html>

<head>
  meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"> -->
  <script src="js/jquery.js"></script>


<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>     
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
</script>

</head>

<!-- ************** BEGIN *************** -->

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="artikels">Artikels</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
    <form class="nav-item dropdown form-inline my-2 my-lg-0">
      <input class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="search" placeholder="Search" aria-label="Search" oninput="showArtikelOnAutor(this.value)">
      <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="display: none;">          
        </div>            
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>

<body>