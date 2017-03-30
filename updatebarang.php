<?php
include "koneksi.php";

$kode=$_POST['kode'];
$nama=$_POST['namabarang'];
$kategori=$_POST['kategori'];
$hargabeli=$_POST['hargabeli'];
$hargajual=$_POST['hargajual'];
$stok=$_POST['stock'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];

if ($image=="") {
	$strsql = "update t_barang set nama_barang='$nama', kategori=$kategori, harga_beli=$hargabeli, harga_jual=$hargajual,stock=$stok where kd_barang='$kode'";
}
else{
	$foto=rand(100,1500)."-".$image;
	$strsql="update t_barang set nama_barang='$nama', kategori=$kategori, harga_beli=$hargabeli,harga_jual=$hargajual,stock=$stok,gambar='$foto' where kd_barang = '$kode'";
}

$query=mysql_query($strsql);

if($query){

}
else{
	echo "gagal disimpan";
}


$targetFile = "galery/".$foto;
if (move_uploaded_file($tmp_name, $targetFile)) {
	
}
else{
	echo "gagal disimpan";
}

header('location:listbarang.php');

?>