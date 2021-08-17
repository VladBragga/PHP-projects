<?
session_start();
include "php/connect.php";
include "php/action/get.php";
if(!$_SESSION['user']){
	header('Location:http://autofuture/HTML/autodealer/03_404.php');
}
if($_SESSION['user']['role'] == 'користувач'){
	header('Location:http://autofuture/HTML/autodealer/03_404.php');
}
$id = $_GET['id'];
$func = new get_id();
$car = $func->get_car($id);
$mark = $func->get_mark($car['id_mark']);
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
	<meta property="og:title" content="Add Product" />
	<meta property="og:url" content="http://localhost/07_add.html" />
	<meta property="og:image" content="http://cdn.winterjuice.com/example/autodealer/image.jpg" />
	<meta property="og:description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />
	<link rel="shortcut icon" href="images/blog_icons/free-icon-car-3231728.png" type="image/x-icon">
	<!-- Page Title -->
	<title>Change</title>
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
<body class="sell">
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
							<li><a href="12_gallery.php">Галерея</a></li>
							<li><a href="02_contacts.php">Про нас</a></li>
							<?
							if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'творец'){	
							
								echo    '<li class="current"><a href="05_admin.php">Налаштування</a></li>';
								}
							?>
						</ul>
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
					<span>Редагування автомобілю</span>
				</div>
					
					
			
				<div class="main_wrapper">
                  <form action="php/cars/change_car.php?id=<?=$car['id']?>" enctype="multipart/form-data" method="post">
					<div class="sell_box sell_box_1">
                      
						<h2><strong>Редагування</strong> автомобіля <?=$mark['name']?> <?=$car['name']?></h2>
						<?
						if($_SESSION['error_type']){?>
							<div class="error_message">
								<p><?=$_SESSION['error_type']?></p>
							</div>
							<?unset($_SESSION['error_type']);
						}
						if($_SESSION['error_size']){?>
							<div class="error_message">
								<p><?=$_SESSION['error_size']?></p>
							</div>
							<?unset($_SESSION['error_size']);
						}
						if($_SESSION['error_car']){?>
							<div class="error_message">
								<p><?=$_SESSION['error_car']?></p>
							</div>
							<?unset($_SESSION['error_car']);
						}
						?>
						
						<div class="select_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Фірма авто:</strong></label>
							<select class="select_5" name="mark">
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
						<div class="input_wrapper">
							
								<label style="margin-right: 35px;"><span>* </span><strong>Назва моделі</strong></label>
							<div class="input_model">
								<input type="text" class="txb" name="name" value="<?=$car['name']?>" />
							</div>
						</div>
						<div class="select_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Рік випуску:</strong></label>
							<select class="select_5" name="god" >
								<option value="0">Оберіть</option>
								<option value="2021">2021</option>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="2017">2017</option>
								<option value="2016">2016</option>
								<option value="2015">2015</option>
								<option value="2014">2014</option>
							</select>
						</div>
						<div class="select_wrapper last">
							<label><span>* </span><strong>Тип кузову:</strong></label>
							<select class="select_5" name="carcase" >
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
						<div class="select_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Тип двигуна:</strong></label>
							<select class="select_5" name="typeEngine" >
								<option value="0">Оберіть</option>
								<option value="Бензин">Бензин</option>
								<option value="Дизель">Дизель</option>
								<option value="Електро">Електро</option>
								<option value="Гібрид">Гібрид</option>
							</select>
						</div>
						<div class="select_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Трансмісія</strong></label>
							<select class="select_5"  name="geare_box" >
								<option value="0">Оберіть</option>
								<option value="1">Механіка</option>
								<option value="2">Автоматична</option>
								<option value="3">Роботизована</option>
							</select>
						</div>
						<div class="input_wrapper">
								<label style="margin-right: 35px;"><span>* </span><strong>Потужність</strong></label>
							<div class="input_model">
								<input type="text" class="txb" name="power" value="<?=$car['power']?>" />
							</div>
						</div>
						<div class="input_wrapper last">
								<label><span>* </span><strong>Двигун <span>(об'єм) </span></strong></label>
							<div class="input_model">
								<input type="text" class="txb" name="engine" value="<?=$car['engine']?>" />
							</div>
						</div>
						<div class="input_wrapper">
								<label style="margin-right: 35px;"><span>* </span><strong>Габарити</strong></label>
							<div class="input_model">
								<input type="text" class="txb" name="size" value="<?=$car['size']?>" />
							</div>
						</div>
						<div class="input_wrapper">
								<label style="margin-right: 35px;"><span>* </span><strong>Країна</strong></label>
							<div class="input_model">
								<input type="text" class="txb" name="country" value="<?=$car['country']?>" />
							</div>
						</div>
						<div class="select_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Категорія</strong></label>
							<select class="select_5"  name="level" >
								<option value="0">Оберіть</option>
								<option value="Люкс">Люкс</option>
								<option value="Для всіх дорог">Для всіх дорог</option>
								<option value="Спортивна">Спортивна</option>
								<option value="Звичайна">Звичайна</option>
								<option value="Для сім`ї">Для сім'ї</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
			
					<div class="sell_box sell_box_3">
						<h2><strong>Ціна</strong>  та <strong>купівля</strong> автомобіля</h2>
						<div class="select_wrapper" style="margin-left: 120px;">
							<label style="margin-right: 35px;"><span>* </span><strong>Ціна: </strong></label>
							<input type="number" class="txb" name="price" value="<?=$car['price']?>" />
						</div>
						<div class="input_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>З салону: </strong></label>
							<input type="text" class="txb" name="link_of"  value="<?=$car['link_of']?>"/>
						</div>
						<div class="input_wrapper">
							<label style="margin-right: 35px;"><span>* </span><strong>Неофіційний поставщик </strong></label>
							<input type="text" name="link_no" class="txb"  value="<?=$car['link_of']?>"/>
						</div>
						<div class="clear"></div>
					</div>
					<div class="sell_box sell_box_4">
						<h2><strong>Фото</strong> автомобіля</h2>
						
						<div class="foto_wrapper" style="margin-left: 70px;">
							<a>
                            <label class="custom-file-upload">
                                <input id="fl_inp1" name="photo1" type="file" />
                                <img src="images/upload.png" alt="" class="upload"/> Вставити фото
                            </label>
							</a>
                            <div id="fl_nm1" ><h7>Файл не обрано</h7></div>
						</div>
						<div class="foto_wrapper">
							<a>
                            <label class="custom-file-upload">
                                <input id="fl_inp2" name="photo2" type="file" />
                                <img src="images/upload.png" alt="" class="upload"/> Вставити фото
                            </label>
							</a>
                            <div id="fl_nm2" ><h7>Файл не обрано</h7></div>
						</div>
						<div class="foto_wrapper">
							<a>
                            <label class="custom-file-upload">
                                <input id="fl_inp3" name="photo3" type="file" />
                                <img src="images/upload.png" alt="" class="upload"/> Вставити фото
                            </label>
							</a>
                            <div id="fl_nm3" ><h7>Файл не обрано</h7></div>
						</div>
						<div class="foto_wrapper">
							<a>
                            <label class="custom-file-upload">
                                <input id="fl_inp4" name="photo4" type="file" />
                                <img src="images/upload.png" alt="" class="upload"/> Вставити фото
                            </label>
							</a>
                            <div id="fl_nm4" ><h7>Файл не обрано</h7></div>
						</div>
						
						<div class="foto_wrapper last">
							<a>
                            <label class="custom-file-upload">
                                <input id="fl_inp5" name="photo5" type="file"/>
                                <img src="images/upload.png" alt="" class="upload" /> Вставити фото
                            </label>
							</a>
                            <div id="fl_nm5" ><h7>Файл не обрано</h7></div>
						</div>

						<script>
                            $(document).ready( function() {
                                $("#fl_inp5").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm5").html(filename);
                                });
                            });
							$(document).ready( function() {
                                $("#fl_inp4").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm4").html(filename);
                                });
                            });
							$(document).ready( function() {
                                $("#fl_inp4").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm4").html(filename);
                                });
                            });
							$(document).ready( function() {
                                $("#fl_inp3").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm3").html(filename);
                                });
                            });
							$(document).ready( function() {
                                $("#fl_inp2").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm2").html(filename);
                                });
                            });
							$(document).ready( function() {
                                $("#fl_inp1").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm1").html(filename);
                                });
                            });
                            </script>
						<div class="clear"></div>
					</div>
					<div class="sell_box sell_box_5">
						<h2><strong>Детальна інформація</strong> про машину</h2>
						<div class="input_wrapper">
							<textarea type="text" name="opis" class="txb" style="min-width: 920px; min-height: 150px;"><?=$car['description']?></textarea>
						</div>
						
						
						<div class="clear"></div>
					</div>
					<div class="sell_submit_wrapper">
						
						<input type="submit" value="Оновити" class="sell_submit"/>
						<div class="clear"></div>
					</div>
                </form>
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
