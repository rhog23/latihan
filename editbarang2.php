<!DOCTYPE html>
<html>
<head>
	<title>Form Edit Barang</title>
</head>
<?php 
	include "koneksi.php";
	$kode=$_GET['kode'];
	$query=mysql_query("select * from t_barang where kd_barang='$kode'");
?>

<body>
<div id="layer1">
	<table width="969" border="1" cellpadding="0" cellspacing="1">
		<tr bgcolor="#CC9966">
			<td width="56">Kode</td>
			<td width="236">Nama</td>
			<td width="100">Kategori</td>
			<td width="84">Harga Beli</td>
			<td width="99">Harga Jual</td>
			<td width="55">Gambar</td>
			<td width="59">Stok</td>
		</tr>

		<?php
			$strsql="select t_barang.*,t_kategori.kat_nama as kategori from t_barang, t_kategori where kd_barang='$kode' and t_kategori.kat_id=t_barang.kategori";
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
				</tr>
			<?php }
		?>
	</table>
	</div>

<form action="updatebarang.php" method="post" enctype="multipart/form-data">
<table border="0">
<?php
while($row=mysql_fetch_array($query)){
?>
<h2>Data Barang</h2>
<table>
	<tr>
		<td>Kode Barang</td>
		<td>: <input type="text" name="kode" value="<?php echo $row['kd_barang'];?>" size="10" readonly></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>: <input type="text" name="namabarang" value="<?php echo $row['nama_barang'];?>"size="30"></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>: 
			<select name="kategori">
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
		<td>: <input type="text" name="hargabeli" value="<?php echo $row['harga_beli'];?>" size="20"></td>
	</tr>
	<tr>
		<td>Harga Jual</td>
		<td>: <input type="text" name="hargajual" value="<?php echo $row['harga_jual'];?>" size="20"></td>
	</tr>
	<tr>
		<td>Stock</td>
		<td>: <input type="text" name="stock" value="<?php echo $row['stock'];?>" size="20"></td>
	</tr>
	<tr>
		<td>Gambar</td>
		<td>: <input type="file" name="image"></td>
	</tr>
	
	<tr>
		<td colspan=2><input type="submit" value="Update"> <input type="reset" name="Reset"></td>
	</tr>
<?php } ?>
</table>
</form>
</body>
</html>