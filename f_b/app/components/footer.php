<?php 
if(!$_GET['p'] == "profile"){
?>
<footer   class="  text-center text-body-secondary bg-body-tertiary">
  By <a href="https://github.com/marko9827/ICR" target="_blank">github.com/marko9827</a>
</footer>
<?php } ?>
<?php 
$this->include("components/bot_ui.php");
?>
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
<script>
    <?php 
     
     $this->include("components/js/raiting.js");
     ?>
</script>
<script>
  <?php 
     
     $this->include("components/js/main.js");
     ?>

function handlePayload(payload) {
  alert(payload);
    if (payload === "/open_link") {
      window.location.href = "/?p=logout";
    }
  }

 
</script>
<script>
 

</script>
</body>
</html>