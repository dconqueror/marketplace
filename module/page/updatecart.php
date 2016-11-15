<?php
	$id       = $_POST['id'];
	$jml_data = count($id);
	$jumlah   = $_POST['jml'];
	
	for ($i=1; $i <= $jml_data; $i++)
	{
		$sql2 = mysql_query("SELECT stok_temp FROM pesanan_temp	WHERE id_orders_temp='".$id[$i]."'");
		
		while($r=mysql_fetch_array($sql2))
		{
    		if ($jumlah[$i] > $r['stok_temp'])
    		{
        		echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada'); window.location=('keranjang-belanja.html')</script>";
    		}

    		elseif($jumlah[$i] == 0)
    		{
        		echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!'); window.location=('keranjang-belanja.html')</script>";
    		}

    		else
    		{
				mysql_query("UPDATE pesanan_temp SET jumlah = '".$jumlah[$i]."' WHERE id_orders_temp = '".$id[$i]."'");
				header('Location:index.php?page=cart');
			}
		}
	}