<?php
$namafolder="../gambar/"; //tempat menyimpan file
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("shopdb")  or die("Gagal");

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['nama_file']['type'];
    $judul_gambar=$_POST['judul_gambar'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
    {           
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);       
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            echo "Gambar berhasil dikirim ".$gambar .'<a href="gallery.php">lihat gambar</a>';
            $sql="insert into tb_gambar (judul_gambar,nama_file) values ('$judul_gambar','$gambar')";
            $res=mysql_query($sql) or die (mysql_error());
        } else {
           echo "Gambar gagal dikirim";
        }
   } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
    echo "Anda belum memilih gambar";
}
?>