<?php
include"../../../config/koneksi.php";

$nama_produk   = $_POST['nama_produk'];
$kategori   = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga  = $_POST['harga'];
$stok = $_POST['stok'];
$berat = $_POST['berat'];
$gbr = 'sample.jpg';

mysql_query("INSERT INTO produk(id_kategori,nama_produk,deskripsi,harga,stok,berat,gambar)
VALUE('$kategori','$nama_produk','$deskripsi','$harga','$stok','$berat','$gbr')")or die(mysql_error());

header('location:../../index.php?page=produksaya')

?>