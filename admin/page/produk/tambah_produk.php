<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Tambah Produk</strong>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo"$siteadminurl";?>/query/produk/tambah.php" method="post">
							<fieldset>

								<div class="form-group">
									<label class="col-md-3 control-label" for="nama_produk">Nama Produk</label>
									<div class="col-md-9">
									<input name="nama_produk" type="text" placeholder="Nama produk baru anda" class="form-control">
									</div>
								</div>

							
								<div class="form-group">
									<label class="col-md-3 control-label" for="kategori">Kategori</label>
									<div class="col-md-3">
										<select name="kategori" class="form-control"><option value="0">Pilih Kategori</option>
										<?php 
											include"../config/koneksi.php";
											$q = mysql_query("select * from kategori");
											while ($row1 = mysql_fetch_array($q)){
											echo "<option value=$row1[id_kategori]>$row1[nama_kategori]</option>";
											}
										?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="deskripsi">Deskripsi</label>
									<div class="col-md-9">
										<textarea class="form-control" name="deskripsi" placeholder="Please enter your message here..." rows="4"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="satuan">Satuan</label>
									<div class="col-md-3">
									<input name="jenis" type="text" placeholder="Jenis Satuan" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Harga Satuan</label>
									<div class="col-md-4">
									<input name="harga" type="text" placeholder="Rupiah (Rp)" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Stok</label>
									<div class="col-md-1">
									<input name="stok" type="text" placeholder="Stok" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Berat</label>
									<div class="col-md-1">
									<input name="berat" type="text" placeholder="Kg" class="form-control">
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