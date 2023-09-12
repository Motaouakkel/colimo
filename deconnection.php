<?php
session_start();
unset($_SESSION['auth']);
session_destroy();
 echo "<script languege='javascript'>window.location.href='login.php';</script>";
?>