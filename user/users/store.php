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
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        

            
        <?php
        $sum=0;
            $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
            while($rwe=mysqli_fetch_array($sqler)){
                $sqk=mysqli_query($con,"SELECT * FROM book WHERE id='$rwe[idbook]'");
                $row=mysqli_fetch_array($sqk);
                
                $sum=$sum+$row['cost'];
        ?>
            <div class="box_contiener">
            <div class="box_img">
                <img src="../../Books_upload/<?php echo$row['type'];?>" alt="">
                <p><?php echo$row['dis'];?></p>
            </div>
            <div class="infoowner">
                <h1><?php echo$row['nameclerk'];?></h1>
                <h4><?php echo$row['name'];?></h4>
                <small> <?php echo$row['cost']." SAR";
                if($row['statues']==="rent"){
                    echo" SAR  For The day";
                }
                ?></small><br>
                <small class="bookspage"> <?php echo$row['page'];?></small>


            </div>
            <div class="del">
                <a href="deletstor.php?rn=<?php echo$rwe['id'];?>"><button>DELETE</button></a>
               
            </div>
        </div>
        <?php

            }?>
            <style>
                .sum{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }
            </style>
            <form action="" method="post">
            <div class="sum">
                <?php
                $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
                 while($elments=mysqli_fetch_array($sqler)){
                    $sqkr=mysqli_query($con,"SELECT * FROM book WHERE id='$elments[idbook]'");
                    $rowes=mysqli_fetch_array($sqkr);
                    if($rowes['statues']==="rent"){
                 ?><label for="<?php echo$elments['id'];?>">Day rent <?php echo$rowes['name'];?></label>
                <input type="number" name="<?php echo$elments['id'];?>" id="<?php echo$elments['id'];?>">
                <?php
                    }
                }
                ?>
            </div>

        <center><input name="send" type="submit" value="calculate" class="btn"></center>
        </form>
        <?php
        $ave=0;
            if(isset($_POST['send'])){
                $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
                while($elments=mysqli_fetch_array($sqler)){
                    $sqkr=mysqli_query($con,"SELECT * FROM book WHERE id='$elments[idbook]'");
                    $rowes=mysqli_fetch_array($sqkr);
                    if($rowes['statues']==="rent"){
                    $day=$elments['id'];
                    $forday=$_POST["$day"];
                    $cost=$rowes['cost']*$forday;

                    $rentsql=mysqli_query($con,"INSERT INTO `rent`(`iduser`, `idbook`, `day`, `cost`, `id_stor`) 
                    VALUES ('$_SESSION[user_id]','$elments[idbook]','$forday','$cost','$elments[id]')");
                }else{
                    $forday="";
                        $cost=$rowes['cost'];

                    $rentsql=mysqli_query($con,"INSERT INTO `rent`(`iduser`, `idbook`, `day`, `cost`, `id_stor`) 
                    VALUES ('$_SESSION[user_id]','$elments[idbook]','$forday','$cost','$elments[id]')");

                  $ave=$ave+$cost;
                } 
            }
                echo"<center>The sum is ".$ave."SAR</center>";
                ?>
        <form action="paid.php" method="POST">
<?php
        $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
        while($elments=mysqli_fetch_array($sqler)){
            $sqkr=mysqli_query($con,"SELECT * FROM book WHERE id='$elments[idbook]'");
            $rowes=mysqli_fetch_array($sqkr);
            if($rowes['statues']==="rent"){
            $day=$elments['id'];
            $forday=$_POST["$day"];
            }else{
                $forday="";
            }
            ?>
            <input type="number" value="<?php echo$elments['id'];?>" name="id<?php echo$elments['id'];?>" hidden id="">
            <?php
        }
?>
            <center><input type="submit" value="Paid" class="btn"  name="yes"></center>

        </form>


<?php
            }
        ?>
    </div>
</main>
</body>

</html>