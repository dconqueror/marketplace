<?php

include"../../../config/koneksi.php";
mysql_query("DELETE FROM kategori WHERE id_kategori=$_GET[id]");
header('location:../../index.php?page=kategori')

?>