<?php if ($this->isLoged()) {

    $query = $this->Query("SELECT * FROM user WHERE user.id = $_SESSION[user_id]");

    $rowF = mysqli_fetch_assoc($query);

?>

    <div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="edit_profile_modal_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_profile_modal_modalLabel">Edit Profile</h5>
                    <button type="button" class="close" aria-label="Close" onclick="ICR.ui.modal_close()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" onsubmit="return false;">

                        <div class="image_upload">
                            <img id="image_upload" src="./?f=user/default.png" alt="image" class="image_preview" />
                            <input type="file" accept="image/*" id="input_image_file1" class="input_image_file" onchange="ICR.user.imagepreview(this,'image_upload')" />
                        </div>

                        <label for="inputUsername" class="sr-only">Username</label>
                        <input type="text" id="inputUsername" class="form-control" value="<?php echo "$rowF[username]"; ?>" placeholder="Password" required>

                        <label for="inputSurname" class="sr-only">Surname</label>
                        <input type="text" id="inputSurname" class="form-control" value="<?php echo "$rowF[surname]"; ?>" placeholder="Surname" required>

                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" value="<?php echo "$rowF[email]"; ?>" placeholder="Email address" required autofocus>


                        <label for="inputAdress" class="sr-only">Adress</label>
                        <input type="text" id="inputAdresse" class="form-control" value="<?php echo "$rowF[adress]"; ?>" placeholder="Adress" required>


                        <label for="inputPhone" class="sr-only">Phone</label>
                        <input type="number" id="inputPhone" class="form-control" value="<?php echo "$rowF[phone]"; ?>" placeholder="Phone" required>


                        <label for="inputPassword" class="sr-only">New Password? (Not required)</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="ICR.ui.modal_close()">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="ICR.ui.post_profile_edit()">Save</button>
                </div>
            </div>
        </div>
    </div>

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
                                    <i class="bi bi-pencil edit_pen" onclick="ICR.ui.modal('edit_profile_modal')" data-toggle="tooltip" data-placement="right" title="Edit profile"></i>
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
    <?php
    if (!empty($_GET['settings'])) {
        echo "<script>     document.body.onload = function() { ICR.ui.modal('edit_profile_modal'); } </script>";
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