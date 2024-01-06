<?php
include('../../asset/php/conn.php');
session_start();
$idbook=$_GET['rn'];

$sql=mysqli_query($con,"SELECT * FROM book WHERE id='$idbook'");
$row=mysqli_fetch_array($sql);



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
<div class="all">
    <?php
        $sqlsre=mysqli_query($con,"SELECT * FROM book WHERE id='$idbook' AND statues='ex'");
        $rweos=mysqli_fetch_array($sqlsre);
    $sqls=mysqli_query($con,"SELECT * FROM chat WHERE iduserex='$rweos[id_user]' OR idcoustamar='$_SESSION[user_id]' AND idbook='$idbook'");
    while($rwo=mysqli_fetch_array($sqls)){
        if($rwo['idcoustamar']===$_SESSION['user_id']){
    ?>
    <div class="senduser">
       <?php echo$rwo['massage'];?>
    </div>
    <?php
        }else{
    ?>
    <div class="sendowner">
    <?php echo$rwo['massage'];?>
    </div>
    <?php 
    }
    }?>
</div>
<?php
    $sqlse=mysqli_query($con,"SELECT * FROM book WHERE id='$idbook'");
    $rwos=mysqli_fetch_array($sqlse);
 
    ?>
  </div>
  </div>
  <form action="../../asset/php/chat.php" class="form_massage" method="post">
    <input type="text" name="mas" id="">

    <input type="number" name="idbook" value="<?php echo$idbook;?>" hidden id="">
    <input type="number" name="idowner" value="<?php echo$rwos['id_user'];?>" hidden  id="">
    <button for="2" name="send"><i class="fa-solid fa-paper-plane" id="icons"></i></button><!--تبديل أيقونة الشات-->
    <input type="submit" hidden id="2" name="send" value="Send">
</form>

</main>
</body>

</html>