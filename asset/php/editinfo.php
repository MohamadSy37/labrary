<?php
include('conn.php');
session_start();

if(isset($_POST['send'])&& isset($_FILES['file'])){
    $sql=mysqli_query($con,"SELECT * FROM `usertable` WHERE `id`='$_SESSION[user_id]'");

$row = mysqli_fetch_array($sql);
    $file_name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $name="";
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phon=$_POST['phone'];
    if($name===""){
        $name=$row['full_name'];

    }
    
    if($file_name===""){
        $file_name=$row['img'];
    }
    if($uname===""){
        $uname=$row['username'];
    }
    if($email===""){
        $email=$row['email'];
    }else{
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            header("Location: ../../user/users/edit.php?rn=The Email Used");
        }
    }
    if($password===""){
        $password=$row['password'];
    }else{
        if(strlen($password)<8){
            header("Location: ../../user/users/edit.php?rn=The Password Not enough");
        }
    }
    if($phon===""){
        $phon=$row['phon'];
    }else{
        if(strlen($phon)>=10){
            header("Location: ../../user/users/edit.php?rn=The Phon Not enough"); 
        }
    }

    if ($error === 0) {
        $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);
        
        $img_exs = array("png",'jpg','jpeg');
       
        if (in_array($file_ex_lc, $img_exs)) {
                
            $new_image_name = uniqid("image-", true). '.'.$file_ex_lc;
            $image_file = '../../image_profil/'.$new_image_name;
            move_uploaded_file($tmp_name, $image_file);
            $sqql=mysqli_query($con,"UPDATE `usertable` SET 
            `full_name`='$file_name',
            `username`='$email',
            `email`='$email',
            `password`='$password',
            `phon`='$phon',
            `img`='$new_image_name' WHERE `id`='$_SESSION[user_id]'");

    if($sqql){
        header("Location: ../../user/users/edit.php?rn=update succfull");

    }else{
        header("Location: ../../user/users/edit.php?rn=update not succfull");
    }

}else{
    header("Location: ../../user/users/edit.php?rn=Please upload png or jpg or jpeg");
}
    }else{

    header("Location: ../../user/users/edit.php?rn=Please upload png or jpg or jpeg");}
}

if(isset($_POST['admin'])&& isset($_FILES['file'])){
    $sql=mysqli_query($con,"SELECT * FROM `usertable` WHERE `id`='$_SESSION[user_id]'");

$row = mysqli_fetch_array($sql);
    $file_name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $uname=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phon=$_POST['phone'];

    
    if($file_name===""){
        $file_name=$row['img'];
    }
    if($uname===""){
        $uname=$row['username'];
    }
    if($email===""){
        $email=$row['email'];
    }else{
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            header("Location: ../../user/admin/seting.php?rn=The Email Used");
        }
    }
    if($password===""){
        $password=$row['password'];
    }else{
        if(strlen($password)<8){
            header("Location: ../../user/admin/seting.php?rn=The Password Not enough");
        }
    }
    if($phon===""){
        $phon=$row['phon'];
    }else{
        if(strlen($phon)>=10){
            header("Location: ../../user/admin/seting.php?rn=The Phon Not enough"); 
        }
    }

    if ($error === 0) {
        $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_ex_lc = strtolower($file_ex);
        
        $img_exs = array("png",'jpg','jpeg');
       
        if (in_array($file_ex_lc, $img_exs)) {
                
            $new_image_name = uniqid("image-", true). '.'.$file_ex_lc;
            $image_file = '../../image_profil/'.$new_image_name;
            move_uploaded_file($tmp_name, $image_file);
            $sqql=mysqli_query($con,"UPDATE `usertable` SET 
            `full_name`='$file_name',
            `username`='$email',
            `email`='$email',
            `password`='$password',
            `phon`='$phon',
            `img`='$new_image_name' WHERE `id`='$_SESSION[user_id]'");

    if($sqql){
        header("Location: ../../user/admin/seting.php?rn=update succfull");

    }else{
        header("Location: ../../user/admin/seting.php?rn=update not succfull");
    }

}else{
    header("Location: ../../user/admin/seting.php?rn=Please upload png or jpg or jpeg");
}
    }else{

    header("Location: ../../user/admin/seting.php?rn=Please upload png or jpg or jpeg");}
}
