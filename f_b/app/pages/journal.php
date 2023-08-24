<?php if ($this->isLoged()) {


?>
<div class="modal fade " id="class_review_title" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title class_review_title" id="class_review_title"></h5>
                <button type="button" class="close" aria-label="Close" onclick="ICR.ui.modal_close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="ICR.ui.modal_close()">Close</button>
               
            </div>
        </div>
    </div>
</div>
<main role="main">
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