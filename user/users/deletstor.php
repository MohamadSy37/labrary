<?php
include('../../asset/php/conn.php');
session_start();
$id=$_GET['rn'];
$yield=mysqli_query($con,"DELETE FROM `store` WHERE id='$id'");
header("Location: ../../user/users/store.php");
?>