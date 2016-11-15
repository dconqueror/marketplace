<?php
if (empty($_GET['page'])) $_GET['page'] = "";

if ($_GET['page']=='home'){
	include"page/home.php";
}
elseif ($_GET['page']=='product') {
	include"config/paging.php";
	include"config/currency.php";
	include"page/product.php";
}
elseif ($_GET['page']=='productByCat') {
	include"config/paging.php";
	include"config/currency.php";
	include"page/productByCat.php";
}
elseif ($_GET['page']=='cart') {
	include"config/currency.php";
	include"page/cart.php";
}
elseif ($_GET['page']=='updatecart') {
	include"page/updatecart.php";
}
elseif ($_GET['page']=='deletecart') {
	include"page/deletecart.php";
}
elseif ($_GET['page']=='checkout') {
	include"page/checkout.php";
}
elseif ($_GET['page']=='checkout_member') {
	include"config/currency.php";
	include"page/checkout_member.php";
}
elseif ($_GET['page']=='checkout_nonmember') {
	include"config/currency.php";
	include"page/checkout_nonmember.php";
}
elseif ($_GET['page']=='buy') {
	include"config/nowtime.php";
	include"page/buy.php";
}
else{
	include"page/test.php";
}
?>