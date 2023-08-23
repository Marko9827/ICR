<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login_modalLabel">Login</h5>
                <button type="button" class="close" aria-label="Close" onclick="ICR.ui.modal_close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" onsubmit="return false;">
                     <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  
                     

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="ICR.ui.modal_close()">Close</button>
                <button type="button" class="btn btn-primary" onclick="ICR.login_reg('login')">Sign in</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reg_modal" tabindex="-1" role="dialog" aria-labelledby="reg_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login_modalLabel">Register</h5>
                <button type="button" class="close" aria-label="Close" onclick="ICR.ui.modal_close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" onsubmit="return false;">>

                <div class="image_upload"> 
                    <img id="image_upload" onclick="ICR.user.trigger('input_image_file1');" src="./?f=user/default.png" alt="image" class="image_preview" />
                    <input type="file" accept="image/*" id="input_image_file1" class="input_image_file" onchange="ICR.user.imagepreview(this,'image_upload')" />
                </div>
                 
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Password" required>

                    <label for="inputSurname" class="sr-only">Surname</label>
                    <input type="text" id="inputSurname" class="form-control" placeholder="Surname" required>
                    
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> 


                    <label for="inputAdress" class="sr-only">Adress</label>
                    <input type="text" id="inputAdresse" class="form-control" placeholder="Adress" required>
  
                    
                    <label for="inputPhone" class="sr-only">Phone</label>
                    <input type="number" id="inputPhone" class="form-control" placeholder="Phone" required>
  

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="ICR.ui.modal_close()">Close</button>
                <button type="button" class="btn btn-primary" onclick="ICR.login_reg('reg')">Sign in</button>
            </div>
        </div>
    </div>
</div>