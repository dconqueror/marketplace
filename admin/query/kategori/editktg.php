<?php
include"../../../config/koneksi.php";

mysql_query("UPDATE kategori SET nama_kategori = '$_POST[jenis_produk]' WHERE id_kategori = '$_POST[id]'");
						   
header('location:../../index.php?page=kategori')

?>