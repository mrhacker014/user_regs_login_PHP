<!DOCTYPE html>
<html lang="en">

<head>
     <title>Login</title>
     <?php include 'links/links.php' ?>
     <?php include 'css/style.php' ?>
</head>

<body>

<?php

     include 'connection.php';

     if(isset($_POST['submit'])){
          $email = $_POST['email'];
          $password = $_POST['password'];

          $email_search = "select * from singup where email='$email'";
          $query = mysqli_query($con,$email_search);

          $email_count = mysqli_num_rows($query);

          if($email_count){
               $email_pass = mysqli_fetch_assoc($query);
               $db_pass = $email_pass['password'];

               $pass_decode = password_verify($password,$db_pass);
               
               if($pass_decode){
                    ?>
                    <script>
                         alert("Login Successful");
                         location.replace("home.php");
                    </script>
               <?php
               }else{
                    ?>
                    <script>
                         alert("password incorrect");
                    </script>
               <?php
               }
          }else{
               ?>
                         <script>
                              alert("Invalide Email");
                         </script>
                    <?php
          }
     }

?>
     <div class="card bg-light">
          <article class="card-body mx-auto" style="max-width: 400px;">
               <h4 class="cart-title mt-3 text-center">Login Account</h4>
               <p class="text-center">Get Started with your free Account</p>
               <p>
                    <a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i> Login Via gmail</a>
                    <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i> Login via Facebook</a>
               </p>
               <p class="divider-text">
                    <span class="bg-light">OR</span>
               </p>
               <form action="" method="POST">
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                         </div>
                         <input name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div>
                    <div class="form-group input-group">
                         <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-lock"></i></span>
                         </div>
                         <input name="password" class="form-control" placeholder="Enter password" type="password" value="" required>
                    </div>
                    <div class="form-group">
                         <button type="submit" name="submit" class="btn btn-primary btn-block">LogIn</button>
                    </div>
                    <p class="text-center">Not Have an Account ?<a href="regis.php">SingUp</a></p>
               </form>
          </article>
     </div>

</body>

</html>