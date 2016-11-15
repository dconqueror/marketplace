<?php
function getkategori(){
	$query = mysql_query("SELECT * FROM kategori ORDER BY id_kategori ASC");
	while ($data = mysql_fetch_array($query)) {
		echo"<a href='index.php?page=productByCat&id=$data[id_kategori]' class='list-group-item'>".$data['nama_kategori']."</a>";
	}
}
?>
<p class="lead">Kategori Produk</p>
<div class="list-group">
	<?php
		getkategori();
	?>
</div>