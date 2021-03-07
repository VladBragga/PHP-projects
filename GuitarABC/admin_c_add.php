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
		include "functions.php";
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
					<h5><u><a href="admin_combik.php">Назад</u></a> </h5>
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
<!---->
<!---->
<div class="container">
<div class="zapis_novogo">
<form action="admin_create_c.php" method="post" enctype="multipart/form-data">

	<p>Назва комбопідсилювача</p>
  <input required type="text" name="c_name" placeholder=" Введіть назву">
	<p>Фото комбопідсилювача</p>
	<input required type="file" name="image">
	<p>Для якого виду гітари</p>
	<select name="id_vid">
   <option value="1">1 - Для класичної гітари</option>
   <option value="2">2 - Для акустичної гітари</option>
   <option value="3">3 - Для електричної гітари</option>
   <option value="4">4 - Для басу </option>
</select>
<p>Фірма</p>
  <input required type="text" name="c_firm" placeholder=" Введіть назву фірми">
<p>Країна виробника</p>
  <input required type="text" name="c_country" placeholder=" Введіть країну">
  <p>Вид комбопідсилювача</p>
  <select name="type_id">
   <option value="1">1 - Транзисторний</option>
   <option value="2">2 - Ламповий	</option>
</select>
<p>Потужність</p>
  <input required type="number" name="power" placeholder=" Введіть потужність" min="8" max="800">
  <p>Вага</p>
  <input required type="text" name="weight" placeholder=" Введіть вагу">
  <p>Імпаденс, Ом</p>
  <input required type="text" name="c_imp" placeholder=" Введіть опір">
  <p>Призначення комобопідчилювача</p>
  <input required type="text" name="target"  placeholder=" Введіть ціль комбопідсилювача">
  <p>Кількість динаміків</p>
  <input required type="text" name="c_kol_d" placeholder=" Введіть кількість">
  <p>Діаметр динаміка, "</p>
  <input required type="text" name="c_diam" placeholder=" Введіть діаметр">
  <p>Розмір, мм</p>
  <input required type="text" name="c_size" placeholder=" Введіть розмір">
  <p>Входи</p>
  <input required type="text" name="c_vhod" placeholder=" Введіть входи премочки">
  <p>Виходи</p>
  <input required type="text" name="c_vihod" placeholder=" Введіть виходи премочки">
  <p>Описання комобопідчилювача</p>
  <textarea required type="text" name="c_descripton"></textarea>
  <p>Сайт для покупки</p>
  <textarea required type="text" name="c_site"></textarea>

  <button type="submit"><h4> Додати</h4></button>
</form>
	</div>
	</div>
<!---->
<!---->


<!---->
<!---->
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