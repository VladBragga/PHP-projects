<?
session_start();
include "php/connect.php";
include "php/action/get.php";

$funs =	new get_id();
$get_date = new time();
$cars = $funs->get_car($_GET['id']); 
$firma = $funs->get_mark($cars['id_mark']);
$carcase = $funs->get_carcase($cars['id_carcase']);
$gearbox = $funs->get_gearbox($cars['id_gear']);

$date = $get_date->time_set($cars['date']);
$ratings = $funs->get_rating($cars['id']);
$rat = mysqli_fetch_assoc($ratings);

if($rat !== NULL){
	foreach ($ratings as $rating)
	{
	  $kol_rating++;
	  $value_rating += $rating['value'];
	}
	$mark = $value_rating/$kol_rating;
	if($mark < 5 && $mark > 4.5) { $mark = 4.5; }
	if($mark < 4.5 && $mark > 4) { $mark = 4; }
	if($mark < 4 && $mark > 3.5) { $mark = 3.5; }
	if($mark < 3.5 && $mark > 3) { $mark = 3; }
	if($mark < 3 && $mark > 2.5) { $mark = 2.5; }
	if($mark < 2.5 && $mark > 2) { $mark = 2; }
	if($mark < 2 && $mark > 1.5) { $mark = 1.5; }
	if($mark < 1.5 && $mark > 1) { $mark = 1; }
	if($mark < 1 && $mark > 0.5) { $mark = 0.5; }
}

$comments = $funs->get_comment($cars['id']); 

$_SESSION['cars']['id'] = $cars['id'];// чтобы передать ID машины при создании коммента
$_SESSION['cars']['id_rating'] = $cars['id'];

