<?php
//panggil file config.php untuk menghubung ke server
include('../inc/config.php');

//tempat menyimpan file
$namafolder="../gambar-slide/"; 

//tangkap data dari form
if (!empty($_FILES["gbarang"]["tmp_name"]))
{
	$gambar_barang = $_FILES['gbarang']['type'];
    
	if($gambar_barang == "image/jpeg" || $gambar_barang == "image/jpg" || $gambar_barang == "image/gif" || $gambar_barang == "image/x-png")
    {           
        $gambar = $namafolder . basename($_FILES['gbarang']['name']);
		       
        if (move_uploaded_file($_FILES['gbarang']['tmp_name'], $gambar)) 
		{
            $sql = "INSERT INTO slider (id, gambar) values ('', '$gambar')";
            $res = mysql_query($sql) or die (mysql_error());
			if ($res) 
			{
				header('location:slide.php?message=success');
			}

        } else 
		{
           echo "Gambar gagal dikirim";
        }
   } 
   else 
   {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} 
else {
    echo "Anda belum memilih gambar";
}

?>