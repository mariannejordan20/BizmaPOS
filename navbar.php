<nav class="navbar navbar-expand navbar-light  topbar static-top shadow" style="background-color: white">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo " " . $_SESSION['Name'] . " "; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">
    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
    Add User
</a>

                <a class="dropdown-item" href="logout.php">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
    </a>


            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Sign Up Form -->
        <form id="signupForm" action="createUser.php" method="POST">
          <div class="mb-3">
            <label for="signupUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="signupUsername" name="signupUsername">
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" name="signupPassword">
          </div>
          <div class="mb-3">
            <label for="signupConfirmPassword" class="form-label">Re-enter Password</label>
            <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword">
          </div>
          <div class="mb-3">
            <label for="NameOfUser" class="form-label">Name</label>
            <input type="text" class="form-control" id="NameOfUser" name="NameOfUser">
          </div>

          <div class="mb-3">
            <label for="signupRole" class="form-label">Role</label>
            <select class="form-select" id="signupRole" name="signupRole">
              <option value="" selected disabled>Choose Role</option>
              <option value="admin">Admin</option>
              <option value="staff">Staff</option>
            </select>
          </div>
          <!-- Add more fields as needed -->
          <button type="submit" class="btn btn-block fa-lg" style="background-color: #ff3c00; color: white; font-weight: bold; padding:5px; padding-right: 1rem; padding-left: 1rem; font-size:12px;">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>


