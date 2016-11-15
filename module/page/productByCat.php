<div class="row">
<?php

	$p      = new Paging2;
	$batas  = 12;
	$posisi = $p->cariPosisi($batas);

	$category = $_GET['id'];

	$sql=mysql_query("SELECT * FROM produk WHERE id_kategori = '$category' ORDER BY id_produk DESC LIMIT $posisi,$batas");
	$row = mysql_num_rows($sql);
	while ($r=mysql_fetch_array($sql))
	{
		include "diskon_stok.php"; ?>

		

			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="<?php echo "foto_produk/$r[gambar]";?>" style="max-height: 150px;">
					<div class="caption">
						<h4 class="pull-right">Rp. <?php echo format_rupiah($r['harga']); ?></h4>
						<h4><a href="#"><?php echo $r['nama_produk']; ?></a>
						</h4>
						<p style="text-align: justify;"><?php echo substr($r['deskripsi'], 0, 100); ?> ...</p>
					</div>
					<div class="ratings">
						<p class="pull-right"><button type="button" class="btn btn-info btn-sm" href="aksi.php?module=keranjang&act=tambah&id=$r[id_produk]">
  <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Detail Produk
</button></p>
						<p>
							<?php echo $tombol; ?>
						</p>
					</div>
				</div>
			</div>
		
	<?php
	}  
 ?></div>
 <?php

 if ($row) {
  	$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET['halproduk'], $jmlhalaman);

	echo "<div class='center_title_bar'>Halaman : $linkHalaman </div>";
  } 
	
?>
