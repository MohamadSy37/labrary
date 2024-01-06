<?php

include('conn.php');
session_start();
date_default_timezone_set('Asia/Damascus');
if(isset($_POST['rentbook'])&& isset($_FILES['file'])){

    $image_name=$_FILES['file']['name'];
    $tmp_image=$_FILES['file']['tmp_name'];
    $errorimage = $_FILES['file']['error'];
    $name=$_POST['name'];
    $clerk=$_POST['nameclerk'];
    $dis=$_POST['dis'];
    $cost=$_POST['cost'];
    $email=$_POST['email'];
    $number=$_POST['page'];
    $id=$_SESSION['user_id'];
    $time=date('h:i:s');
    $data=date('Y-m-d');
    $rent="rent";


            
            if ($errorimage === 0) {
              $fileimage_ex = pathinfo($image_name, PATHINFO_EXTENSION);
              $file_image_ex_lc = strtolower($fileimage_ex);
              $img_image_exs = array("png", 'jpg' ,'jpeg');
              if (in_array($file_image_ex_lc, $img_image_exs)) {


                $new_image_image_name = uniqid("image-", true). '.'.$file_image_ex_lc;

                $image_image_file = '../../Books_upload/'.$new_image_image_name;
                move_uploaded_file($tmp_image, $image_image_file);
                $sql=mysqli_query($con,
                "INSERT INTO `book`(`page`, `name`, `nameclerk`, `dis`, `type`, `cost`, `email`, `data`, `time`, `id_user`, `statues`)
                 VALUES ('$number','$name','$clerk','$dis','$new_image_image_name','$cost','$email','$data','$time','$id','$rent')");
      if($sql){
        header("Location: ../../user/users/addbook.php?rn=The Add Succsfull");
      }else{
        header("Location: ../../user/users/addbook.php?rn=The Add Not Succsfull");
      }
              }else{
        header("Location: ../../user/users/addbook.php?rn=The Add Not Succsfull");

              }
            }


}
