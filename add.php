<?php
$conn = new mysqli("localhost", "root", "", "try");
$conn->query("insert into tblaccount (email,name) value ('$_GET[txtemail]','$_GET[txtname]')");
header("location:account.php");
?>