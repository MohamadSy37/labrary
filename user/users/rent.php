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
  <section>
      <h1>Rent</h1>
      <center><a href="addrent.php"><button class="btn">add book</button></a></center>
    <div class="slider owl-carousel">
      
    <?php
      $sql=mysqli_query($con,"SELECT * FROM book WHERE id_user!='$_SESSION[user_id]' AND statues='rent'");
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
               <a href="addstor.php?rn=<?php echo$row['id'];?>"><button>Add <i class="fa-solid fa-cart-shopping"></i></button></a>
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

    


  </div>
</main>
</body>

</html>