<?php if ($this->isLoged()) {
         
 
?>
    <div class="container ">
        <main>
            <img src="<?php echo $this->getimage($_GET['id']); ?>" alt="aer" class="background_image" />
            <div class="py-5 text-center">

                <p class="lead">Book a flight, some fields are filled in automatically from your profile.</p>

            </div>


            <div class="row ">

                <div class="col-md-15 col-lg-8 margin-auto">
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">


                            <div class="col-md-3">
                                <label for="country" class="form-label"><i class="bi bi-airplane rotate-90 margin-right-10"></i> From the</label>
                                <select class="form-select airport_a" id="country" required>
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
                                    <option value="" selected><?php echo $this->cuva_idf("airport_b", $_GET['id']); ?></option>

                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Time of departure</label>
                                <input class="form-select" placeholder="T.Departure" type="date" id="departure_date" name="departure_date">
                                <div class="invalid-feedback">
                                    Please provide Time of departure
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label"><i class="bi bi-airplane rotate-left margin-right-10"></i> Date of Return</label>
                                <input class="form-select" placeholder="T.Return" type="date" id="departure_date_Return" name="departure_date_Return">
                                <div class="invalid-feedback">
                                    Please provide Date of Return
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <label for="seats" class="form-label"><i class="bi bi-person margin-right-10"></i> Seats</label>
                                    <select class="form-select seats_tempator" id="seats" data-selected="0" required>

                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide 1 or more seat/s.
                                    </div>
                                </div>
                        </div>

                        <hr class="my-4">


                        <div class="form-check">
                            <input onchange="ICR.ui.checkout.chk(this);" type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">I accept if I booked the flight 24 hours before it. That I will be late at my own risk</label>
                        </div>




                        <hr class="my-4">

                        <button onclick="ICR.ui.checkout.ticket(<?php echo $_GET['id']; ?>,'ticked_add');" class="w-100 btn btn-primary btn-lg checked_disabled_chk" disabled type="button"><i class="bi bi-airplane"></i> Book a ticket</button>

                    </form>
                </div>
            </div>
        </main>
        <script>
            document.body.onload = function() {
                ICR.ui.checkout.cr(<?php echo $_GET['id']; ?>);
            }
            <?php 
         
         /*
    if (mysqli_num_rows($this->Query("SELECT * FROM rezerved WHERE flight_id = $_GET[id] AND user_id = $_SESSION[user_id]")) > 0) {
        echo "window.location.href = '/?p=ticket&what=edit&id=$_GET[id]';";
    }
       */     ?>
        </script>
    <?php } else {
    ?>
        <script>
            document.body.onload = function() {
                ICR.ui.modal('login_modal');
            }
        </script>
    <?php
} ?>