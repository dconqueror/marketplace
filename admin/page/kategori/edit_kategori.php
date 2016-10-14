<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Edit Kategori</strong>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo"$siteadminurl";?>/query/kategori/editktg.php" method="post">
							<fieldset>
<?PHP
	include"../config/koneksi.php";
	$show = mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
	$data = mysql_fetch_array($show);
	?>
								<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $data['id_kategori']; ?>" class="form-control">
									<label class="col-md-3 control-label" for="nama_produk">Nama Kategori</label>
									<div class="col-md-9">
									<input name="jenis_produk" type="text" value="<?php echo $data['nama_kategori']; ?>" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="button" onclick="history.back()" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancel</button>
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Simpan</button>
									</div>
								</div>
							</fieldset>
						</form>
		</div>
	</div>
</div>