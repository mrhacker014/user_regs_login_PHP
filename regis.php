<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
     <title>sing up</title>
     <?php include 'links/links.php' ?>
     <?php include 'css/style.php' ?>
</head>

<body>
     <?php
     include 'connection.php';

     if (isset($_POST['submit'])) {
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

          $pass = password_hash($password, PASSWORD_BCRYPT);
          $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

          $emailquery = "select * from singup where email='$email'";
          $query = mysqli_query($con, $emailquery);

          $emailcount = mysqli_num_rows($query);

          if ($emailcount > 0) {
     ?>
               <script>
                    alart("Email already exist");
               </script>
               <?php
          } else {
               if ($password === $cpassword) {
                    $insertquery = "INSERT INTO singup(username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";
                    $iquery = mysqli_query($con, $insertquery);
                    if ($iquery) {
               ?>
                         <script>
                              alert("Inserted Successful");
                         </script>
                    <?php
                    } else {
                    ?>
                         <script>
                              alert("NO Inserted");
                         </script>
                    <?php
                    }
               } else {
                    ?>
                    <script>
                         alert("password are not macthing");
                    </script>
     <?php
               }
          }
     }

     ?>
     <div class="card bg-light">
          <article class="card-body mx-auto" style="max-width: 400px;">
               <h4 class="cart-title mt-3 text-center">Create Account</h4>
               <p class="text-center">Get Started with your free Account</p>
               <p>
                    <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i> Login Via gmail</a>
                    <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i> Login via Facebook</a>
               </p>
               <p class="divider-text">
                    <span class="bg-light">OR</span>
               </p>
               <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user"></i></span>
                         </div>
                         <input name="username" class="form-control" placeholder="Full name" type="text" required>
                    </div>
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                         </div>
                         <input name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div>
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-phone"></i></span>
                         </div>
                         <input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
                    </div>
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-lock"></i></span>
                         </div>
                         <input name="password" class="form-control" placeholder="Creat password" type="password" value="" required>
                    </div>
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-lock"></i></span>
                         </div>
                         <input name="cpassword" class="form-control" placeholder="Conform password" type="password" required>
                    </div>
                    <div class="form-group">
                         <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                    <p class="text-center">Have an Account ?<a href="login.php">Log In</a></p>
               </form>
          </article>
     </div>

</body>

</html>