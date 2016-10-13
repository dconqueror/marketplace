<?php
include"../../../config/koneksi.php";

$nama_produk   = $_POST['nama_produk'];
$kategori   = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$jns	= $_POST['jenis'];
$harga  = $_POST['harga'];
$stok = $_POST['stok'];
$berat = $_POST['berat'];
$gbr = 'sample.jpg';

mysql_query("INSERT INTO produk(id_kategori,nama_produk,deskripsi,satuan,harga,stok,berat,gambar)
VALUE('$kategori','$nama_produk','$deskripsi','$jns','$harga','$stok','$berat','$gbr')")or die(mysql_error());

header('location:../../index.php?page=produksaya')

?>