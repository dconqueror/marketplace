<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include"../config/koneksi.php";
include"../config/config.php";
if (empty($_GET['page'])) { $_GET['page'] = ""; }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OleOle.Com</title>

<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/datepicker3.css" rel="stylesheet">
<link href="style/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="style/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php include"page/navbar.php";?>
		
	<?php include"page/sidebar.php";?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<?php include"page/breadcrumb.php";?>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<hr />
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<?php include"page/content.php";?>
		</div><!--/.row-->		
		
		
	</div><!--/.main-->

	<script src="style/js/jquery-1.11.1.min.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
	<script src="style/js/chart.min.js"></script>
	<script src="style/js/chart-data.js"></script>
	<script src="style/js/easypiechart.js"></script>
	<script src="style/js/easypiechart-data.js"></script>
	<script src="style/js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
