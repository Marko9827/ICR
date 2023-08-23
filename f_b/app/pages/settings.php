<?php if ($this->isLoged()) {
    
    $query = $this->Query("SELECT * FROM user WHERE user.id = $_SESSION[user_id]");
 
    $rowF = mysqli_fetch_assoc($query);
    
    ?>


    <main role="main">


    <section class="vh-100">
        <div class="container  ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="<?php echo "./?f=cover&u=p$_SESSION[user_id]"; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px; border-radius:150px;" />
                                <h5><?php echo "$rowF[username] $rowF[surname]"; ?></h5>

                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                            <i class="bi bi-pencil edit_pen" data-toggle="tooltip" data-placement="right"   title="Edit profile"></i>
                                <div class="card-body p-4">
                                    <h6>Contact Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"><?php echo $rowF['email']; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted"><?php echo $rowF['phone']; ?></p>
                                        </div> 
                                        <div class="col-6 mb-3">
                                            <h6>Adress</h6>
                                            <p class="text-muted"><?php echo $rowF['adress']; ?></p>
                                        </div>
                                        
                                    </div>
                                    <h6>The best destinations</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Recent</h6>
                                            <p class="text-muted">Lorem ipsum</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Most Viewed</h6>
                                            <p class="text-muted">Dolor sit amet</p>
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
<?php } else {
?>
    <script>
        document.body.onload = function() {
            ICR.ui.modal('login_modal');
        }
    </script>
<?php
} ?>