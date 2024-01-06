<?php
include('../../asset/php/conn.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="style.css">
    <title>Dashbord</title>
</head>

<body>
    <header>
<div class="container">
    <input type="checkbox" name="" id="check">

    <div class="logo-container">
        <div class="logo"><img src="../../asset/image/logo.jpg" alt="" srcset=""></div>
    </div>

    <div class="nav-btn">
        <div class="nav-links">
            <ul>
              <li class="nav-link" style="--i: .6s">
                <a href="edit.php">
                <?php
            $sql=mysqli_query($con,"SELECT * FROM `usertable` WHERE `id`='$_SESSION[user_id]'");
            $row = mysqli_fetch_array($sql);
            if($row['img']===""){
                echo'<img src="../../asset/image/images_user/user.png" class="account" alt="" srcset="">';
            }else{
                ?><img src="../../image_profil/<?php echo$row['img'];?>" class="account" alt="" srcset=""><?php
            }

            ?></a>
                
            </li>
              <li class="nav-link" style="--i: .6s">
                  <a href="store.php"><i class="fa-solid fa-cart-shopping"></i></a>
                  
             </li>
             <li class="nav-link" style="--i: .6s">
               <a href="massage.php">Chat</a>
               
           </li> 
              <li class="nav-link" style="--i: .6s">
                  <a href="index.php">Dashbord</a>
                  
              </li> 
                
    <li class="nav-link" style="--i: .6s">
      <a href="sale.php">BUY</a>
      
  </li>
  <li class="nav-link" style="--i: 1.1s">
    <a href="rent.php">Rent</a>
</li>
<li class="nav-link" style="--i: 1.1s">
  <a href="exchang.php">Exchange</a>
</li>


                <li class="nav-link" style="--i: 1.35s">
                    <a href="../../log/logout.php">Log out</a>
                </li>
            </ul>
        </div>

      
    </div>

    <div class="hamburger-menu-container">
        <div class="hamburger-menu">
            <div></div>
        </div>
    </div>
</div>
</header>
<main>
  <div class="section">
    <div class="sectionEdit">
    <div class="container">
        <div class="title">Edit info</div>
        <div class="content">
            <form action="" method="post">
                <div class="user-details">
                  <div class="input-box">
                    <span class="details">Password</span>

                    <input type="password" class="inputser" name="password" placeholder="Enter your Password" required>
                  </div>
                  <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Enter your email" required>
                  </div>
                  </div>
                  <div class="button">
                    <input type="submit" name="Edit" value="Edit">
                  </div>
                  </form>
                  <?php
   if(isset($_POST['Edit'])){
      $password=md5($_POST['password']);
      $email=$_POST['email'];
      $sql=mysqli_query($con,"SELECT * FROM `usertable` WHERE `id`='$_SESSION[user_id]' AND password='$password' AND email='$email'");
      if($sql){
         echo"<script>alert('You can Edit Info.');</script>";

                  ?>
                <form action="../../asset/php/editinfo.php" method="post" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Image profile</span>
                <input type="file" name="file" >
              </div>
              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="uname" placeholder="Enter your username" >
              </div>
              <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="email" placeholder="Enter your email" >
              </div>
              <div class="input-box">
                <span class="details">Phone Number</span>
                <input type="number" name="phone" placeholder="Enter your number" >
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter your password" >
              </div>
              <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" name="repassword" placeholder="Confirm your password" >
              </div>
            </div>
            <div class="gender-details">
              <input type="radio" name="gender" value="male" id="dot-1">
              <input type="radio" name="gender" value="female" id="dot-2">
              <input type="radio" name="gender" value="no" id="dot-3">
              <span class="gender-title">Gender</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
                </label>
              </div>
            </div>
            <div class="button">
              <input type="submit" name="send" value="Edit">
            </div>

        </div>
      </div>
</form>
<?php
   }else{
      echo"<script>alert('You cann't Edit Info.');</script>";
   }
}?>

        </div>

    </div>
    <style>
      .section {
         margin-top: 500px;
      }
    </style>
    <div class="section">
        <h1>My Books For Buy</h1>

<section>
  <h1>Sale</h1>
<div class="slider owl-carousel">
  
<?php
  $sql=mysqli_query($con,"SELECT * FROM book WHERE id_user='$_SESSION[user_id]' AND statues='buy'");
  while($row=mysqli_fetch_array($sql)){

  ?>
  <div class="card">
     <div class="img">
        <img src="../../Books_upload/<?php echo$row['type'];?>" alt="">
     </div>
     <div class="content">
        <div class="title">
        <?php echo$row['nameclerk'];?>
        </div>
        <div class="sub-title">
        <?php echo$row['name'];?>
        </div>
        <p>
        <?php echo$row['dis'];?>
        </p>
        <div class="btn">
        <a href="../../asset/php/deletbook.php?rn=<?php echo$row['id'];?>"><button>DELET <i class="fa-solid fa-cart-shopping"></i></button></a>
        </div>
     </div>
  </div>
  <?php
  
}
  ?>
</div>
</section>

<script>
  $(".slider").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000, //2000ms = 2s;
    autoplayHoverPause: true,
  });
</script>
<section>
  <h1>Rent</h1>
<div class="slider owl-carousel">
  
<?php
  $sql=mysqli_query($con,"SELECT * FROM book WHERE id_user='$_SESSION[user_id]' AND statues='rent'");
  while($row=mysqli_fetch_array($sql)){

  ?>
  <div class="card">
     <div class="img">
        <img src="../../Books_upload/<?php echo$row['type'];?>" alt="">
     </div>
     <div class="content">
        <div class="title">
        <?php echo$row['nameclerk'];?>
        </div>
        <div class="sub-title">
        <?php echo$row['name'];?>
        </div>
        <p>
        <?php echo$row['dis'];?>
        </p>
        <div class="btn">
        <a href="../../asset/php/deletbook.php?rn=<?php echo$row['id'];?>"><button>DELET <i class="fa-solid fa-cart-shopping"></i></button></a>
        </div>
     </div>
  </div>
  <?php
  
}
  ?>
</div>
</section>

<script>
$(".slider").owlCarousel({
  loop: true,
  autoplay: true,
  autoplayTimeout: 2000, //2000ms = 2s;
  autoplayHoverPause: true,
});
</script>
<section>
  <h1>Exchange</h1>
<div class="slider owl-carousel">
  
<?php
  $sql=mysqli_query($con,"SELECT * FROM book WHERE id_user='$_SESSION[user_id]' AND statues='ex'");
  while($row=mysqli_fetch_array($sql)){

  ?>
  <div class="card">
     <div class="img">
        <img src="../../Books_upload/<?php echo$row['type'];?>" alt="">
     </div>
     <div class="content">
        <div class="title">
        <?php echo$row['nameclerk'];?>
        </div>
        <div class="sub-title">
        <?php echo$row['name'];?>
        </div>
        <p>
        <?php echo$row['dis'];?>
        </p>
        <div class="btn">
           <a href="../../asset/php/deletbook.php?rn=<?php echo$row['id'];?>"><button>DELET <i class="fa-solid fa-cart-shopping"></i></button></a>
        </div>
     </div>
  </div>
  <?php
  
}
  ?>
</div>
</section>

<script>
$(".slider").owlCarousel({
  loop: true,
  autoplay: true,
  autoplayTimeout: 2000, //2000ms = 2s;
  autoplayHoverPause: true,
});
</script>
</main>
</body>

</html>