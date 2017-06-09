<?php
//panggil file config.php untuk menghubung ke server
include('../inc/config.php');
 
//tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

//simpan data ke database
$query = mysql_query("INSERT INTO pengelola VALUES('', '$username', '$password')") or die(mysql_error());
 
if ($query) {
    header('location:user.php?message=success');
}
?>