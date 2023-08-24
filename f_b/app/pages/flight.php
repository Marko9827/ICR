<main role="main">
    <img src="./?f=flight_<?php echo "$_GET[id]"; ?>.png" alt="aer" loading="lazy" class="background_image" />


    <div class="album py-5  ">
        <div class="container">

           <?php 
           $this->include("pages/flight_id_$_GET[id].php");
           ?>

<div class="row">
<h4>Tickets and flights available</h4>
<br><br>
    <?php 
    $this->flights_card("SELECT * FROM flights WHERE flights_id = $_GET[id]");
    ?>
            </div>
        </div>
    </div>
</main>