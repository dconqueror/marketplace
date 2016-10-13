<?php
include"../../../config/koneksi.php";

$nama_kategori   = $_POST['jenis_produk'];

mysql_query("INSERT INTO kategori(nama_kategori)
VALUE('$nama_kategori')")or die(mysql_error());

header('location:../../index.php?page=kategori')

?>