<?php
include "koneksi.php";

$kode=$_POST['txtkode'];
$nama=$_POST['txtnama'];
$kategori=$_POST['txtkategori'];
$hargabeli=$_POST['txthargabeli'];
$hargajual=$_POST['txthargajual'];
$stok=$_POST['txtstok'];
$file=$_FILES['txtfile']['name'];
$file_tmp=$_FILES['txtfile']['tmp_name'];
$foto=rand(100,1500)."-".$file;
$tglinput=date('Y-m-d h:i:s');

$strsql="insert into t_barang(kd_barang,nama_barang,kategori,harga_beli,harga_jual,stock,gambar,tanggal)"."values('$kode','$nama',$kategori,$hargabeli,$hargajual,$stok,'$foto','$tglinput')";
$query=mysql_query($strsql);

if($query){

}
else{
	echo "gagal disimpan";
}

$targetFile = "galery/".$foto;
if (move_uploaded_file($file_tmp, $targetFile)) {
	
}
else{
	echo "gagal disimpan";
}

header('location:listbarang.php');

?>