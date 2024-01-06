<?php

session_start();
session_unset();
session_write_close();
session_destroy();
header("location: login.php?rn=Signed out successfully");


?>
