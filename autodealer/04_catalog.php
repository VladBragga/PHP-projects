<?
session_start();
include "php/connect.php";
include "php/action/get.php";
/* SORT */
if(isset($_GET['sort_but'])){

	$sort = $_GET['sortirovka'];
  
	if($sort == 0) {
	  $sortirovka = mysqli_query($link, "SELECT * FROM `cars`");
  }
	if($sort == 'Датою+') {
	  $sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `name`");
  }
  if($sort == 'Датою-') {
	$sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `name` DESC");
}
	  if($sort == 'Ціна+') {
		$sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `price` ASC");
	  }
		if($sort == 'Ціна-') {
		  $sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `price` DESC");
		}
		if($sort == 'Назвою+') {
		  $sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `name` DESC");
		}
		  if($sort == 'Назвою-') {
			$sortirovka = mysqli_query($link, "SELECT * FROM `cars` ORDER BY `name` ASC");
		  }
		 /*  var_dump($sortirovka); */
  }
  /* FILTER */
  if(isset($_GET['but_genre'])){
	  $level = $_GET['level'];
	  $case = $_GET['case'];
	  $firma = $_GET['firma'];
	  $price1 = $_GET['price1'];
	  $price2 = $_GET['price2'];

	  $sql = "SELECT * FROM `cars` WHERE ";
	  if($level != '0'){
		$zapros1 = $zapros1.'`level` = "'.$level.'"';	 
	  }
	  if($case != '0'){
		$zapros2 = $zapros2.'`id_carcase` ='.$case;	 
  }
	if($firma != '0'){
		$zapros3 = $zapros3.'`id_mark` ='.$firma;	 
	}
	  if($price1 != 0 && $price2 != 0){
		$zapros4 = $zapros4.'`price` BETWEEN '.$price1.' AND '.$price2;		
		 }

	  if($zapros1 && $zapros2 && $zapros3 && $zapros4){
		  $zapros = $zapros.$zapros1.' and '.$zapros2.' and '.$zapros3.' and '.$zapros4;
		  $sql = $sql.$zapros;
		  $filters = mysqli_query($link, $sql);
	  }
	  else if($zapros1 && $zapros2 && $zapros3){
		$zapros = $zapros.$zapros1.' and '.$zapros2.' and '.$zapros3; 
		$sql = $sql.$zapros;
		  $filters = mysqli_query($link, $sql);
	  }
	  else if($zapros1 && $zapros2 && $zapros4){
		$zapros = $zapros.$zapros1.' and '.$zapros2.' and '.$zapros4; 
		$sql = $sql.$zapros;
		  $filters = mysqli_query($link, $sql);
	  }
	  else if($zapros1 && $zapros3 && $zapros4){
		$zapros = $zapros.$zapros1.' and '.$zapros3.' and '.$zapros4; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros2 && $zapros3 && $zapros4){
		$zapros = $zapros.$zapros2.' and '.$zapros3.' and '.$zapros4; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	/* ============================= */
	else if($zapros1 && $zapros2){
		$zapros = $zapros.$zapros1.' and '.$zapros2; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros1 && $zapros3){
		$zapros = $zapros.$zapros1.' and '.$zapros3; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros1 && $zapros4){
		$zapros = $zapros.$zapros1.' and '.$zapros4; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros2 && $zapros3){
		$zapros = $zapros.$zapros2.' and '.$zapros3; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros2 && $zapros4){
		$zapros = $zapros.$zapros2.' and '.$zapros4; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	else if($zapros2 && $zapros3){
		$zapros = $zapros.$zapros3.' and '.$zapros4; 
		$sql = $sql.$zapros;
		$filters = mysqli_query($link, $sql);
	}
	/* =========================== */
	else if($zapros1){ $sql = $sql.$zapros1;   $filters = mysqli_query($link, $sql); }
	else if($zapros2){ $sql = $sql.$zapros2;   $filters = mysqli_query($link, $sql); }
	else if($zapros3){ $sql = $sql.$zapros3;   $filters = mysqli_query($link, $sql); }
	else if($zapros4){ $sql = $sql.$zapros4;   $filters = mysqli_query($link, $sql); }

echo $sql;
  }
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
	<meta property="og:title" content="Catalog" />
	<meta property="og:url" content="http://localhost/04_catalog.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />
	<link rel="shortcut icon" href="images/blog_icons/free-icon-car-3231728.png" type="image/x-icon">
	<!-- Page Title -->
	<title>Catalog</title>
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
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.checkbox.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</head>
<body class="catalog catalog-list">
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
						<span>Головна</span>
						<ul>
						<li><a href="index.php">Головна</a></li>
							<li class="current"><a href="04_catalog.php">Машини</a></li>
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
					<form method="get" action="php/action/search2.php">
							<input type="text" name="search" placeholder="Введіть назву машини" class="txb_search"/>
							<input type="submit" value="Пошук" class="btn_search"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!--EOF HEADER-->
	<!--BEGIN CONTENT-->
	<?$func = new get_id();?>
		<div id="content">
			<div class="content">
				<div class="breadcrumbs">
					<a href="index.php">Головна</a>
					<img src="images/marker_2.gif" alt=""/>
					<span>Машини</span>
				</div>
				<div class="main_wrapper">
					<!-- <div class="cars_categories">
						<a class="active" href="#">new cars</a>
						<a href="#"><span>new cars</span></a>
						<a href="#"><span>used cars</span></a>
					</div> -->
					<h1><strong>Автомобілі</strong> (6 всього)</h1>
					<div class="catalog_sidebar">
						<form method="GET">
						<div class="search_auto">
							<h3><strong>Пошук</strong> авто</h3>
						
							<div class="clear"></div>
							<label><strong>Фірма:</strong></label>
							<div class="select_box_1">
								<select class="select_3" name="firma" required>
									<option value="0">Оберіть</option>
									<option value="1">BMW</option>
									<option value="2">Mercedes-Benz</option>
									<option value="3">Audi</option>
									<option value="4">Ford</option>
									<option value="5">Kia</option>
									<option value="6">Land-rover</option>
									<option value="7">Jeep</option> 
									<option value="8">Ferrari</option>  
								</select>
							</div>
							<label><strong>Тип кузову:</strong></label>
							<div class="select_box_1">
								<select class="select_3" name="case" required>
									<option value="0">Оберіть</option>
									<option value="1">Седан</option>
									<option value="2">Хетчбек</option>
									<option value="3">Купе</option>
									<option value="4">Кросовер</option>
									<option value="5">Позашляховик</option>
									<option value="6">Пікап</option>
									<option value="7">Кабріолет</option>
								</select>
							</div>
							<label><strong>Рівень машини:</strong></label>
							<div class="select_box_1">
								<select class="select_3" name="level" required>
									<option value="0">Оберіть</option>
									<option value="Люкс">Люкс</option>
									<option value="Для всіх дорог">Для всіх дорог</option>
									<option value="Гоночні">Гоночні</option>
									<option value="Звичайні">Звичайні</option>
									<option value="Для сім'ї">Для сім'ї</option>
								</select>
								<div class="clear"></div>
							</div>
							<label><strong>Ціна:</strong></label>
							<div class="select_box_2">
								<select class="select_4" name="price1" required>
									<option value="0">Від</option>
									<option value="500000">500 000</option>
									<option value="1000000">1 000000</option>
									<option value="1500000">1 500000</option>
									<option value="2000000">2 000000</option>
									<option value="2500000">2 500000</option>
								</select>
								<select class="select_4" name="price2" required>
									<option value="0">До</option>
									<option value="1000000">1 000000</option>
									<option value="1500000">1 500000</option>
									<option value="2000000">2 000000</option>
									<option value="2500000">2 500000</option>
									<option value="3000000">3 000000</option>
									<option value="4000000">4 000000</option>
									<option value="5000000">5 000000</option>
									<option value="7000000">7 000000</option>
								</select>
								<div class="clear"></div>
							</div>
							
							<input type="submit" value="Пошук" name="but_genre" class="btn_search"/>
							<div class="clear"></div>
						</div>
						</form>
						<div class="calculator">
							<h3><strong>Розмитнення авто </strong>в Україні</h3>
							<label><strong>Пальне:</strong></label>
							<div class="select_box_1">
								<select class="select_3" id="benz_select">
									<option value="0" selected>Бензин</option>
									<option value="1">Дизель</option>
									<option value="2">Електро</option>
									<option value="3">Гібрид</option>
								</select>
							</div>			
							<label><strong>Вік автомобіля:</strong></label>
							<div class="select_box_1">
								<select class="select_3" id="age_select" >
									<option value="1" selected>1 рік</option>
									<option value="2">2 рік</option>
									<option value="3">3 рік</option>
									<option value="4">4 рік</option>
									<option value="5">5 рік</option>
									<option value="6">6 рік</option>
									<option value="7">7 рік</option>
									<option value="8">8 рік</option>
									<option value="9">9 рік</option>
									<option value="10">10 рік</option>
									<option value="11">11 рік</option>
									<option value="12">12 рік</option>
									<option value="13">13 рік</option>
									<option value="14">14 рік</option>
									<option value="15">від 15 рік</option>
								</select>
							</div>
						<div class="calculator_input">
							<label><strong>Вартість авто (EUR):</strong></label>
							<input type="text" id="price" name="price" required maxlength="7"/>
							<label><strong>Робочий об'єм двигуна (см^3):</strong></label>
							<input type="text" id="volume" name="volume"  maxlength="4"/>
						</div>
						<input type="submit" id="knopka1" value="Розрахувати" class="btn_calc"/>
							<div id="str"></div>

						<script>
					knopka1.onclick = function(){
					
					let volume = document.getElementById("volume").value,
						price = document.getElementById("price").value;
						let benz = document.getElementById("benz_select").options.selectedIndex,
						age = document.getElementById("age_select").options.selectedIndex,
						volume_price, price_car, koef, akc, all;

					if(volume == '' && benz != 2) { alert("Введіть будь-ласка значення!") 
						exit();
					}
					if(benz != 2){
						if(999 >= Number(volume)) { alert("Некоректні значення!") 
						exit();
						}
					}
					if(1500 >= Number(price)) { alert("Введіть будь-ласка значення!") 
						exit();
					}

						if(benz == 0 || benz == 1) 	{ koef = 1; }
						if(benz == 3) { koef = 0.5; }
						if(benz == 2) { koef = 0.2; }
					
						if(volume <= 3000 && benz == 0) { volume_price = 50; }
						if(volume > 3000 && benz == 0) { volume_price = 100; }
						if(volume < 3500 && benz == 1) { volume_price = 75; }
						if(volume > 3500 && benz == 1) { volume_price = 150; }
						if(volume < 3000 && benz == 3) { volume_price = 35; }
						if(volume > 3000 && benz == 3) { volume_price = 75; }
	
						if(benz==2) { akc = 35 * koef * age }

					if(benz == 0 || benz == 1 || benz == 3){
						switch(age){
							case 0: { akc = koef * volume_price * age * 30; }  
							case 1: { akc = koef * volume_price * age * 30; }  
							case 2: { akc = koef * volume_price * age * 30; }  
							case 3: { akc = koef * volume_price * age * 30; }  
							case 4: { akc = koef * volume_price * age * 30; }  
							case 5: { akc = koef * volume_price * age * 30; }  
							case 6: { akc = koef * volume_price * age * 30; }  
							case 7: { akc = koef * volume_price * age * 30; }  
							case 8: { akc = koef * volume_price * age * 30; }  
							case 9: { akc = koef * volume_price * age * 30; }  
							case 10: { akc = koef * volume_price * age * 30; }  
							case 11: { akc = koef * volume_price * age * 30; }  
							case 12: { akc = koef * volume_price * age * 30; }  
							case 13: { akc = koef * volume_price * age * 30; }
							case 14: { akc = koef * volume_price * age * 30; }
							case 15: { akc = koef * volume_price * age* 30; }
						}
					};
						price_car = 0.1 * price;
					
						all = 0.22 * (price_car + akc);
						all+=300;
						let answer = all+" EUR";
						document.getElementById('str').innerHTML = answer;
					/* document.getElementById('str').innerHTML = answer; */
					};
				</script>

							<div class="clear"></div>
							</div>
						</div>
						
					</div>
					<div class="main_catalog">
						<div class="top_catalog_box">
							<div class="sorting drop_list">
								<form method="GET">
									<strong>Сортування за: </strong>
									<div class="selected sort">
										<select name="sortirovka" id="">
										<? if($sort == 0){?>
										<option value="0" selected>Стандарт</option>
										<?} else{?>
											<option value="0">Стандарт</option>
										<?} if($sort == 'Датою+'){?>
										<option value="Датою+" selected>Датою (вверх)</option>
										<?} else{?>
											<option value="Датою+">Датою (вверх)</option>	
										<?} if($sort == 'Датою-'){?>
										<option value="Датою-" selected>Датою (вниз)</option>
										<?} else{?>
											<option value="Датою-">Датою (вниз)</option>
										<?} if($sort == 'Ціна+'){?>
											<option value="Ціна+" selected>Ціною вверх</option>
										<?} else{?>
											<option value="Ціна+">Ціною вверх</option>
										<?} if($sort == 'Ціна-'){?>	
											<option value="Ціна-" selected>Ціною вниз</option>
										<?} else{?>
											<option value="Ціна-">Ціною вниз</option>
										<?} if($sort == 'Назвою+'){?>	
											<option value="Назвою+" selected>Назвою (А - Я)</option>
										<?} else{?>	
											<option value="Назвою+">Назвою (А - Я)</option>
										<?} if($sort == 'Назвою-'){?>	
											<option value="Назвою-" selected>Назвою (Я - А)</option>
										<?} else{?>	
											<option value="Назвою-">Назвою (Я - А)</option> <?}?>
										</select>
										<button name="sort_but" class="button button1">Сортувати <i class="fa fa-sort" aria-hidden="true"></i></button>
									</div>
								
								<button class="button button5">Відновити <i class="fa fa-times" aria-hidden="true"></i></button>
								</form>
								<div class="clear"></div>
							</div>
							<?/* PAGINATION */
                 
						 $page = isset($_GET['page']) ? $_GET['page'] : 1;
						 $noteOnPage = 4;
						 $from = ($page - 1) * $noteOnPage;
						 /*  */
						 
						 $count_result = $func->get_cars_id_kol();
						 $count = mysqli_fetch_assoc($count_result)['count'];
						 $pagesCount = ceil($count / $noteOnPage);
						 ?>
							<div class="pagination">
								<ul>
									<?
									
									for($i = 1; $i <= $pagesCount; $i++){
										if((!isset($_GET['page']) && $i == 1) || ( $i == $_GET['page']) && isset($_GET['page'])){?>
									<li class="active"><a href="?page=<?=$i?>"><?=$i?></a></li>
									<?} else {?>
									<li><a href="?page=<?=$i?>"><?=$i?></a></li>
									<?}
								  }

									?>
								</ul>
							</div>
							<div class="clear"></div>
						</div>
						<? 
						 
						 $cars = $func->get_cars_id_pagination($from, $noteOnPage);

						 if($_SESSION['search_result']){
							$sql = $_SESSION['search_result'];
							$searches = mysqli_query($link, $sql);
							$check =  mysqli_fetch_assoc($searches);
								if($check !== 0){
									$cars = $searches; 
								}
						  }
						if(isset($_GET['sort_but']) && ($sort != NULL)){
							$cars = $sortirovka;
						  }
						  else if(isset($_GET['but_genre'])){
							$cars = $filters;
						  }
						
						  ?>
						  <ul class="catalog_table">
						<?
						if(mysqli_fetch_assoc($cars) === NULL && !$_SESSION['search_result']){
							?>
							<h2 style="text-align: center;">Таких машин ще не додано!</h2>
						<?}  
						if($_SESSION['search_result'] && $check === NULL){
							?>
							<h2 style="text-align: center;">Таких машин ще не додано!</h2>
						<?}  
						foreach($cars as $car){ 
							$carcase = $func->get_carcase($car['id_carcase']);
							$mark = $func->get_mark($car['id_mark']);
							?>
							<li>
								<a href="06_product_page.php?id=<?=$car['id']?>" class="thumb"><img src="<?=$car['photo1']?>" alt=""/></a>
								<div class="catalog_desc">
									<div class="location">Країна: <?=$car['country']?></div>
									<div class="title_box">
										<h4><a  href="06_product_page.php?id=<?=$car['id']?>"><?echo $mark['name'];?>  <?=$car['name']?></a></h4>
									<fieldset class="rating">
										<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
										<input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
										<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
										<input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
										<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
										<input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
										<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
										<input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
										<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
										<input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
									</fieldset>
										<div class="price"><?=$car['price']?> UAH</div>
									</div>
									<div class="clear"></div>
									<div class="grey_area">
										<span>Рік випуску <?=$car['god']?></span>
										<span><?=$car['engine']?></span> 
										<span>Тип: <?=$carcase['case_name']?></span>
										<span><?=$car['power']?></span>
									</div>
									<a href="06_product_page.php?id=<?=$car['id']?>" class="more markered">Детальніше</a>
								</div>
							</li>
					<?
				}
				unset($_SESSION['search_result']);
				?>
						</ul>
					</div>
					<div class="clear"></div>
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
