<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                $this->flights_card_fullinfo("SELECT * FROM flights  WHERE flights.flights_id =  EXISTS
                (SELECT * FROM journal WHERE journal.flight_id =  flights.flights_id ) 
                ORDER BY  flights.flights_id");
                ?>
            </div>
        </div>
    </div>

</main>