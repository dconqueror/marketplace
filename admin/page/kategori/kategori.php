<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Produk Kategori</strong>
		</div>
		<div class="panel-body">
			<a href="<?php echo"$siteadminurl";?>/index.php?page=tambahkategori" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Kategori</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th data-align="right">Nama Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$query = mysql_query("SELECT * FROM kategori");
					while($q = mysql_fetch_array($query)){
						echo"
						<tr>
						<td>$q[nama_kategori]</td>
						<td>
							<div class='actionicon'>
								<a href=''><svg class='glyph stroked eye'><use xlink:href='#stroked-eye'/></svg></a>
								<a href='$siteadminurl/index.php?id=$q[id_kategori]&page=editkategori'><svg class='glyph stroked pencil'><use xlink:href='#stroked-pencil'/></svg></a>
								<a href='$siteadminurl/query/kategori/deletektg.php?id=$q[id_kategori]'><svg class='glyph stroked trash'><use xlink:href='#stroked-trash'/></svg></a>
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