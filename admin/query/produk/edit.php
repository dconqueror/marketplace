<?php
include"../../../config/koneksi.php";

$gbr = 'sample.jpg';

mysql_query("UPDATE produk SET id_kategori = '$_POST[kategori]',
							   nama_produk = '$_POST[nama_produk]',
							     deskripsi = '$_POST[deskripsi]',
									satuan = '$_POST[jenis]',
								     harga = '$_POST[harga]',
									  stok = '$_POST[stok]',
									 berat = '$_POST[berat]',
									gambar = '$gbr'
						   WHERE id_produk = '$_POST[id]'");
						   
header('location:../../index.php?page=produksaya')

?>