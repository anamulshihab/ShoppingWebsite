<?php
include('../inc/config.php');
include('cek-login.php');

$id = $_GET['id'];
 
$query = mysql_query("delete from barang where id_brg='$id'") or die(mysql_error());
 
if ($query) {
    header('location:barang.php?message=delete');
}
?>