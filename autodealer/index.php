<?
session_start();
include "php/connect.php";
include "php/action/get.php";
$funs = new get_id();
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
	<meta property="og:title" content="Home" />
	<meta property="og:url" content="http://localhost/index.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />
	<link rel="shortcut icon" href="images/blog_icons/free-icon-car-3231728.png" type="image/x-icon">
	<!-- Page Title -->
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/style980.css" />
	<link rel="stylesheet" type="text/css" href="css/style800.css" />
	<link rel="stylesheet" type="text/css" href="css/style700.css" />
	<link rel="stylesheet" type="text/css" href="css/style600.css" />
	<link rel="stylesheet" type="text/css" href="css/style500.css" />
	<link rel="stylesheet" type="text/css" href="css/style400.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
	<!--[if IE]>
	<link href="css/style_ie.css" rel="stylesheet" type="text/css">
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jquery.selectik.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.checkbox.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</head>
<body class="page">
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
							<li class="current"><a href="index.php">Головна</a></li>
							<li><a href="04_catalog.php">Машини</a></li>
							<li><a href="12_gallery.php">Галерея</a></li>
							<li><a href="02_contacts.php">Про нас</a></li>
							<?
							if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'творец'){	
							
							echo    '<li><a href="05_admin.php">Налаштування</a></li>';
							}
							?>
							<!-- <li><a href="/HTML/autodealer/04_catalog.html">Налаштування</a></li> -->
						</ul>
					</div>
					<div id="search_form">
						<form method="get" action="php/action/search1.php">
							<input type="text" name="search"  placeholder="Введіть назву машини" class="txb_search"/>
							<input type="submit" value="Пошук" class="btn_search"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!--EOF HEADER-->
	
	<!--BEGIN CONTENT-->
		<div id="content">
			<div class="content">
						<div class="home_slider" >
								<div class="slide" >
									<img src="images/placeholders/bmw2.png" alt="" >
									<div class="top-left">Sometimes life is like an apocalypse</div>
									<div class="top-left2">Find your speedy shelter.</div>
									<div class="top-right">©Genry Ford</div>
								</div>
							<?$cars_last = $funs->get_main_cars();?>
						</div>
				<div class="recent">
					<div class="last_add">
					<h2><strong>Останні додані </strong>машини</h2></div>
					<div class="recent_carousel">
						<?foreach($cars_last as $car_last){
							$carcase = $funs->get_carcase($car_last['id_carcase'])?>
						<div class="slide">
							<a href="06_product_page.php?id=<?=$car_last['id']?>">
								<img src="<?=$car_last['photo1']?>" alt=""/>
								<div class="description">Рік: <?=$car_last['god']?><br/><?=$car_last['engine']?><br/>230 HP<br/>Тип: <?=$carcase['case_name']?><br/><?=$car_last['price']?></div>
								<div class="title">Mercedes-Benz <span class="price">Germany</span></div>
							</a>
						</div>
						<?}?>
					</div>
				</div>
				<div class="banners">
					<div class="banner_1 main_banner">
						<div class="text_wrapper">
							<p class="title"><strong>Шукаєте</strong> машину?</p>
							<p class="desc">На сайті кожного дня додається нова модель</p>
						</div>
						<a href="04_catalog.php">Знайти!</a>
					</div>
					<?$cars_pop = $funs->get_popular_cars();
					$time = new time();?>
				</div>
				<div class="wrapper_2">
					<div class="left">
						<div class="recent_blog">
							<div class="popular_cars"></div>
							<h2><strong>Машини </strong> з найвищим рейтингом</h2>
							<?foreach($cars_pop as $car_pop){
							$firma = $funs->get_mark($car_pop['id_mark']);
							$date = $time->time_set($car_pop['date']);
							$mark = $car_pop['rating'];
							?>
							<div class="post_block">
								<a href="06_product_page.php?id=<?=$car_pop['id']?>" class="thumb"><img src="<?=$car_pop['photo1']?>" alt=""/></a>
								<h5 style="text-align: center;"><a href="06_product_page.php?id=<?=$car_pop['id']?>"><?=$firma['name']?> <?=$car_pop['name']?></a></h5>
								<div class="rating_product_page" style="margin-left: 25px;">
								<h4>Оцінка: <?=$car_pop['rating']?>/5</h4>
							</div>
								<div class="date"><?=$date?></div>
							</div>
							<?}?>
						</div>
					
					</div>
					<div class="right">
	
						<div class="banners_wrapper">
							<div class="get_news_box">
								<h3><strong>Консультація</strong></h3>
								<form method="POST" action="php/mail/sendmail.php">
									<input type="email" maxlength="50" name="mail_send" placeholder="Пошта на яку прийде відповідь" class="txb" required/>
									<div class="mail_consultation">
									<textarea type="text" name="message_send" placeholder="Ваші пропозиції або питання..." required></textarea>
									</div>
									<input type="submit" value="Відправити" class="btn_subscribe"/>
								<?
									if($_SESSION['mail']['message'])
    									{
										echo '<div class="popup-bg" id="pop">
												<div class="popup">
													<img class="close-popup" src="images/buttons/close.png" alt="icon">';
														echo '<p>Ви відправили листа! Очікуйте фідбек на пошті, що вказали</p>';
												echo '</div>
											</div>';  
        							?>
										<script>
											$('.close-popup').click(function() {
											$('.popup-bg').fadeOut(800);
											});
										</script>
    									<?
										unset($_SESSION['mail']['message']);
    									}
									?>

								</form>
							</div>
							
						</div>
					</div>
					<div class="clear"></div>
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
				<?/* ========= SEARCH START ========= */
    if($_SESSION['search_result']){

        $sql = $_SESSION['search_result'];
        $searches = mysqli_query($link, $sql);
        $check =  mysqli_fetch_assoc($searches);

        
        echo '<div class="popup-bg2">
        <div class="popup2">
            <img class="close-popup2" src="images/buttons/close.png" alt="icon">';
            if($check !== NULL){
              foreach($searches as $search){
               $mark = $funs->get_mark($search['id_mark']);?>
			   <img src="<?=$search['photo1']?>" style="width: 90px;" class="">
               <a href="../06_product_page.php?id=<?=$search['id']?>"><?=$search['name']?> - <?echo $mark['name']?></a>
             <? }
             } else {?> <h4>Таких машин не існує в базі!</h4>  <?}
        echo '</div>
    </div>'; ?>
        
        <script>
          $('.close-popup2').click(function() {
          $('.popup-bg2').fadeOut(400);
        });
        </script>
		<? unset($_SESSION['search_result']);
    }  
    /* ======== SEARCH END ========== */?>
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
