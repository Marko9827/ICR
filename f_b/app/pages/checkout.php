<?php if ($this->isLoged()) { ?>
    <div class="container">
        <main>
            <img src="<?php  echo $this->getimage($_GET['id']); ?>" alt="aer" class="background_image"/>
            <div class="py-5 text-center">

                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
            </div>

            <div class="row ">

                <div class="col-md-7 col-lg-8 margin-auto">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName"  value="<?php echo $this->cuva_id("username"); ?>" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder=""  value="<?php echo $this->cuva_id("surname"); ?>" required>
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
 

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-body-secondary">*</span></label>
                                <input type="email" class="form-control" id="email" value="<?php echo $this->cuva_id("email"); ?>" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="Phone" class="form-label">Phone <span class="text-body-secondary">*</span></label>
                                <input type="Phone" class="form-control" id="Phone" value="<?php echo $this->cuva_id("phone"); ?>" placeholder="aaaxxxxxxxx">
                                <div class="invalid-feedback">
                                    Please enter your phone.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address"  value="<?php echo $this->cuva_id("adress"); ?>" placeholder="1234 Main St" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span class="text-body-secondary">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>

                            <div class="col-md-3">
                                <label for="country" class="form-label">Departure flight</label>
                                <select class="form-select" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="state" class="form-label">Destination</label>
                                <select disabled class="form-select" id="state" required>
                                    <option value="" selected><?php echo $this->cuva_idf("airport_b",$_GET['id']); ?></option>
                                  
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Time of departure</label>
                                <input class="form-select" placeholder="T.Departure"   type="date" id="departure_airport_a" name="departure_airport_a">
                                <div class="invalid-feedback">
                                    Please provide Time of departure
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Date of Return</label>
                                <input class="form-select"   placeholder="T.Return"   type="date" id="departure_date_Return" name="departure_date_Return">
                                <div class="invalid-feedback">
                                    Please provide Date of Return
                                </div>
                            </div>
                            
                        </div>

                        <hr class="my-4">
 

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">I accept if I booked the flight 24 hours before it. That I will be late at my own risk</label>
                        </div>
 

                       

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
        <script>
    document.body.onload = function(){
    ICR.ui.checkout(<?php echo $_GET['id']; ?>);
    }
</script>
    <?php } else {
  ?>
<script>
    document.body.onload = function(){
    ICR.ui.modal('login_modal');
    }
</script>
  <?php 
} ?>