<main role="main">
    <img src=".//?f=wallp/254381.png" alt="aer" loading="lazy" class="background_image" />


    <div class="album py-5  ">
        <div class="container" data-type="journal_all">

            <div class="row">
                <?php
                $this->flights_card_fullinfo("SELECT * FROM flights   WHERE flights.flights_id = $_GET[id]");
                ?>
            </div>
        </div>
    </div>

</main>