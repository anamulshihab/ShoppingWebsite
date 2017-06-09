<?php
include('../inc/config.php');
include('cek-login.php');

$id = $_GET['id'];
 
$query = mysql_query("DELETE FROM pesan WHERE id_pesan='$id'") or die(mysql_error());
 
if ($query) {
    header('location:pesan.php?message=delete');
}
?>