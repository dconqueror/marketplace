<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Produk Saya</strong>
		</div>
		<div class="panel-body">
			<a href="<?php echo"$siteadminurl";?>/index.php?page=tambahproduk" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Produk</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th data-align="right">Nama Produk</th>
						<th>Deskripsi</th>
						<th>Harga Satuan</th>
						<th>Stok</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$query = mysql_query("SELECT * FROM produk");
					while($q = mysql_fetch_array($query)){
						echo"
						<tr>
						<td>$q[nama_produk]</td>
						<td>$q[deskripsi]</td>
						<td>$q[harga]</td>
						<td>$q[stok]</td>
						<td>
							<div class='actionicon'>
								<a href=''><svg class='glyph stroked eye'><use xlink:href='#stroked-eye'/></svg></a>
								<a href='$siteadminurl/index.php?id=$q[id_produk]&page=editproduk'><svg class='glyph stroked pencil'><use xlink:href='#stroked-pencil'/></svg></a>
								<a href='$siteadminurl/query/produk/delete.php?id=$q[id_produk]'><svg class='glyph stroked trash'><use xlink:href='#stroked-trash'/></svg></a>
							</div>
						</td>
					</tr>
					";
					}
				?>
				</tbody>
				</table>
		</div>
	</div>
</div>