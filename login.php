<!DOCTYPE html>
<html lang="en">

<?php
    include('header.php');
?>
<html>
<head>
    <title> Login Form Design </title>
   <link rel="stylesheet" href="style.css">
</head>
    <body>
    <div class="login-box">
    <img src="Sogod.png" class="avatar">
        <h1>Login Here</h1>
            <form>
            <p>Username</p>
            <input type="text" id= "username" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" id= "password" name="password" placeholder="Enter Password">
            <a href="#" class="btn btn-primary btn-user btn-block" id="btnLogin">Login
            </a>
             
            </form>
            <script>
var input = document.getElementById("username");
var input2 = document.getElementById("password");
input.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("btnLogin").click();
  }
});
input2.addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("btnLogin").click();
  }
});
</script>
        
        </div>
    
    </body>
</html>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
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
        $("#btnLogin").text("Logging in...")
        if (uname == ""){
            swal({
              title: "Error",
              text: "Empty Username!",
              icon: "error",
              button: "OK!",
            });
            return false;
        }

        if (pword == ""){
            swal({
              title: "Error",
              text: "Empty password!",
              icon: "error",
              button: "OK!",
            });
            return false;
        }

        $.ajax({
            url:"processLogin.php",
            method: "post",
            data:{"username":uname, "password": pword},
            success: function(res){
                if (res == "1"){
                    window.location = "index.php";
                }else{
                    swal({
                  title: "Error",
                  text: "Invalid login credentials!",
                  icon: "error",
                  button: "OK!",
                });
                }
                
            }
        });
    });
</script>