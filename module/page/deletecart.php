<?php
	mysql_query("DELETE FROM pesanan_temp WHERE id_orders_temp='$_GET[id]'");
	header('Location:index.php?page=cart');
?>