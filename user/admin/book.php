<?php
include('../../asset/php/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="../../asset/style/styleadmin.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">ABM</span>
    </div>
      <ul class="nav-links">

        <li>
          <a href="book.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Book</span>
          </a>
        </li>
        <li>
          <a href="Order_Book.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order Book</span>
          </a>
        </li>
        <li>
          <a href="user.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">user</span>
          </a>
        </li>
        <li>
          <a href="massage.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="seting.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../../log/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="profile-details">
      <?php
            $sql=mysqli_query($con,"SELECT * FROM `usertable` WHERE `id`='$_SESSION[user_id]'");
            $row = mysqli_fetch_array($sql);
            if($row['img']===""){
                echo'<img src="../../asset/image/images_user/user.png" alt="" srcset="">';
            }else{
                ?><img src="../../image_profil/<?php echo$row['img'];?>" alt="" srcset=""><?php
            }

            ?>
        <span class="admin_name"><?php echo$_SESSION['user_name'];?></span>


      </div>
    </nav>
    <style>
  .home-content .sales-boxes .recent-sales{
  width: 100%;
  background: #fff;
  padding: 20px 30px;
  margin: 0 20px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}
</style>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total User</div>
            <div class="number">
                                      <?php

$sqli="SELECT COUNT(*) as total FROM usertable WHERE id!='$_SESSION[user_id]'";
$ss=mysqli_query($con,$sqli);
$ff=mysqli_fetch_assoc($ss);
 echo $ff['total'];

?>
</div>
          </div>

          <i class="fa-regular fa-user cart"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Book</div>
            <div class="number">
            <?php

$sqli="SELECT COUNT(*) as total FROM book WHERE 1";
$ss=mysqli_query($con,$sqli);
$ff=mysqli_fetch_assoc($ss);
 echo $ff['total'];

?>
            </div>
          </div>
          <i class="fa-solid fa-book cart two"></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Book buy</div>
            <div class="number">
            <?php

$sqli="SELECT COUNT(*) as total FROM buy WHERE 1";
$ss=mysqli_query($con,$sqli);
$ff=mysqli_fetch_assoc($ss);
 echo $ff['total'];

?>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Book Processing</div>
            <div class="number">
            <?php

$sqli="SELECT COUNT(*) as total FROM rent WHERE 1";
$ss=mysqli_query($con,$sqli);
$ff=mysqli_fetch_assoc($ss);
 echo $ff['total'];

?>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">user</li>
              <?php
            $sql=mysqli_query($con,"SELECT * FROM `book` WHERE 1");
            while($result=mysqli_fetch_array($sql)){
            ?>
              <li><a href="#"><?php echo$result['nameclerk'];?></a></li>
              <?php
            }?>
            </ul>
            <ul class="details">
            <li class="topic">name book</li>
            <?php
            $sql=mysqli_query($con,"SELECT * FROM `book` WHERE 1");
            while($result=mysqli_fetch_array($sql)){
            ?>
              <li><a href="#"><?php echo$result['name'];?></a></li>
              <?php
            }?>
          </ul>
          <ul class="details">
            <li class="topic">Total</li>
            <?php
            $sql=mysqli_query($con,"SELECT * FROM `book` WHERE 1");
            while($result=mysqli_fetch_array($sql)){
            ?>
              <li><a href="#"><?php echo$result['cost'];?></a></li>
              <?php
            }?>
          </ul>
          <ul class="details">
            <li class="topic">operition</li>
            <?php
            $sql=mysqli_query($con,"SELECT * FROM `book` WHERE 1");
            while($result=mysqli_fetch_array($sql)){
            ?>
            <li><a href="#"><?php echo$result['statues'];?></a></li>
            <?php
            }?>
          </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

 <script src="../../asset/script/scriptadmin.js"></script>

</body>
</html>
