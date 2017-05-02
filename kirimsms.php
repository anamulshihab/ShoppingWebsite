<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">

<label>No HP Format +62xxxxxxx </label>

<input type="text" name="nohp">

<label>Write us</label>

<input type="text" name="pesan">

<input type="submit" name="button" value="Kirim">

</form>

<?php

if(isset($_POST['button']))

{

    mysql_connect("localhost","root","");

    mysql_select_db("sms"); 

    $query=mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES ('".$_POST['nohp']."', '".$_POST['pesan']."')");

    if($query)

    {
        echo "<script>alert('Sukses kirim sms')</script>";
    }

}

?>
</body>
</html>