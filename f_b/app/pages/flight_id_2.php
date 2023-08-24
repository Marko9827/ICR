<div class="row">
    <?php
    /*
                 $rows = $this->flights_card_fullinfo("SELECT * FROM flights WHERE flights_id = $_GET[id]",
                 false);*/
    ?>
    <div class="container mt-5">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">France, Paris</h1>
                    <!-- Post meta content-->
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("time_flight", $_GET['id']); ?></a>

                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("name", $_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("loc_a", $_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("loc_b", $_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Class: <?php echo $this->cuva_idf("class_flights", $_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("price", $_GET['id']); ?>$</a>

                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="./?f=loc/paris/aer.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">

                        The Eiffel Tower, Louvre, Versailles and other museums, palaces and numerous cathedrals attract millions of tourists from all over the world every year. Romantic sunsets watched from Parisian bistros, along with the best wines and food, are everyone's first association with the city of romance. Apart from tourists, Paris also attracts numerous artists, fashion designers, culinary artists, both masters of their craft and those who have yet to prove themselves. Book plane tickets to Paris and plan your trip to the "City of Light", one of the world's most desirable destinations.
                    </p>
                </section>
            </article>
            <!-- Comments section-->

        </div>
    </div>
</div>