<?php
include('../../asset/php/conn.php');
session_start();
if(isset($_POST['paid'])){
    $id_card=$_POST['idcard'];
    $id_st=$_POST['id'];
    $data=$_POST['data'];
    $code=$_POST['code'];
    $name=$_POST['name'];
    $sql=mysqli_query($con,"INSERT INTO `buy`(`id_card`, `id_st`, `data`, `code`, `name`)
     VALUES ('$id_card','$id_st','$data','$code','$name')");
             header("Location: index.php");
}