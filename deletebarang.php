<?php

include "koneksi.php";

mysql_query("delete from t_barang where kd_barang='$_GET[kode]'");

header('location:listbarang.php');

?>