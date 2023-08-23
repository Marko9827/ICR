<main role="main">


    <div class="album py-5 bg-light">
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