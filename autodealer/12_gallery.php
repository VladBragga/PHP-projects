<?
session_start();
include "php/connect.php";
include "php/action/get.php";
$func = new get_id();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Facebook APP ID -->
	<meta property="fb:app_id" content="12345"/>

	<meta name="keywords" content="Car-Dealer, auto-salon, automobile, business, car, car-gallery, car-selling-template, cars, dealer, marketplace, mobile, real estate, responsive, sell, vehicle" />
	<meta name="description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />

	<!-- Open Graph -->
	<meta property="og:site_name" content="Auto Dealer HTML"/>
	<meta property="og:title" content="Gallery" />
	<meta property="og:url" content="http://localhost/12_gallery.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />

	<!-- Page Title -->
	<title>Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style980.css" />
	<link rel="stylesheet" type="text/css" href="css/style800.css" />
	<link rel="stylesheet" type="text/css" href="css/style700.css" />
	<link rel="stylesheet" type="text/css" href="css/style600.css" />
	<link rel="stylesheet" type="text/css" href="css/style500.css" />
	<link rel="stylesheet" type="text/css" href="css/style400.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	<link rel="shortcut icon" href="images/blog_icons/free-icon-car-3231728.png" type="image/x-icon">
	<!--[if IE]>
	<link href="css/style_ie.css" rel="stylesheet" type="text/css">
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jquery.selectik.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.checkbox.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/flickity.pkgd.min.js"></script>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body class="index">
	<!--BEGIN HEADER-->
		<div id="header">
			<div class="top_info">
				<div class="logo">
				<a href="index.php"><span>Auto</span>Future<span>.ua</span></a>
				</div>
				<div class="header_contacts">
					<div class="phone">U S I K <span>Poduction</span></div>
					<div>Дніпро, ФКРКМ ДНУ </div>
				</div>
				<?	
					if($_SESSION['user']){	
							echo '<div class="welcome" style="display: inline-block;">';
							echo '<p>Вітаємо ' . $_SESSION['user']['full_name'] . '!</p>';
							echo '</div>';
							echo '<div class="welcome" style="display: inline-block;">';
							echo '<a href="php/exit.php"><img src="images/buttons/exit (3).png"></a>';
							echo '</div>';
				}
				else{
					echo '<div class="socials">
					<a href="13_sigh.php">Авторизація </a>/<a href="13_sigh.php"> Реєстрація </a>
					</div>';
				}
				?>
			</div>
			<div class="bg_navigation">
				<div class="navigation_wrapper">
					<div id="navigation">
						<span>Home</span>
						<ul>
						<li><a href="index.php">Головна</a></li>
							<li><a href="04_catalog.php">Машини</a></li>
							<li  class="current"><a href="12_gallery.php">Галерея</a></li>
							<li><a href="02_contacts.php">Про нас</a></li>
							<?
						if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'творец'){	
							
							echo    '<li><a href="05_admin.php">Налаштування</a></li>';
							}
							?>
							<!-- <li><a href="/HTML/autodealer/04_catalog.html">Налаштування</a></li> -->
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	<!--EOF HEADER-->
	<!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
			<!--         ===========     -->
			<div class="breadcrumbs">
					<a href="index.php">Головна</a>
					<img src="images/marker_2.gif" alt=""/>
					<span>Галерея</span>
				</div>
			<div class="all">
		<input checked type="radio" name="respond" id="desktop">
			<article id="slider">
					<input checked type="radio" name="slider" id="switch1">
					<input type="radio" name="slider" id="switch2">
					<input type="radio" name="slider" id="switch3">
					<input type="radio" name="slider" id="switch4">
					<input type="radio" name="slider" id="switch5">
				<div id="slides">
					<div id="overflow">
						<div class="image">
							<article><img src="images/placeholders/bmw3.jpg"></article>
							<article><img src="images/placeholders/bmw2.jpg"></article>
							<article><img src="images/placeholders/bmw-x6.jpg"></article>
							<article><img src="images/placeholders/bentley.jpg"></article>
							<article><img src="images/placeholders/895522.jpg"></article>
						</div>
					</div>
				</div>
				<div id="controls">
					<label for="switch1"></label>
					<label for="switch2"></label>
					<label for="switch3"></label>
					<label for="switch4"></label>
					<label for="switch5"></label>
				</div>
				<div id="active">
					<label for="switch1"></label>
					<label for="switch2"></label>
					<label for="switch3"></label>
					<label for="switch4"></label>
					<label for="switch5"></label>
				</div>
			</article>
	</div>

<? $gallery = $func->get_gallery();	?>
				<div class="wrapper_4">
					<div class="">
						<div class="recent_cars four_columns">
							<h2><strong>Галерея</strong> машин</h2>
							<ul>
								<? $kol = 0;
								foreach($gallery as $photoes){
									$kol++; 
								if($kol == 4){?>
								<li class="last">
								<?}else ?>
								<li>
									<div class="small_img">
										<a href="<?=$photoes['photo']?>" class="car_group">
										<img src="<?=$photoes['photo']?>" alt=""/>
										<div class="title" style="text-align: center;"><?=$photoes['name']?></div>
										</a>
									</div>
								</li>
						<?}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--EOF CONTENT-->
<!--BEGIN FOOTER-->
<div id="footer">
			<div class="bottom_footer">
				<div class="f_widget ">
					<h3><strong>Навігація</strong></h3>
					<ul>
					<li><a href="index.php">Головна</a></li>					
					<li><a href="04_catalog.php">Каталог машин</a></li>
					<li><a href="12_gallery.php">Галерея</a></li>
					<li><a href="02_contacts.php">Про нас</a></li>
						
						
					</ul>
				</div>
				<div class="f_widget divide">
					<h3><strong>Майбутні партнери</strong></h3>
					<ul>
						<li><a href="https://auto.ria.com/uk/">AUTO.RIA</a></li>
						<li><a href="https://rst.ua/?gclid=CjwKCAjwqIiFBhAHEiwANg9szrvsLMsQCkXuWAmKN8DT6mVaTMB0TipbTLsMOkf61DGT1qpULIOvEhoCdCAQAvD_BwE">RST</a></li>
						<li><a href="https://mir-auto.com.ua/katalog.html">Mir-auto</a></li>
						
					</ul>
				</div>
				<div class="fwidget_separator"></div>
				<div class="f_widget">
					<h3><strong>Для користувача</strong></h3>
					<ul>
					<?
							if($_SESSION['user']){	
							echo    '<li><a href="php/exit.php">Вийти</a></li>';
							}
							if(!$_SESSION['user'])
							{
								echo    '<li><a href="13_sigh.php">Реєстарція</a></li>
										 <li><a href="13_sigh.php">Авторизація</a></li>';
							}
							?>
					</ul>
				</div>
				<div class="f_widget divide last">
					<h3><strong>Шукайте</strong> нас тут</h3>
					<ul class="horizontal">
						<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
						<li><a href="https://instagram.com/auto_future.ua?utm_medium=copy_link" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	<!--EOF FOOTER-->
</body>
</html>
