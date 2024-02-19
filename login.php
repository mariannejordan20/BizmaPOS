<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BIZMATECH POS</title>
    <link rel="shortcut icon" href="Sogod.png">

  <!-- Link to Bootstrap CSS file -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
.gradient-custom-2 {
/* fallback for old browsers */
background: #343a40;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #343a40, #343a40, #343a40, #343a40);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #343a40, #343a40, #343a40, #343a40);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
</head>

<body>
<section class="h-100 gradient-form" style="background-color: #f5f5fd;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-1 shadow text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <p class="form-label" style="font-size: 25px; font-weight:bold; padding-bottom: 20px;">POINT OF SALES</p>
                </div>

                <form action="#">
				  <div class="form-outline mb-2">

          <label class="form-label" style="font-size: 10px; font-weight:bold; color:gray" for="form2Example22">ROLE</label>
                    <select class="form-control form-control-sm" name="role" id="role">
						<option value="">Select Role</option>
						<option value="Admin">Admin</option>
						<option value="Staff">Staff</option>
					</select>

                  </div>
                  <div class="form-outline mb-2">
				  	<label class="form-label" style="font-size: 10px; font-weight:bold; color:gray" for="form2Example22">USERNAME</label>
                    <input type="text" id="username" name="username" class="form-control form-control-sm"/>
                  </div>

                  <div class="form-outline mb-2">
				  <label class="form-label" style="font-size: 10px; font-weight:bold; color:gray" for="form2Example22">PASSWORD</label>
                    <input type="password" id="password" class="form-control form-control-sm" />
                  </div>

				<div class="text-center mb-1">
					<button id="btnLogin" value="Login" class="btn btn-block fa-lg" type="button" style="background-color: #ff3c00; color: white; font-weight: bold; padding:5px; padding-right: 1rem; padding-left: 1rem; font-size:12px;"> LOG
					IN</button>
          <button id="btnSignUp" class="btn btn-block fa-lg" type="button" data-bs-toggle="modal" data-bs-target="#signupModal" style="background-color: #ff3c00; color: white; font-weight: bold; padding:5px; padding-right: 1rem; padding-left: 1rem; font-size:12px;"> SIGN UP</button>
				</div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-1">
                  <h4 style="font-size: 40px; font-weight:bold; padding-left: 70px; color: #ff3c00;">BIZMATECH</h4>
                  <p class="small mb-0" style="font-size: 17px; padding-left: 65px; padding-top:-5px;">Business Machine Technologies</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Sign Up Form -->
        <form id="signupForm">
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

</section>
     <!-- Link to Bootstrap JavaScript file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>


<?php
   if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
      <script>
      swal({
      title: "<?php echo $_SESSION['status'];?>",
      icon: "<?php echo $_SESSION['status_code'];?>",
       });
 </script>
 <?php
      unset($_SESSION['status']);
   }
?>
  
 
<script type="text/javascript">
    $("#btnLogin").click(function(){
        var uname = $("#username").val();
        var pword = $("#password").val();
        var role = $("#role").val();


        if (role == "") {
            swal({
                title: "Error",
                text: "Please select a role!",
                icon: "error",
                button: "OK",
            });
            return false;
        }


        if (uname == "") {
            swal({
                title: "Error",
                text: "Empty Username!",
                icon: "error",
                button: "OK",
            });
            return false;
        }

        if (pword == "") {
            swal({
                title: "Error",
                text: "Empty Password!",
                icon: "error",
                button: "OK",
            });
            return false;
        }

        $.ajax({
            url:"processLogin.php",
            method: "post",
            data: { "username": uname, "password": pword, "role": role },
            success: function(res) {
                if (res == "1") {
                    window.location = "index.php";
                } else {
                    swal({
                        title: "Error",
                        text: "Incorrect username or password!",
                        icon: "error",
                        button: "OK",
                    });
                }
            }
        });
    });
</script>


    
