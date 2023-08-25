<div class="card ">
    <div class="card-body">
        <?php if ($this->isLoged()) {
            if ($this->cuva_idf_ticket("status", $_POST['id']) == 2) { ?>
                <form class="mb-4">
                    <section class="review-step">

                    </section>
                    <textarea class="form-control" rows="3" placeholder="Leave travel impressions"></textarea>
                    <button type="button" class="btn btn-secondary" style="
    margin-top: 15px;
    margin-bottom: 0px !important;
" onclick="ICR.ui.post_comment(<?php echo $_POST['id']; ?>)">Post review</button>
 <div class="col-md-3 col-md-Inline">
                                <label for="com_score" class="form-label"><i class="bi bi-star margin-right-10"></i></label>
                                <select class="form-select airport_a" id="com_score" required>
                                    <option disabled selected>Your score 0-5</option> 
                                    <option value="0">0</option> 
                                    <option value="1">1</option> 
                                    <option value="2">2</option> 
                                    <option value="3">3</option> 
                                    <option value="4">4</option>
                                    <option value="5">5</option>  
                                </select>
                                <div class="invalid-feedback">
                                    Please select.
                                </div>
                            </div>
                    <div id="review-gate"></div>
                </form>
        <?php }
        } ?>
        <div class="d-flex mb-4">
            <?php
            $sql2 = $this->Query("SELECT * FROM comments WHERE comments.post_id = $_POST[id] ORDER BY time DESC");
            if (mysqli_num_rows($sql2) > 0) {
                while ($row = mysqli_fetch_assoc($sql2)) { ?>
                    <div class="d-flex mb-4 comment">
                        <div class="flex-shrink-0"><img class="rounded-circle" src="./?f=cover&u=p<?php echo $this->cuva_id("id", $row['user_id']); ?>" alt="..." />
                            <div class="fw-bold" style="

display: grid;
    text-align: left;

"><?php echo $this->cuva_id("username", $row['user_id']); ?><span class="comm_time"><?php echo date('m/d/Y H:i:s', $row["time"]) . " | <i class='bi bi-star'></i> Score: $row[score]" ?></span></div>
                        </div>
                        <div class="ms-3">

                            <?php echo $row['text']; ?>
                        </div>
                    </div>

            <?php
                }
            } else{
                echo "No reviews";
            } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    var config = {
        navbarColor: '#0f18e9',
        onUpdate: function(count) {
            if (count >= 5) {
                // Do something on good review
                $('#review-gate').reviewGate('step', 2);
            } else {
                // Do something on bad review
                $('#review-gate').reviewGate('step', 3);
            }
        },
    };
    $(document).ready(function() {
        $('#review-gate').reviewGate(config);
    });
</script>