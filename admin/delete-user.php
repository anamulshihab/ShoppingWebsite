<?php

include('../inc/config.php');
include('cek-login.php');

$id = $_GET['id'];
 
$query = mysql_query("delete from pengelola where id='$id'") or die(mysql_error());
 
if ($query) {
    header('location:user.php?message=delete');
}
?>