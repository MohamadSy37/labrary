<?php
session_start();
error_reporting(0);
$error=$_GET['rn'];
if($error!=null){
  echo"<script>alert('".$error.".');</script>";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="../asset/style/style_login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="container">
         <header>Login Form</header>
         <form action="../asset/php/login.php" method="post">
            <div class="input-field">
               <input type="email" name="email" required>
               <label>Email</label>
            </div>
            <div class="input-field">
               <input class="pswrd" name="password" type="password" required>
               <span class="show">SHOW</span>
               <label>Password</label>
            </div>
            <div class="button">
               <div class="inner"></div>
               <button name="log">LOGIN</button>
            </div>
         </form>
         <div class="signup">
            Not a member? <a href="join.php">Signup now</a>
         </div>
      </div>
      <script>
         var input = document.querySelector('.pswrd');
         var show = document.querySelector('.show');
         show.addEventListener('click', active);
         function active(){
           if(input.type === "password"){
             input.type = "text";
             show.style.color = "#1DA1F2";
             show.textContent = "HIDE";
           }else{
             input.type = "password";
             show.textContent = "SHOW";
             show.style.color = "#111";
           }
         }
      </script>
   </body>
</html>