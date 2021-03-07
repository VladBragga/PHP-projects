<?php
session_start();

if($_SESSION['prava']=="-")
{
	header('Location: /login.php'); die();
}

if(!($_SESSION['user']))
{
	header('Location: /login.php'); die();
}
		include "connect.php";
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Guitar ABC. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fav Icon -->
	<link id="1" rel="icon" type="image/png" href="img/1.ico" />
	<!-- Google Font Raleway -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:200,300,500,400,600,700,800' rel='stylesheet' type='text/css'>
	<!-- Google Font Dancing Script -->
	<link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
	<!-- Animate CSS -->
	<link rel="stylesheet" type="text/css" href="css/animate.min.css" />
	<!-- simpleLens CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css" />
	<!-- Price Slider CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery-price-slider.css" />
	<!-- MeanMenu CSS -->
	<link rel="stylesheet" type="text/css" href="css/meanmenu.min.css" />
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
	<!-- Nivo Slider CSS -->
	<link rel="stylesheet" type="text/css" href="css/nivo-slider.css" />
	<!-- Stylesheet CSS -->
	<link rel="stylesheet" type="text/css" href="style.css" />
	<!-- Responsive Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="header-area"><!--Start Header Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<div class="site_admin">
				<p><span class="lang2">Вихід з таблиці pedal</span></p>
					<h5><u><a href="home.php">Назад</u></a> </h5>
				</div>
			</div>
			<div class="col-sm-4 col-lg-6">
				<div class="logo text-center">
					<a>
						<h1><span class="select">Guitar ABC.</span></h1>
						<h4>бібліотека гітарного світу</h4>
					</a>
				</div>
			</div>
			<div class="col-sm-4 col-lg-3">
				<div class = "site_admin">
				<p><span class="lang2">Адміністратор сайту</span></p>
					<h3><u><?= $_SESSION['user']['name']?></u></h3>
				</div>
			</div>
		</div>
	</div>
</div><!--End Header Area-->


<div class="menu-area"><!--Start Main Menu Area-->
	<div class="container">
		<div class="row">
			<div class="clo-md-12">
				<div class="main-menu hidden-sm hidden-xs" boarder="1px solid red" padding=" 10px">
					<nav>
						<ul>
							<li><h3><span class="lang2">ТАБЛИЦЯ PEDAL</span></h3>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div><!--End Main Menu Area-->
<!---->
<!---->
<?php  
include "functions.php";
$funs =	new fun();
$pedals = $funs->get_ped();
$varyies = $funs->get_varies();?>

<div class="container">
 <div class="row">
<div class = "admin_table">
<div >
<a style="margin:400px" href="admin_p_add.php" >Додавання нового процесору</a>
 </div>
<table>
<tr>
<th>	Назва процесору  		</th>
<th>	Країна					</th>
<th>	Переглянути		</th>
<th>	Видалити				</th>
</tr>
<?php   foreach($pedals as $pedal)
	{ ?>
	<tr>
	<td><?=$pedal['p_name']?></td>
	<td><?=$pedal['p_country']?></td>
	<td><a href="details_p.php?id=<?=$pedal['p_id']?>">Переглянути</a></td>
	<td><a href="admin_p_del.php?id=<?=$pedal['p_id']?>">Видалити</a></td>
	</tr>
	<?php } ?>
 </table>
 <?php
 
 echo '</div>';
 echo '</div>';
 echo '</div>';
?>
<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Owl Carousel JS -->
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<!--countTo JS -->
<script type="text/javascript" src="js/jquery.countTo.js"></script>
<!-- mixitup JS -->
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<!-- magnific popup JS -->
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<!-- Appear JS -->
<script type="text/javascript" src="js/jquery.appear.js"></script>
<!-- MeanMenu JS -->
<script type="text/javascript" src="js/jquery.meanmenu.min.js"></script>
<!-- Nivo Slider JS -->
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<!-- Scrollup JS -->
<script type="text/javascript" src="js/jquery.scrollup.min.js"></script>
<!-- simpleLens JS -->
<script type="text/javascript" src="js/jquery.simpleLens.min.js"></script>
<!-- Price Slider JS -->
<script type="text/javascript" src="js/jquery-price-slider.js"></script>
<!-- WOW JS -->
<script type="text/javascript" src="js/wow.min.js"></script>
<script>
	new WOW().init();
</script>	
<!-- Main JS -->
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>