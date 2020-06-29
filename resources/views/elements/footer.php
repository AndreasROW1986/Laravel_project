<footer>
  <div class="container">
    <span class="text-muted">Company 2017-2020</span>
  </div>
</footer>

<!-- ************* JAVA SCRIPT ************ -->

<script>
  $(document).ready(func);
  
  function func() {
    for (let i = 1; i < <?php echo count($comments)+1?>; i++) {   
      $("#kr-view-button"+i).css("display", "none");
      
      $("#list-group-item"+i).hover(function(){
        $("#kr-view-button"+i).slideToggle(200);          
        }); 
    }
  }
</script>

</html>

