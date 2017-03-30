<!DOCTYPE html>
<html>
<head>
	<title>List Barang</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
	include "koneksi.php";
?>
<body>
	<nav>
		<a href="#" id="menu-icon"></a> <!--untuk masukkin menu burger-->
			<ul class="navmenu">
				<li><a href="#">Login</a></li>
			</ul>
	</nav>

<div class="form">	
	<form action="simpanbarang.php" method="post" enctype="multipart/form-data">
		<table border="0" width="600">
			<tr>
				<td width="120">Kode Barang</td>
				<td><input type="text" name="txtkode" size="6" maxlength="6"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="txtnama" size="25"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select name="txtkategori">
					<?php 
						$strsql="select * from t_kategori";
						//lakukan query sql
						$hasil=mysql_query($strsql);
						//=konversi hasil query kedalam baris array
						while ($data=mysql_fetch_array($hasil)){ ?>
							<option value=<?php echo $data['kat_id']; ?>>
								<?php echo $data['kat_nama'];?>
							</option>
							<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Harga Beli</td>
				<td><input type="text" name="txthargabeli" size="20" value="0"></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td><input type="text" name="txthargajual" size="20" value="0"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" name="txtstok" size="5" value="0"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input type="file" name="txtfile" size="25"></td>
			</tr>
			<tr>
				<td></td>
				<td>
				<input type="submit" name="submit" value="Simpan">
				<input type="reset" name="reset" value="Batal">
				</td>
			</tr>
		</table>
	</form>
</div>
	<br>
<!--Untuk menampilkan listbarang dari database-->
<div id="layer1" style="position: none; left: 8px; top: 470px; width: 996px; height: 500px; z-index: 1; overflow: auto;">
	<table width="969" border="1" cellpadding="0" cellspacing="1">
		<tr bgcolor="#CC9966">
			<td width="56">Kode</td>
			<td width="236">Nama</td>
			<td width="100">Kategori</td>
			<td width="84">Harga Beli</td>
			<td width="99">Harga Jual</td>
			<td width="55">Gambar</td>
			<td width="59">Stok</td>
			<td width="86">Ubah/Hapus</td>
		</tr>

		<?php
			$strsql="select t_barang.*,t_kategori.kat_nama as kategori from t_barang, t_kategori where t_kategori.kat_id=t_barang.kategori";
			$hasil=mysql_query($strsql);
			while ($data=mysql_fetch_array($hasil)){
			?>
				<tr>
					<td><?php echo $data['kd_barang']; ?></td>
					<td><?php echo $data['nama_barang']; ?></td>
					<td><?php echo $data['kategori']; ?></td>
					<td><?php echo $data['harga_beli']; ?></td>
					<td><?php echo $data['harga_jual']; ?></td>
					<td>
						<div align="center"><img src=<?php if($data['gambar']!=NULL){$gambar=$data['gambar'];} else {$gambar='nofoto.jpg';} echo "galery/".$gambar; ?> width="60" heigth="60">
						</div>
					</td>
					<td><?php echo $data['stock']; ?></td>
					<td><div align="center">
						<a href="editbarang2.php?kode=<?php echo $data['kd_barang']; ?>">
						<img src="edit.png" width="25" height="25"></a> / 
						<a href="deletebarang.php?kode=<?php echo $data['kd_barang']; ?>">
						<img src="hapus.png" width="25" height="25"></a>
					</div></td>
				</tr>
			<?php }
		?>
	</table>
	</div>
	<br>
	<br>
	<footer>
		
	</footer>
</body>
</html>