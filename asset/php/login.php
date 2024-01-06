<?php
session_start();
include('conn.php');
if(isset($_POST['log'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $check_email="SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_array($res);
        if($password===$row['password']){
            if($row['type']==="admin"){
                $_SESSION['user_name']=$row['full_name'];
                $_SESSION['user_id']=$row['id'];
                $_SESSION['user_img']=$row['img'];
            header("Location: ../../user/admin/book.php");
            }else{
                
                $_SESSION['user_name']=$row['full_name'];
                $_SESSION['user_id']=$row['id'];
                $_SESSION['user_img']=$row['img'];
            header("Location: ../../user/users/index.php");

            }
        }else{
            header("Location: ../../log/login.php?rn=The Password Not corect");
        }
    }else{
        header("Location: ../../log/login.php?rn=The Email Not Used");
    }
}