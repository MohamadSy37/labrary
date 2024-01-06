<?php
include('../../asset/php/conn.php');
session_start();
$iduser=$_SESSION['user_id'];
$idbook=$_GET['rn'];
$sql=mysqli_query($con,"INSERT INTO `store`(`iduser`, `idbook`) 
VALUES ('$iduser','$idbook')");
if($sql){
    header("Location: ../../user/users/index.php");
}else{
    header("Location: ../../user/users/index.php");

}