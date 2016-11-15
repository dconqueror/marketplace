<?php
	$kar1=strstr($_POST['email'], "@");
	$kar2=strstr($_POST['email'], ".");

	// Cek email kustomer di database
	$cek_email=mysql_num_rows(mysql_query("SELECT email FROM pembeli WHERE email='$_POST[email]'"));

	// Kalau email sudah ada yang pakai
	if ($cek_email > 0)
	{
		echo "Email <b>$_POST[email]</b> sudah ada yang pakai.<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}

	elseif (empty($_POST['nama']) || empty($_POST['password']) || empty($_POST['alamat']) || empty($_POST['telpon']) || empty($_POST['email']) || empty($_POST['kota']) || empty($_POST['kode']))
	{
		echo "Data yang Anda isikan belum lengkap<br /><a href='selesai-belanja.html'><b>Ulangi Lagi</b>";
	}

	elseif (!ereg("[a-z|A-Z]","$_POST[nama]"))
	{
		echo "Nama tidak boleh diisi dengan angka atau simbol.<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}

	elseif (strlen($kar1)==0 OR strlen($kar2)==0)
	{
		echo "Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}

	else
	{

		// fungsi untuk mendapatkan isi keranjang belanja
		function isi_keranjang(){
			$isikeranjang = array();
			$sid = session_id();
			$sql = mysql_query("SELECT * FROM pesanan_temp WHERE id_session='$sid'");
			
			while ($r=mysql_fetch_array($sql))
			{
				$isikeranjang[] = $r;
			}
			return $isikeranjang;
		}

		$tgl_skrg = date("Ymd");
		$jam_skrg = date("H:i:s");

		if(!empty($_POST['kode']))
		{
			if($_POST['kode']==$_SESSION['captcha_session'])
			{
				function antiinjection($data){
					$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
					return $filter_sql;
				}

				$nama   = antiinjection($_POST['nama']);
				$alamat = antiinjection($_POST['alamat']);
				$telpon = antiinjection($_POST['telpon']);
				$email = antiinjection($_POST['email']);
				$password=md5($_POST['password']);

				// simpan data kustomer 
				mysql_query("INSERT INTO pembeli(nama_lengkap, password, alamat, telpon, email, id_kota) 
				VALUES('$nama','$password','$alamat','$telpon','$email','$_POST[kota]')");

				// mendapatkan nomor kustomer
				$id_kustomer=mysql_insert_id();

				// simpan data pemesanan 
				mysql_query("INSERT INTO pesanan(tgl_order,jam_order,id_kustomer) VALUES('$tgl_skrg','$jam_skrg','$id_kustomer')");
  
				// mendapatkan nomor orders
				$id_orders=mysql_insert_id();

				// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
				$isikeranjang = isi_keranjang();
				$jml          = count($isikeranjang);

				// simpan data detail pemesanan  
				for ($i = 0; $i < $jml; $i++)
				{
					mysql_query("INSERT INTO pesanan_detail(id_orders, id_produk, jumlah) VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
				}
  
				// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
				for ($i = 0; $i < $jml; $i++)
				{
					mysql_query("DELETE FROM pesanan_temp WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
				}

				echo "<h2>Proses Transaksi Selesai</h2>";
				echo "<p>Data pemesan beserta ordernya adalah sebagai berikut:</p><br />
				<dl class='dl-horizontal'>
					<dt>Nama Pemesan</dt>
					<dd>$nama</dd>
					<dt>Alamat</dt>
					<dd>$alamat</dd>
					<dt>Telpon</dt>
					<dd>$telpon</dd>
					<dt>E-mail</dt>
					<dd>$email</dd>
				</dl>
				<br />

					Nomor Order: <b>$id_orders</b><br /><br />";

				$daftarproduk=mysql_query("SELECT * FROM pesanan_detail,produk WHERE pesanan_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

				echo "<table class='table table-hover'>
				<tr><th>No</th><th>Nama Produk</th><th>Berat(Kg)</th><th>Qty</th><th>Harga Satuan</th><th>Sub Total</th></tr>";
      
				$pesan="Terimakasih telah melakukan pemesanan online di toko online kami <br /><br />  
				Nama: $nama <br />
				Password: $_POST[password]<br />
				Alamat: $alamat <br/>
				Telpon: $telpon <br /><hr />

				Nomor Order: $id_orders <br />
				Data order Anda adalah sebagai berikut: <br /><br />";
	        
				$no=1;
				$totalberat = 0;
				$total = 0;
				
				while ($d=mysql_fetch_array($daftarproduk))
				{
					$disc        = ($d['discount']/100)*$d['harga'];
					$hargadisc   = number_format(($d['harga']-$disc),0,",","."); 
					$subtotal    = ($d['harga']-$disc) * $d['jumlah'];

					$subtotalberat = $d['berat'] * $d['jumlah']; // total berat per item produk 
					$totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

					$total       = $total + $subtotal;
					$subtotal_rp = format_rupiah($subtotal);    
					$total_rp    = format_rupiah($total);    
					$harga       = format_rupiah($d['harga']);

	   				echo "<tr>
					<td>$no</td>
					<td>$d[nama_produk]</td>
					<td align=center>$d[berat]</td>
					<td align=center>$d[jumlah]</td>
					<td align=right>$harga</td><td align=right>$subtotal_rp</td>
					</tr>";

					$pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
					$no++;
				}

				$ongkos=mysql_fetch_array(mysql_query("SELECT ongkos_kirim FROM biaya_pengiriman WHERE id_kota='$_POST[kota]'"));
				$ongkoskirim1=$ongkos['ongkos_kirim'];
				$ongkoskirim = $ongkoskirim1 * $totalberat;

				$grandtotal    = $total + $ongkoskirim; 

				$ongkoskirim_rp = format_rupiah($ongkoskirim);
				$ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
				$grandtotal_rp  = format_rupiah($grandtotal);  

				// dapatkan email_pengelola dan nomor rekening dari database
				//$sql2 = mysql_query("select email_pengelola,nomor_rekening,nomor_hp from modul where id_modul='43'");
				//$j2   = mysql_fetch_array($sql2);

				$pesan.="<br /><br />Total : Rp. $total_rp 
				<br />Ongkos Kirim untuk Tujuan Kota Anda : Rp. $ongkoskirim1_rp/Kg 
				<br />Total Berat : $totalberat Kg
				<br />Total Ongkos Kirim  : Rp. $ongkoskirim_rp		 
				<br />Grand Total : Rp. $grandtotal_rp 
				<br /><br />Silahkan lakukan pembayaran sebanyak Grand Total yang tercantum, rekeningnya: $shopbankaccount
				<br />Apabila sudah transfer, konfirmasi ke nomor: $shopphone";

				$subjek="Pemesanan Online";

				// Kirim email dalam format HTML
				$dari = "From: $shopemail\r\n";
				$dari .= "Content-type: text/html\r\n";

				// Kirim email ke kustomer
				mail($email,$subjek,$pesan,$dari);

				// Kirim email ke pengelola toko online
				mail("$shopemail",$subjek,$pesan,$dari);

				echo "<tr><td colspan=5 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
				<tr><td colspan=5 align=right>Ongkos Kirim untuk Tujuan Kota Anda: Rp. </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
				<tr><td colspan=5 align=right>Total Berat : </td><td align=right><b>$totalberat Kg</b></td></tr>
				<tr><td colspan=5 align=right>Total Ongkos Kirim : Rp. </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
				<tr><td colspan=5 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
				</table>";
				echo "<hr /><p>Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
				Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.</p><br />      
				</div>
				</div>    
				</div>
				<div class='bottom_prod_box_big'></div>
				</div>";                      
			}

			else
			{
			echo "Kode yang Anda masukkan tidak cocok<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
			}
		}
		
		else
		{
			echo "Anda belum memasukkan kode<br /><a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}
?>