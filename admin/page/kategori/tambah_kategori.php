<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Tambah Kategori</strong>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo"$siteadminurl";?>/query/kategori/tambahktg.php" method="post">
							<fieldset>

								<div class="form-group">
									<label class="col-md-3 control-label" for="nama_produk">Nama Kategori</label>
									<div class="col-md-9">
									<input name="jenis_produk" type="text" placeholder="Nama jenis produk" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="reset" onclick="history.back()" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancel</button>
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Simpan</button>
									</div>
								</div>
							</fieldset>
						</form>
		</div>
	</div>
</div>