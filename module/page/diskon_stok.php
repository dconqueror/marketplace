<?php
    // diskon  
    $harga     = format_rupiah($r['harga']);
    $disc      = ($r['discount']/100)*$r['harga'];
    $hargadisc = number_format(($r['harga']-$disc),0,",",".");

    $d=$r['discount'];
    $hargatetap  = "<span class='price'> <br /></span>&nbsp;
                    <span style=\"color:#ff6600;font-size:14px;\"> Rp. <b>$hargadisc,-</b></span>";
    $hargadiskon = "<span style='text-decoration:line-through;' class='price'>Rp. $harga <br /></span>&nbsp;diskon $d% 
                    <span style=\"color:#ff6600;font-size:14px;\"> Rp. <b>$hargadisc,-</b></span>";
    if ($d!=0){
      $divharga=$hargadiskon;
    }else{
      $divharga=$hargatetap;
    } 

    // tombol stok habis kalau stoknya 0
    $stok        = $r['stok'];
    $tombolbeli  = "<a href='index.php?page=buy&id=$r[id_produk]' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Beli</a>";
    $tombolhabis = "<span class=glyphicon glyphicon-star></span> Habis";
    if ($stok!=0){
      $tombol=$tombolbeli;
    }else{
      $tombol=$tombolhabis;
    } 
?>
