<?php
session_start();
session_destroy();
echo "<script>alert('Logout Berhasil'); document.location='../admin_login.php';</script>";
 ?>
