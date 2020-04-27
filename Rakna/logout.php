<?php
session_start();
session_destroy();
setcookie("usercookie","",time()-1);
header('location:login.php');
?>