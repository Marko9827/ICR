<main role="main">
<img src="./?f=wallp/254381.png" alt="aer" loading="lazy" class="background_image"/>


<div class="album py-5  ">
        <div class="container">

            <div class="row">
                <?php
                 $rows = $this->flights_card_fullinfo("SELECT * FROM flights WHERE flights_id = $_GET[id]",
                 false);
                                ?>

            </div>
        </div>
    </div>
</main>