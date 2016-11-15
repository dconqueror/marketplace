<h2>Data Kostumer</h2>

<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a href="#register" aria-controls="home" role="tab" data-toggle="tab">Data Kostumer</a></li>
	<li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Pembeli Lama</a></li>
</ul>
	
<div class="tab-content">

	<div role="tabpanel" class="tab-pane active" id="register">
		<form class="form-horizontal" style="margin-top: 15px;" action="index.php?page=checkout_nonmember" method="POST">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="3" placeholder="Alamat Pengiriman Barang" name="alamat" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" placeholder="Email" name="email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" placeholder="Password" name="password" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">No Hp</label>
				<div class="col-sm-6">
					<input type="tel" class="form-control" placeholder="Nomor Handphone" name="telpon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kota Tujuan</label>
				<div class="col-sm-6">
					<select class="form-control" name="kota" required="">
						<option value="">- Select -</option>
						<?php
							$tampil=mysql_query("SELECT * FROM biaya_pengiriman ORDER BY nama_kota");
							while($r=mysql_fetch_array($tampil))
							{
								echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
			      			}
			      		?>
					</select>
					<p class="help-block"> Apabila tidak terdapat nama kota tujuan Anda, pilih Lainnya.</p>
					<p class="help-block">Ongkos kirim dihitung berdasarkan kota tujuan</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Captcha</label>
				<div class="col-sm-4">
					<img src="config/captcha.php">
					<p class="help-block">Masukkan 6 Kode di atas</p>
					<input type="text" name="kode" class="form-control" placeholder="captcha" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-default">Daftar</button>
				</div>
			</div>
		</form>
		
	</div>

	<div role="tabpanel" class="tab-pane" id="login">
		<form class="form-horizontal" style="margin-top: 15px;" action="index.php?page=checkout_member" method="POST">
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<button type="submit" class="btn btn-default">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>


