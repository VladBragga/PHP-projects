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
					<h5><u><a href="admin_guitar.php">Назад</u></a> </h5>
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
<form action="admin_create_g.php" method="post" enctype="multipart/form-data">

	<p>Назва гітари</p>
  <input required type="text" name="g_name" placeholder=" Введіть назву">

	<p>Фото інструменту</p>
	<input required type="file" name="image" >

	<p>Вид інструменту</p>
	<select name="id_vid">
   <option value="1">1 - Класична гітара</option>
   <option value="2">2 - Акустична гітара</option>
   <option value="3">3 - Електрогітара</option>
   <option value="4">4 - Бас гітара</option>
</select>
<p>Країна виробника</p>
  <input required type="text" name="g_country"  placeholder=" Введіть країну">
  <p>Колір інструменту</p>
  <input required type="text" name="g_color" placeholder=" Введіть колір">
  <p>Тип корпусу</p>
  <input required type="text" name="g_type_corpus" placeholder=" Введіть тип корпусу">
  <p>Матеріал грифу</p>
  <select  name="grif">
   <option value="1">1 - Клен</option>
   <option value="2">2 - Ясень</option>
   <option value="3">3 - Червоне дерево</option>
   <option value="4">4 - Чорне дерево</option>
   <option value="5">5 - Полісандр</option>
   <option value="6">6 - Горіх</option>
   <option value="7">7 - Кедр</option>
   <option value="8">8 - Вільха</option>
   <option value="9">9 - Ялина</option>
   <option value="10">10 - Махагоні</option>
</select>
  <p>Матеріал нижньої деки</p>
  <select name="n_deka">
  <option value="1">1 - Клен</option>
   <option value="2">2 - Ясень</option>
   <option value="3">3 - Червоне дерево</option>
   <option value="4">4 - Чорне дерево</option>
   <option value="5">5 - Полісандр</option>
   <option value="6">6 - Горіх</option>
   <option value="7">7 - Кедр</option>
   <option value="8">8 - Вільха</option>
   <option value="9">9 - Ялина</option>
   <option value="10">10 - Махагоні</option>
</select>
<p>Матеріал верхньої деки</p>
  <select   name="v_deka">
  <option value="1">1 - Клен</option>
   <option value="2">2 - Ясень</option>
   <option value="3">3 - Червоне дерево</option>
   <option value="4">4 - Чорне дерево</option>
   <option value="5">5 - Полісандр</option>
   <option value="6">6 - Горіх</option>
   <option value="7">7 - Кедр</option>
   <option value="8">8 - Вільха</option>
   <option value="9">9 - Ялина</option>
   <option value="10">10 - Махагоні</option>
</select>
  <p>Фірма</p>
  <input required type="text"  name="g_name_firm" placeholder=" Введіть назву фірми">
  <p>Кількість струн</p>
  <input required type="number"  name="g_kol_s" placeholder=" Введіть кількість струн"  min="4" max="12">
  <p>Звукознімач</p>
  <input type="text" name="g_zvuk"  placeholder=" Введіть назву звукознімачу">
  <p>Назва струн</p>
  <input required type="text"  name="g_string" placeholder=" Введіть назву струн">
  <p>Призначення інструменту</p>
  <input required type="text"  name="target" placeholder=" Введіть ціль гітари">
  <p>Описання гітари</p>
  <textarea required type="text"  name="g_description"></textarea>
  <p>Сайт для покупки</p>
  <textarea required type="text" name="site"></textarea>

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