<?php
include('conn.php');
date_default_timezone_set('Asia/Damascus');
if(isset($_POST['send'])){
    $email=$_POST['email'];
    $massage=$_POST['massage'];
    $time=date('h:i:s');
    $data=date('Y-m-d');
    $sql=mysqli_query($con,"INSERT INTO `massage`(`email`, `massage`, `data`, `time`)
     VALUES ('$email','$massage','$data','$time')");
     if($sql){
        header("Location: ../../index.php?rn=Send massage succfull");
     }else{
        header("Location: ../../index.php?rn=Send massage Not succfull");

     }
}