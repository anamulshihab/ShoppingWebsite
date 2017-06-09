<?php
//panggil file config.php untuk menghubung ke server
include('../inc/config.php');

//tempat menyimpan file
$namafolder="../gambar/"; 

//tangkap data dari form
if (!empty($_FILES["gbarang"]["tmp_name"]))
{
	//tangkap data dari form
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
			//simpan data ke database
			$query = mysql_query("UPDATE barang SET nama_brg='$namaBarang', harga_brg='$hrgBarang', desc_brg='$descBarang', jml_brg='$jmlBrg', kategori='$kategoriBrg', gambar_brg='$gambar_barang' where id_brg='$kdBrg'") or die(mysql_error());
	
            if ($query) 
			{
				header('location:barang.php?message=update');
			}
        } 
		else 
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