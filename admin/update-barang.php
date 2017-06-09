<?php
include('../inc/config.php');

$namafolder="../gambar/";

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

			$query = mysql_query("UPDATE barang SET nama_brg='$namaBarang', harga_brg='$hrgBarang', desc_brg='$descBarang', jml_brg='$jmlBrg', kategori='$kategoriBrg', gambar_brg='$gambar_barang' where id_brg='$kdBrg'") or die(mysql_error());

            if ($query)
			{
				header('location:barang.php?message=update');
			}
        }
		else
		{
           echo "failed to save image";
        }
   }
   else
   {
        echo "supported format .jpg .gif .png";
   }
}
else {
    echo "Please add picture";
}

?>
