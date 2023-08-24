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
                    <h1 class="fw-bolder mb-1">Russia, Moskow</h1>
                    <!-- Post meta content-->
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("time_flight",$_GET['id']); ?></a>

                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("name",$_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("loc_a",$_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("loc_b",$_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Class: <?php echo $this->cuva_idf("class_flights",$_GET['id']); ?></a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $this->cuva_idf("price",$_GET['id']); ?>$</a>
 
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="./?f=loc/russia/air_serbia_moskva_page_1.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">
                        
                    The Russian capital is recognizable by its luxurious monumental buildings and colorful domes. Therefore, it is not surprising that it has been attracting visitors from all over the world for centuries. Buy plane tickets to Moscow and you are only one flight away from visiting the famous Kremlin and Red Square. Moscow is adorned with hundreds of churches and cathedrals, and the most famous is St. Basil's Cathedral, which has become synonymous with the Russian capital. Besides being a favorite place for painting, you can learn about the rich Russian history in the museum located there.

                    </p>
                </section>
            </article>
            <!-- Comments section-->
           
        </div>
    </div>
</div>