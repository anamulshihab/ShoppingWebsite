<?php
//panggil file config.php untuk menghubung ke server
include('../inc/config.php');

//tempat menyimpan file
$namafolder="../gambar/"; 

//tangkap data dari form
if (!empty($_FILES["gbarang"]["tmp_name"]))
{
	$kdBrg = $_POST['kdbarang'];
	$namaBarang = $_POST['namabarang'];
	$hrgBarang = $_POST['hargabarang'];
	$descBarang = $_POST['descBrg'];
	$jmlBrg = $_POST['jmlbarang'];
    $kategoriBrg = $_POST['kategoribarang'];
	$gambar_barang = $_FILES['gbarang']['type'];
    
	if($gambar_barang == "image/jpeg" || $gambar_barang == "image/jpg" || $gambar_barang == "image/gif" || $gambar_barang == "image/x-png")
    {           
        $gambar = $namafolder . basename($_FILES['gbarang']['name']);
		       
        if (move_uploaded_file($_FILES['gbarang']['tmp_name'], $gambar)) 
		{
            echo "Gambar berhasil dikirim ".$gambar .'<a href="barang.php">lihat gambar</a>';
            $sql = "INSERT INTO barang (id_brg, nama_brg, harga_brg, desc_brg, jml_brg, kategori, gambar_brg) values ('$kdBrg', '$namaBarang', '$hrgBarang' , '$descBarang', '$jmlBrg', '$kategoriBrg', '$gambar')";
            $res = mysql_query($sql) or die (mysql_error());
			if ($res) 
			{
				header('location:barang.php?message=success');
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