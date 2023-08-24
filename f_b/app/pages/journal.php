<?php if ($this->isLoged()) {


?><main role="main">
        <img src=".//?f=wallp/254381.png" alt="aer" loading="lazy" class="background_image" />


        <div class="album py-5  ">
            <div class="container" data-type="journal_all">

                <div class="row">
                    <?php
                    $this->flights_card_f("SELECT * FROM rezerved WHERE rezerved.user_id = $_SESSION[user_id]  ORDER BY  rezerved.time DESC");
                    ?>
                </div>
            </div>
        </div>

    </main> <?php } else {
            ?>
    <script>
        document.body.onload = function() {
            ICR.ui.modal('login_modal');
        }
    </script>
<?php
        } ?>