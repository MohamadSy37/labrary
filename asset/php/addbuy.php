<?php

include('conn.php');
session_start();
date_default_timezone_set('Asia/Damascus');

    $sqler=mysqli_query($con,"SELECT * FROM store WHERE iduser='$_SESSION[user_id]'");
    while($rwe=mysqli_fetch_array($sqler)){
        $sqk=mysqli_query($con,"SELECT * FROM book WHERE id='$rwe[idbook]'");
        $row=mysqli_fetch_array($sqk);

        
        $yield=mysqli_query($con,"DELETE FROM `store` WHERE id='$rwe[id]'");
  
    }


    header("Location: ../../user/users/store.php");
