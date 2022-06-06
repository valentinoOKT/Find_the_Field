<?php
session_start();
unset($_SESSION['admin']);
echo "<script language='javascript'>alert('Terima kasih, Anda Berhasil Logout'); document.location='index.php';</script>";
?>
