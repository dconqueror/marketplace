<?php
	$sid = session_id();

	$sql2 = mysql_query("SELECT stok FROM produk WHERE id_produk='$_GET[id]'");
	$r=mysql_fetch_array($sql2);
	$stok=$r['stok'];
	
	function deleteAbandonedCart(){
		$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
		mysql_query("DELETE FROM pesanan_temp WHERE tgl_order_temp < '$kemarin'");
	}
	
	if ($stok == 0){
		echo "stok habis";
	}
	else{
		$sql = mysql_query("SELECT id_produk FROM pesanan_temp
				WHERE id_produk='$_GET[id]' AND id_session='$sid'");
		$ketemu=mysql_num_rows($sql);
		if ($ketemu==0){
			// put the product in cart table
			mysql_query("INSERT INTO pesanan_temp (id_produk, jumlah, id_session, tgl_order_temp, jam_order_temp, stok_temp)
				VALUES ('$_GET[id]', 1, '$sid', '$tgl_sekarang', '$jam_sekarang', '$stok')");
		} else {
			// update product quantity in cart table
			mysql_query("UPDATE pesanan_temp 
		        SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_produk='$_GET[id]'");		
		}	
	deleteAbandonedCart();
	header('Location:index.php?page=cart');
	}
?>