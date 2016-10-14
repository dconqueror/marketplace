<?php
include"../../../config/koneksi.php";
include"../../../config/fungsi_thumb.php";

$lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];
$acak           = rand(000000,999999);
$nama_file_unik = $acak.$nama_file; 


$nama_produk   = $_POST['nama_produk'];
$kategori   = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga  = $_POST['harga'];
$stok = $_POST['stok'];
$berat = $_POST['berat'];


if (!empty($lokasi_file))
{
	UploadImage($nama_file_unik);
	mysql_query("INSERT INTO produk(id_kategori,nama_produk,deskripsi,harga,stok,berat,gambar) VALUE('$kategori','$nama_produk','$deskripsi','$harga','$stok','$berat','$nama_file_unik')")or die(mysql_error());
}
else
{
	mysql_query("INSERT INTO produk(id_kategori,nama_produk,deskripsi,harga,stok,berat) VALUE('$kategori','$nama_produk','$deskripsi','$harga','$stok','$berat')")or die(mysql_error());
}

header('location:../../index.php?page=produksaya')

?>