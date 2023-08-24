<?php if ($this->isLoged()) {
    $sql2 = $this->Query("SELECT * FROM rezerved WHERE rezerved.flight_id = $_GET[id] AND rezerved.user_id = $_SESSION[user_id]");
    if (mysqli_num_rows($sql2) > 0) {
        $row2 = mysqli_fetch_assoc($sql2);
?>
        <div class="container ">
            <main>
                <img src="<?php echo $this->getimage($_GET['id']); ?>" alt="aer" class="background_image" />
                <div class="py-5 text-center">

                    <p class="lead">Edit your ticket</p>
                </div>

                <div class="row ">

                    <div class="col-md-15 col-lg-8 margin-auto">
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">


                                <div class="col-md-3">
                                    <label for="country" class="form-label"><i class="bi bi-airplane rotate-90 margin-right-10"></i> From the</label>
                                    <select class="form-select airport_a" data-selected="<?php
                                                                                            echo $row2["airport_a"];
                                                                                            ?>" id="country" required>
                                        <option value="">Choose...</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="state" class="form-label"><i class="bi bi-geo-alt-fill margin-right-10"></i> Destination</label>
                                    <select disabled class="form-select" id="state" required>
                                        <option value="" val selected><?php echo $this->cuva_idf("airport_b", $_GET['id']); ?></option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Time of departure</label>
                                    <input class="form-select" placeholder="T.Departure" type="date" value="<?php echo $row2['time_start']; ?>" id="departure_date" name="departure_date">
                                    <div class="invalid-feedback">
                                        Please provide Time of departure
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="zip" class="form-label"><i class="bi bi-airplane rotate-left margin-right-10"></i> Date of Return</label>
                                    <input class="form-select" placeholder="T.Return" type="date" id="departure_date_Return" value="<?php echo $row2['time_end']; ?>" name="departure_date_Return">
                                    <div class="invalid-feedback">
                                        Please provide Date of Return
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="seats" class="form-label"><i class="bi bi-person margin-right-10"></i> Seats</label>
                                    <select class="form-select seats_tempator" id="seats" data-selected="<?php
                                                                                                            echo $row2["seats"];
                                                                                                            ?>" required>
                                        <option value="" selected><?php echo $this->cuva_idf("seats", $_GET['id']); ?></option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide 1 or more seat/s.
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">


                            <div class="form-check">
                                <input onchange="ICR.ui.checkout.chk(this);" type="checkbox" class="form-check-input " id="save-info">
                                <label class="form-check-label" for="save-info">Confirm modification or deletion</label>
                            </div>




                            <hr class="my-4">
                            <div class="row g-3">

                                <button onclick="ICR.ui.checkout.ticket(<?php echo $row2['rezerved_id']; ?>,'ticked_edit');" class="btn_twos col-md-3 w-100 btn btn-primary btn-lg checked_disabled_chk" disabled type="button"><i class="bi bi-airplane"></i> Save</button>
                                <button onclick="ICR.ui.checkout.ticket(<?php echo $row2['rezerved_id']; ?>,'ticked_del');" class="btn_twos col-md-3 w-100 btn btn-danger btn-lg checked_disabled_chk" disabled type="button"><i class="bi bi-trash"></i> Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <script>
                document.body.onload = function() {
                    ICR.ui.checkout.cr(<?php echo $_GET['id']; ?>);
                }
            </script>
        <?php } else {
        echo "    <script> window.location.href = '/?p=checkout&id=$_GET[id]'; </script>";
    }
} else {
        ?>
        <script>
            document.body.onload = function() {
                ICR.ui.modal('login_modal');
            }
        </script>
    <?php
} ?>