<?php
include"../../../config/koneksi.php";
include"../../../config/fungsi_thumb.php";
include"../../../config/slug.php";

$lokasi_file    = $_FILES['fupload']['tmp_name'];
$tipe_file      = $_FILES['fupload']['type'];
$nama_file      = $_FILES['fupload']['name'];
$acak           = rand(000000,999999);
$nama_file_unik = $acak.$nama_file; 

$produk_owner = 1;
$nama_produk   = $_POST['nama_produk'];
$slug = slug_replace($nama_produk);
$kategori   = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$harga  = $_POST['harga'];
$satuan  = $_POST['satuan'];
$stok = $_POST['stok'];
$berat = $_POST['berat'];
$discount = 0;


if (!empty($lokasi_file))
{
	UploadImage($nama_file_unik);
	mysql_query("INSERT INTO produk(id_kategori,produk_owner,nama_produk,slug,deskripsi,satuan,harga,stok,berat,discount,gambar) VALUE('$kategori','$produk_owner','$nama_produk','$slug','$deskripsi','$satuan','$harga','$stok','$berat','$discount','$nama_file_unik')")or die(mysql_error());
}
else
{
	mysql_query("INSERT INTO produk(id_kategori,produk_owner,nama_produk,slug,deskripsi,satuan,harga,stok,berat,discount) VALUE('$kategori','$produk_owner','$nama_produk','$slug','$deskripsi','$harga','$satuan','$stok','$berat','$discount')")or die(mysql_error());
}

header('location:../../index.php?page=produksaya')

?>