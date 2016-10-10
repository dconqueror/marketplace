<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Edit Produk</strong>
		</div>
	
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo"$siteadminurl";?>/query/produk/edit.php" method="post">
							<fieldset>
<?PHP
	include"../config/koneksi.php";
	$show = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
	$data = mysql_fetch_array($show);
	?>
								<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $data['id_produk']; ?>" class="form-control">
									<label class="col-md-3 control-label" for="nama_produk">Nama Produk</label>
									<div class="col-md-9">
									<input name="nama_produk" type="text" value="<?php echo $data['nama_produk']; ?>" class="form-control">
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="kategori">Kategori</label>
									<div class="col-md-9">
										<input name="kategori" type="text" value="<?php echo $data['id_kategori']; ?>" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="deskripsi">Deskripsi</label>
									<div class="col-md-9">
										<textarea class="form-control" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" rows="4"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Harga Satuan</label>
									<div class="col-md-4">
									<input name="harga" type="text" value="<?php echo $data['harga']; ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Stok</label>
									<div class="col-md-1">
									<input name="stok" type="text" value="<?php echo $data['stok']; ?>" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Berat</label>
									<div class="col-md-1">
									<input name="berat" type="text" value="<?php echo $data['berat']; ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancel</button>
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>Update</button>
									</div>
								</div>
							</fieldset>
						</form>
		</div>
	</div>
</div>