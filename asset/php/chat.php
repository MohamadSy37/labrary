
<?php
include('conn.php');
session_start();
if(isset($_POST['send'])){
    $massage=$_POST['mas'];
    $idowner=$_POST['idowner'];
    $idbook=$_POST['idbook'];
    $sql=mysqli_query($con,"INSERT INTO `chat`(`iduserex`, `idcoustamar`, `idbook`, `massage`) 
    VALUES ('$idowner','$_SESSION[user_id]','$idbook','$massage')");
        $check_email="SELECT * FROM massage_id where iduser='$_SESSION[user_id]' AND idowner='$idowner'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
        }else{
        $sqlr=mysqli_query($con,"INSERT INTO `massage_id`(`idowner`, `iduser`, `idbook`) 
        VALUES ('$idowner','$_SESSION[user_id]','$idbook')");}
            header("Location: ../../user/users/chat.php?rn=$idbook");
}