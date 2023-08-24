<main role="main">
<img src=".//?f=wallp/254381.png" alt="aer" loading="lazy" class="background_image"/>


    <div class="album py-5  ">
        <div class="container">
     
            <div class="row">
    <?php 
    $this->flights_card("SELECT * FROM flights ORDER BY flights_id");
    ?>
            </div>
        </div>
    </div>

</main>