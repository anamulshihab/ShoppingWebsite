<?php //Masukkan koneksi database disini 
//$namafolder="gambar/"; //tempat menyimpan file
mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("shopdb")  or die("Gagal");
$datatamu = mysql_query("select judul_gambar,nama_file from tb_gambar order by judul_gambar asc;") or die("Gagal :".mysql_error()); 

echo '<table width="400" align="center" border="1">'; 
echo '<tr>'; 
echo '<th>Judul Gambar</th>'; 
echo '<th>Gambar</th>'; 
echo '</tr>'; 
while ($rec=mysql_fetch_object($datatamu)) 
{ 
	echo '<tr>'; 
	echo '<td>'.$rec->judul_gambar.'</td>'; 
	echo '<td>'; 
	//ini bagian memanggil file gambar 
	echo '<img src="'.$rec->nama_file.'" alt="'.$rec->judul_gambar.'" title="'.$rec->judul_gambar.'" />'; 
	echo '</td>'; 
	echo '</tr>'; 
} 
echo '</table>'; 
mysql_close();
//tutup koneksi database 
?>