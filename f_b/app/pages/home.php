<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
    <?php 
    $this->flights_card("SELECT * FROM flights ORDER BY flights_id");
    ?>
            </div>
        </div>
    </div>

</main>