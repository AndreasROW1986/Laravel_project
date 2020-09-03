<!DOCTYPE html>
<html>

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"> -->
  <script src="js/jquery.js"></script>
  <script src="js/searchArtikel.js"></script>

  <link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<!-- ************************* BEGIN ************************** -->

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