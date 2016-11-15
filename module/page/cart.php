<?php 
	
	$sid= session_id();
	$sql = mysql_query("SELECT * FROM pesanan_temp, produk WHERE id_session='$sid' AND pesanan_temp.id_produk=produk.id_produk");
	$ketemu=mysql_num_rows($sql);

	if($ketemu < 1)
	{
		echo"<h2>Cart</h2>";
		echo"<p>Anda belum membeli barang apapun</p>";
	}

	else
	{	?>
		<h2>Cart</h2>
		<form method="post" action="index.php?page=updatecart">
			<table class="table table-hover">
				<tbody>
					<tr >
						<th>No</th>
						<th>Produk</th>
						<th>Nama Produk</th>
						<th>Berat(Kg)</th>
						<th>Qty</th>
						<th>Harga</th>
						<th>Sub Total</th>
						<th>Hapus</th>
					</tr>  
	<?php
	
			$no=1;
			$total = 0;

			while($r=mysql_fetch_array($sql))
			{
				$disc        = ($r['discount']/100)*$r['harga'];
				$hargadisc   = number_format(($r['harga']-$disc),0,",",".");

				$subtotal    = ($r['harga']-$disc) * $r['jumlah'];
				$total       = $total + $subtotal;  
				$subtotal_rp = format_rupiah($subtotal);
				$total_rp    = format_rupiah($total);
				$harga       = format_rupiah($r['harga']);
			?>

					<tr>
						<td><?php echo $no; ?><input type=hidden name="id[<?php echo $no;?>]" value="<?php echo $r['id_orders_temp']; ?>"></td>
						<td align=center><img src="foto_produk/small_<?php echo $r['gambar']; ?>" class="img-thumbnail"></td>
						<td><?php echo $r['nama_produk'] ?></td>
						<td align=center><?php echo $r['berat'] ?></td>
						<td>
							<select name="jml[<?php echo $no;?>]" value="<?php echo $r['jumlah'];?>" onChange='this.form.submit()'>
							<?php
								for ($j=1;$j <= $r['stok'];$j++){
									if($j == $r['jumlah'])
									{
										echo "<option selected>$j</option>";
									}
									else
									{
										echo "<option>$j</option>";
									}
								}
							?>
							</select>
						</td>
						<td><?php echo $hargadisc; ?></td>
						<td><?php echo $subtotal_rp; ?></td>
						<td align=center><a href="index.php?page=deletecart&id=<?php echo $r['id_orders_temp']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
					</tr>
				<?php
				$no++; 
			} ?> 
					<tr>
						<td colspan=6 align=right><b>Total</b>:</td>
						<td colspan=2><b> Rp. <?php echo $total_rp;?></b>
						</td>
					</tr>
		
					<tr>
						<td colspan="3">
							<a href="javascript:history.go(-1)" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Belanja Lagi</a>
						</td>
						<td colspan=5 align=right>
							<a href="index.php?page=checkout" class="btn btn-success"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Selesai Belanja</a>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<br />
		<p>*) Total harga diatas belum termasuk ongkos kirim yang akan dihitung saat <b>Selesai Belanja</b>.</p>
	<?php } ?>