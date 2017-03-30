<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
</head>
<?php 
include "koneksi.php";
$kode=$_GET['kode'];
$query=mysql_query("select * from t_barang where kd_barang='$kode'");
?>
<body>
<div id="layer1">
<form action="updatebarang.php" method="post">
	<table width="969" border="1" cellpadding="0" cellspacing="1">
		<tr bgcolor="#CC9966">
			<td width="56">Kode</td>
			<td width="236">Nama</td>
			<td width="84">Harga Beli</td>
			<td width="99">Harga Jual</td>
			<td width="59">Stok</td>
			<td width="100">Kategori</td>
			<td width="55">Gambar</td>
			
		</tr>

		<?php
			$strsql="select t_barang.*,t_kategori.kat_nama as kategori from t_barang, t_kategori where kd_barang = $kode and t_kategori.kat_id=t_barang.kategori";
			$hasil=mysql_query($strsql);
			while ($data=mysql_fetch_array($hasil)){
			?>
				<tr>
					<td><input type="text" name="txtkode" value="<?php echo $data['kd_barang']; ?>" readonly></td>
					<td><input type="text" name="txtnama" value="<?php echo $data['nama_barang']; ?>"></td>
					<td><input type="text" name="txthargabeli" value="<?php echo $data['harga_beli']; ?>"></td>
					<td><input type="text" name="txthargajual" value="<?php echo $data['harga_jual']; ?>"></td>
					<td><input type="text" name="txtstok" value="<?php echo $data['stock']; ?>"></td>
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
					<td>
						<div align="center"><img src=<?php if($data['gambar']!=NULL){$gambar=$data['gambar'];} else {$gambar='gambar/nofoto.jpg';} echo "galery/".$gambar; ?> width="60" heigth="60">
						</div>
						<input type="file" name="file" size="25">
					</td>
					
				</tr>
			<?php }
		?>
		<tr>
			<td align="center" colspan="7"><input type="submit" name="submit" value="Update"></td>
		</tr>

	</table>
</form>
</div>

</body>
</html>