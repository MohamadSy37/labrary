
<?php

error_reporting(0);
$error=$_GET['rn'];
if($error!=null){
  echo"<script>alert('".$error.".');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link css-->
    <link rel="stylesheet" href="asset/style/style.css">
    <!--link fontawesoe-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <title>Welcome</title>
</head>
<body>
    
<nav class="navbar">
    <div class="content">
              <div class="logo"><a href="index.html"><img src="asset/image/logo.jpg" alt=""></a></div>
          <ul class="menu-list">
            <div class="icon cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <li><a href="index.html">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#Services">Services</a></li>
                <li><a href="#Contact">Contact</a></li>
          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
      </nav>
          <div class="banner">
            <a href="log/login.php" target="_blank"><button class="logbtn">Login</button></a>
            <a href="log/join.php" target="_blank"><button class="joinbtn">Register</button></a>
          </div>
          <!--serviec-->
          
<div class="Serviece">
    <div class="serviece_left" id="about"><h1>ABM LIBRARY</h1>
    <p>The ABM Library website is the first site in the Kingdom of Saudi Arabia that provides a service for selling, renting, or exchanging books and novels, as well as university books.
It is used by booksellers where they can offer a book for sale, offer a book for rent, or exchange books.<br>
e site offers many used books that are in good condition, as well as many sellers.
       <br> <a href="#Contact"><button>About us</button></a>
    </p>
     
    </div>
    <div class="serviece_right">
        <div class="serviece_info">
        <center>
          <div class="ico"><i class="fa-solid fa-cart-shopping"></i></div></center>
        <h3>BUY BOOKS</h3>
    </div>

    <div class="serviece_info">
    <center>
    <div class="ico"><i class="fa-solid fa-hand-holding-dollar"></i></div></center>
    <h3>SELL BOOKS</h3>
    </div>

    <div class="serviece_info">
    <center>
      <div class="ico"><i class="fa-solid fa-handshake-simple"></i></div></center>
    <h3>RENT BOOKS</h3>
    </div>

    <div class="serviece_info">
    <center>
      <div class="ico"><i class="fa-solid fa-right-left"></i></div></center>
    <h3>EXCHANGE BOOKS</h3>
    </div>

    </div>
    </div>

    
  <section class='about' id="about">
    <div class="slider owl-carousel">
      <div class="card">
         <div class="img">
            <img src="asset/image/book1.jpg" alt="">
         </div>
         <div class="content">
            <div class="title">
               مارك مانسون
            </div>
            <div class="sub-title">
               فن اللامبالاة
            </div>
            <p>الكتاب يتحدث عن أن الانسان لا يجب بالضرورة أن يكون إيجابياً طوال الوقت وأن المفتاح إلى بشر أكثر قوة وسعادة كامن في ...
            </p>
            <div class="btn">
               <button>Buy <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="img">
            <img src="asset/image/book2.jpg" alt="">
         </div>
         <div class="content">
            <div class="title">
               نيل بافيت
            </div>
            <div class="sub-title">
               اختراق المخ 
            </div>
            <p>
               نصائح وحيل لإطلاق إمكانات مخك الكاملة
            </p>
            <div class="btn">
               <button>Buy <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
         </div>
      </div>
  
      <div class="card">
         <div class="img">
            <img src="asset/image/book3.jpg" alt="">
         </div>
         <div class="content">
            <div class="title">
               ادورد برجر
            </div>
            <div class="sub-title">
               كون عقلك
            </div>
            <p>
            التفكير بفعالية من خلال حل لغز البزل الإبداعي
            </p>
            <div class="btn">
               <button>Buy <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
         </div>
      </div>
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
   

<!--conaction-->
<div class="con">
    <div class="main-content" id="Contact">
      <div class="left box">
        <h2>About us</h2>
        <div class="content">
          <p> The ABM Library website is the first site in the Kingdom of Saudi Arabia that provides a service for selling, renting, or exchanging books and novels, as well as university books.
It is used by booksellers where they can offer a book for sale, offer a book for rent, or exchange books.<br>
e site offers many used books that are in good condition, as well as many sellers.</p>
          <div class="social">
            <a href=""><span class="fab fa-facebook-f"></span></a>
            <a href=""><span class="fab fa-twitter"></span></a>
            <a href=""><span class="fab fa-instagram"></span></a>
            <a href=""><span class="fab fa-youtube"></span></a>
          </div>
        </div>
      </div>
  
      <div class="center box">
        <h2>Address</h2>
        <div class="content">
          <div class="place">
            <span class="fas fa-map-marker-alt"></span>
            <span class="text">KSA, JED</span>
          </div>
          <div class="phone">
            <span class="fas fa-phone-alt"></span>
            <span class="text">+112-1111222</span>
          </div>
          <div class="email">
            <span class="fas fa-envelope"></span>
            <span class="text">abc@example.com</span>
          </div>
        </div>
      </div>
  
      <div class="right box">
        <h2>Contact us</h2>
        <div class="content">
          <form method="POST" action="asset/php/massage.php">
            <div class="email">
              <div class="text">Email *</div>
              <input type="email" name="email" required>
            </div>
            <div class="msg">
              <div class="text">Message *</div>
              <textarea rows="2" name="massage" cols="25"  required></textarea>
            </div>
            <div class="btn">
              <input class="send" name="send" type="submit" value="Send" >
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bottom">
      <center>
        <span class="credit">Created By ABM LIBRARY | </span>
        <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
      </center>
    </div>
  </footer>
  </div>
         <script src="asset/script/script.js"></script>
</body>
</html>