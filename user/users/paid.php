<?php
include('../../asset/php/conn.php');
session_start();
if(isset($_POST['yes'])){
    $a=1;
    $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
    while($elments=mysqli_fetch_array($sqler)){
            $id[$a]=$_POST['id'.$elments['id']];
$a++;
        }
        $sqleer=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
        $eelments=mysqli_fetch_array($sqleer);
        $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");

        
}
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
    <style>
        body{
            background: #dcdcdc;
        }
        .countes{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #dcdcdc;
        }
        form{
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;             
            background: #fff;
            border-radius: 15px;
            width: 40%;
            height: 400px;
        }
        input{
            background: #dcdcdc;
            color: #000;
            padding: 8px;
            text-align: center;
            border-radius: 12px;
            margin-top: 10px;
        }
        .wid{
            width: 370px;
        }
        .view{
            border-radius: 15px;
        padding: 9px;
        cursor: pointer;
        transition: .9s all;
        background: rgb(12, 148, 0);
        color: #dcdcdc;
    }

    </style>
    <div class="countes">
        <form action="piad_data.php" method="post">
            <h3>Paid</h3>
            <?php
            $i=1;
            $sqleert=mysqli_query($con,"SELECT * FROM rent WHERE 1");
            while($elmentst=mysqli_fetch_array($sqleert)){
                if($elmentst['id_stor']===$id[$i]){
                    ?>
                    <input type="number" name="id" hidden value="<?php echo$elmentst['id'];?>" id="">
                    <?php
                }else{
                    $i++;
                }
            }
            ?>
    <input type="number" name="idcard" placeholder="ID CARD*" require id="" class="wid">
    <div class="inot">

        <input type="text" name="data" placeholder="Expiration data*" require  name="" id="">
        <input type="text" name="code" placeholder="Security code*" require name="" id="">
    </div>
        <input type="text" name="name" placeholder="Name on card*" id="" require class="wid">
        <input type="submit" name="paid" class="view" value="paid">
        </form>
    </div>
</main>
</body>
</html>