<div class="container header_container">

  <?php
  if ($this->isLoged()) {
  ?>

    <header class="p-3 mb-3 border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <?php
            echo $this->menu_active($_GET['p']);
            ?>
          </ul>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>

          <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo "./?f=cover&u=p$_SESSION[user_id]"; ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="./?p=profile&settings=yes">Settings</a></li>
              <li><a class="dropdown-item" href="./?p=profile">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" onclick="ICR.login_reg('logout')">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>


  <?php
  } else {
  ?>
    <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
              <use xlink:href="#bootstrap" />
            </svg>
          </a>
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          </ul>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" onsubmit="return false;">
            <input onkeydown="ICR.ui.search(this);" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
          </form>

          <div class="text-end">
            <button type="button" class="btn btn-outline-light me-2" data-toggle="modal" onclick="ICR.ui.modal('login_modal')" data-target="#login_modalLabel">Login</button>
            <button type="button" class="btn btn-warning" onclick="ICR.ui.modal('reg_modal')">Sign-up</button>
          </div>
        </div>
      </div>
    </header>

  <?php

    $this->include("components/modals.php");
  }
  ?>
</div>