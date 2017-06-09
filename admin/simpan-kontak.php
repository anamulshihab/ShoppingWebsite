<?php
//panggil file config.php untuk menghubung ke server
include('../inc/config.php');
 
//tangkap data dari form
$deskripsi = $_POST['desc'];

//simpan data ke database
$query = mysql_query("UPDATE pagekontak SET deskripsi='$deskripsi'") or die(mysql_error());
 
if ($query) {
    header('location:kontak.php');
}
?>