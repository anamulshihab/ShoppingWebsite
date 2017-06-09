<?php
include('../inc/config.php');
include('cek-login.php');

$id = $_GET['id'];
 
$query = mysql_query("DELETE FROM pembeli WHERE id_pembeli='$id'") or die(mysql_error());
 
if ($query) {
    header('location:pembeli.php?message=delete');
}
?>