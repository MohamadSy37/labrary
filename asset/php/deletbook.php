<?php
include('conn.php');
session_start();
$id=$_GET['rn'];
$sql=mysqli_query($con,"DELETE FROM `book` WHERE `id`='$id'");
if($sql){
    header("Location: ../../user/users/edit.php?rn=The Book Delet");
}else{
    header("Location: ../../user/users/edit.php?rn=The Book Not Delet");
}