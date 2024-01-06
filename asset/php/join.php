<?php
date_default_timezone_set('Asia/Damascus');
include('conn.php');
if(isset($_POST['join'])){
    $name=$_POST['fname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=md5($_POST['password']);
    $repassword=md5($_POST['repassword']);
    $gander=$_POST['gender'];
    $time=date('h:i:s');
    $data=date('Y-m-d');
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if((strlen($password)>=8)&&(strlen($username)>=5)&&(strlen($phone)>=10)){
    if(mysqli_num_rows($res) > 0){
        header("Location: ../../log/join.php?rn=The Email Used");
    }else{
        $username_check="SELECT * FROM usertable WHERE username = '$username'";
        $res_username = mysqli_query($con, $username_check);
        if(mysqli_num_rows($res_username) > 0){
            header("Location: ../../log/join.php?rn=The username Used");
        }else{
    if($password===$repassword){
        $insert="INSERT INTO `usertable`(`full_name`, `username`, `email`, `password`, `phon`, `gander`, `data`, `time`) 
        VALUES ('$name','$username','$email','$password','$phone','$gander','$data','$time')";
        $sql=mysqli_query($con,$insert);
        if($sql){
            header("Location: ../../log/join.php?rn=User registration successful");


}else{
header("Location: ../../log/join.php?rn=User not registration successful");}
    }else{
    header("Location: ../../log/join.php?rn=The Password Not corect");
    }
}
}
    }else{
        header("Location: ../../log/join.php?rn=The Password or phone or username Not enough");
    }

}