$check_me2 = $funs->get_rating_user($_SESSION['user']['id'] , $cars['id']);
  $rating_user = mysqli_fetch_assoc($check_me2); // если чувак уже головал


   $rating_user === NULL ? $access_rating = 'yes' : $access_rating = 'no';
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
	<meta property="og:title" content="Product Page" />
	<meta property="og:url" content="http://localhost/06_product_page.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />
	<link rel="shortcut icon" href="images/blog_icons/free-icon-car-3231728.png" type="image/x-icon">
	<!-- Page Title -->
	<title>Car</title>
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
<body class="car">
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
							<li  class="current"><a href="04_catalog.php">Машини</a></li>
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
					<form method="get" action="#">
							<input type="text"  placeholder="Введіть назву машини" class="txb_search"/>
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
				<div class="breadcrumbs">
					<a href="index.php">Головна</a>
					<img src="images/marker_2.gif" alt=""/>
					<a href="04_catalog.php">Автомобілі</a>
					<img src="images/marker_2.gif" alt=""/>
					<span><?=$firma['name']?> <?=$cars['name']?></span>
				</div>
				<div class="main_wrapper">
					<div class="cars_id">
						<div class="id">Дата викладення: <span> <?=$date?></span></div>
						<!-- <div class="views">The offer had 1944 Views</div> -->
					</div>
					<div class="h1_name">
					<h1><strong><?=$firma['name']?></strong> <?=$cars['name']?></h1>
					</div>
					<div class="car_image_wrapper car_group">
						<div class="big_image">
							<a href="<?=$cars['photo1']?>" class="car_group">
								<img src="images/zoom.png" alt="" class="zoom"/>
								<img src="<?=$cars['photo1']?>" alt=""/>
							</a>
						</div>
						<div class="small_img">
							<a href="<?=$cars['photo2']?>" class="car_group">
								<img src="<?=$cars['photo2']?>" alt=""/>
							</a>
							<a href="<?=$cars['photo3']?>" class="car_group">
								<img src="<?=$cars['photo3']?>" alt=""/>
							</a>
							<a href="<?=$cars['photo4']?>" class="car_group">
								<img src="<?=$cars['photo4']?>" alt=""/>
							</a>
							<a href="<?=$cars['photo5']?>" class="car_group">
								<img src="<?=$cars['photo5']?>" alt=""/>
							</a>
						</div>
					</div>
					<div class="car_characteristics">
						<!-- <a href="#" class="print"></a> -->
						<div class="price"><?=$cars['price']?> грн.</div>
						
						<div class="clear"></div>
						<div class="features_table">
							<div class="line grey_area">
								<div class="left">Модель, Тип кузову:</div>
								<div class="right"><?=$firma['name']?> <?=$cars['name']?>, <?=$carcase['case_name']?></div>
							</div>
							<div class="line">
								<div class="left">Рік авто:</div>
								<div class="right"><?=$cars['god']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Тип палива:</div>
								<div class="right"><?=$cars['typeEngine']?></div>
							</div>
							<div class="line">
								<div class="left">Двигун:</div>
								<div class="right"><?=$cars['engine']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Трансмісія:</div>
								<div class="right"><?=$gearbox['name']?></div>
							</div>
							<div class="line">
								<div class="left">Категорія:</div>
								<div class="right"><?=$cars['level']?></div>
							</div>
							<div class="line grey_area">
								<div class="left">Мощність:</div>
								<div class="right"><?=$cars['power']?></div>
							</div>
						
							<div class="line">
								<div class="left">Розміри</div>
								<div class="right"><?=$cars['size']?></div>
							</div>
								<script>
										function myFunction() {
                                      		$('.rating_button').show();  
                                    	}
								</script>
							<form action="php/action/rating.php" method="POST">
								<div class="rating_product_page">
									<?if($access_rating == 'no'){?>
									<fieldset class="rating" name="rating" id="mySelect" onchange="myFunction()" disabled>
									<? } else{?>	
										<fieldset class="rating" name="rating" id="mySelect" onchange="myFunction()">
										<?}
										if($mark == 5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4.5){
                                    echo '<input type="radio" id="star5" name="rating" value="5" checked/><label class = "full" for="star5" title="Awesome - 5 stars"></label>';
                                      }
                                      else{
                                        echo '<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>';  
                                      }
                                      if($mark == 4.5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 5){
                                       echo  '<input type="radio" id="star4half" name="rating" value="4.5" checked/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>';
                                          }
                                     if($mark == 4 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 5){
                                       echo '<input type="radio" id="star4" name="rating" value="4" checked/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>';
                                          }
                                 if($mark == 3.5 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star3half" name="rating" value="3.5" checked/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>';
                                          }  
                                   if($mark == 3 && $mark != 1 && $mark != 2 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star3" name="rating" value="3" checked/><label class = "full" for="star3" title="Meh - 3 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3" title="Meh - 3 stars"></label>';
                                          }   
                                     if($mark == 2.5 && $mark != 1 && $mark != 2 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star2half" name="rating" value="2.5" checked/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>';
                                          }   
                                    if($mark == 2 && $mark != 1 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 1.5 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                       echo '<input type="radio" id="star2" name="rating" value="2" checked/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                                          }
                                          else{
                                      echo  '<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>';
                                          }        
                                          if($mark == 1.5 && $mark != 1 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                            echo '<input type="radio" id="star1half" name="rating" value="1.5" checked/><label class="half" for="star1half" title="Meh - 1.5 stars"></label>';
                                               }
                                               else{
                                           echo  '<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>';
                                               }   
                                    if($mark == 1 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 0.5 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                        echo '<input type="radio" id="star1" name="rating" value="1" checked/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                                               }
                                               else{
                                          echo  '<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
                                               }   
                                         if($mark == 0.5 && $mark != 1.5 && $mark != 2.5 && $mark != 3.5 && $mark != 4 && $mark != 1 && $mark != 2 && $mark != 3 && $mark != 4.5 && $mark != 5){
                                        echo '<input type="radio" id="starhalf" name="rating" value="0.5" checked/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
                                               }
                                               else{
                                          echo  '<input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
                                               }                ?>        
									</fieldset>
								</div>
									<? if($rat !== NULL) {?>
                                <div class="rating_voice">
                               <? if($kol_rating == 1){
                               ?>    <h4><?=$mark?>/5   (<?=$kol_rating?> голос)</h4>  
                               <? } ?>
                                 <? if($kol_rating == 2 || $kol_rating == 3 || $kol_rating == 4){
                               ?>   <h4><?=$mark?>/5   (<?=$kol_rating?> голоси)</h4>  
                               <? } ?>
                                 <? if($kol_rating > 4) {
                               ?>   <h4><?=$mark?>/5   (<?=$kol_rating?> голосів)</h4>  
                                <? } ?>
                                </div>
                                <?}
                                else {?>
                                    <h4>0 оцінок</h4>
                               <? }?>
									<? if($_SESSION['user']) {?>
										<button type="submit" class="rating_button">Голосувати</button>
                              		<? } ?>
										
							</form>
						</div>
					</div>
					<div class="clear"></div>
					<div class="info_box">
						<div class="car_info">
							<div class="info_left">
								<h2><strong>Інформація</strong> про машину</h2>
								<p><strong>Країна фірми:</strong><br/><?=$cars['country']?></p>
								<p><strong>Описання авто:</strong><br/><?=$cars['description']?></p>
							</div>
							<div class="info_right">
								<h2><strong>Фірма</strong> автомобілю</h2>
								<img src="<?=$firma['photo']?>" style="width: 150px;">
								<p class="first"><strong><?=$firma['name']?></strong></p>
								
								<p><?=$firma['info']?></p>
		
							</div>
							<div class="clear"></div>
						</div>
						<div class="car_contacts">
							<h2><strong>Сайти </strong> для покупки автомобілю</h2>
							<div class="left">
							<div class="web detail single_line"><a href="<?=$cars['link_of']?>" target="_blank"><?=$cars['link_of']?></a></div>
							
							</div>
							<div class="right">
							<div class="web detail single_line"><a href="<?=$cars['link_no']?>" target="_blank"><?=$cars['link_no']?></a></div>
								
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="car_sidebar">
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
							<input type="text" id="volume" name="volume" required maxlength="4"/>
						</div>
						<input type="submit" id="knopka1" value="Calculate" class="btn_calc"/>
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
					<div class="clear"></div>
					<!--  -->
					<div class="comments">
					<?  
                              if(mysqli_fetch_assoc($comments) === NULL){?>
                                  <h2>На даний момент ніхто не коментував риф. Будьте першим!</h2>
                             <? }
                            else {
                              $kol = 0;  
                              foreach($comments as $comment) {  $kol++;  }
                               
                               if($kol == 1) {
                                ?><h2><strong><?=$kol?> коментар </strong></h2>
                               <?}
                               if($kol == 2 || $kol == 3  || $kol == 4) {
                                ?><h2><strong><?=$kol?> коментарі </strong></h2>
                               <?}
                               if($kol > 4) {
                                ?><h2><strong><?=$kol?> коментарів </strong></h2>
                               <?} $i=0;?>
					
							<ul>
								
						<?	foreach($comments as $comment){
								 $author_comment = $funs->get_id_users_comment($comment['id_users']); 
								 $photo_user = $author_comment['photo'];
								 $date = $get_date->time_set($comment['date']);  
								if($i == 0){?>
								<li class="first"><?}
								else if($i == $kol){?>
								<li class="last">  <?}
								else{?>
									<li> <?}?>

									<div class="wrapper">
										<img src="<?=$photo_user?>" alt=""/>
										<div class="comment_data">
											<div class="comment_author">
												<div class="author"><?=$author_comment['nickname']?></div>
												<div class="date"><?=$date?> </div>
											</div>
											<div class="comment"><?=$comment['comment']?></div>
										</div>
										<?if($_SESSION['user']['role'] == 'адміністратор' ||
										$_SESSION['user']['role'] == 'творец' || 
										$author_comment['nickname'] == $_SESSION['user']['name'])
										echo '<a href="php/action/deleteComment.php?id=' .$comment['id'].'&car='.$cars['id'].'"><button class="delete_comment">Видалити</button></a>';?>
									</div>
								</li> 
								<? $i++;
									}?>
							</ul>
						</div>
						<?} if($_SESSION['user']){?>
						<div class="comment_form">
							
							<h2><strong>Залиште </strong> коментар</h2>
							<div class="comment_car">
								<form method="POST" action="php/action/comment.php">
										<div class="clear"></div>
										<textarea name="message" cols="20" rows="20"></textarea>
										<input type="submit" value="Відправити" class="submit"/>
								</form>
							</div>
						</div>
						<?}
						else {?>
							<div style="margin: 20px; ">
							<h3 style="margin-bottom: 20px;">Ви не авторизувалися, тому не маєте права залишати відгуки машинам!</h3>
							<a style="background-color: greenyellow; padding: 10px; ">Авторизуватися</a>
							</div>

						<?}?>
					<!--  -->
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
