<?
session_start();
include "php/connect.php";
include "php/action/get.php";
if($_SESSION['user']['role'] != 'творец' &&  $_SESSION['user']['role'] != 'адміністратор'){
	header('Location:http://autodealer/03_404.php');
}
		$func = new get_id();
             $get_date = new time();
            $cars = $func->get_all_car();
            $users = $func->get_users();
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
							<li><a href="index.php">Головна</a></li>
							<li><a href="04_catalog.php">Машини</a></li>
							<li><a href="12_gallery.php">Галерея</a></li>
							<li><a href="02_contacts.php">Про нас</a></li>
							<?
							if($_SESSION['user']['role'] == 'адміністратор' || $_SESSION['user']['role'] == 'творец'){	
							
								echo    '<li class="current"><a href="05_admin.php">Налаштування</a></li>';
								}
							?>
							<!-- <li><a href="/HTML/autodealer/04_catalog.html">Налаштування</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!--EOF HEADER-->
	<div class="breadcrumbs" style="margin-left: 200px; margin-top: 15px;">
					<a href="index.php">Головна</a>
					<img src="images/marker_2.gif" alt=""/>
					<span>Адміністративна панель</span>
				</div>
<div class="admin">	
	<!--  =======================  -->
	<?if($_SESSION['user']['role'] == 'творец'){ ?>
	<h2>Таблиця користувачів</h2>
	<div class="admin_table">
		<table>
			<tr>
			<th>id</th>
			<th>Ім'я користувача</th>
			<th>Нікнейм</th>
			<th>Зробити адміном</th>
			<th>Видалити</th>
			</tr>
			<? $i_user = 1;
			foreach($users as $user){?>
			<tr>
			<td><?=$i_user?></td>
			<td><?=$user['full_name']?></td>
			<td><?=$user['nickname']?></td>

			<?if($user['role'] == 1){?>

<?echo    '<td><a class="change_user" href="php/admin/changeUser.php?id='. $user['id_users'].'&bool='."true".'"><button class="admin_do">Зробити</button></a></td>';?>
<?echo    '<td><a class="delete_song_admin" href="./php/admin/deleteUser.php?id=' .$user['id_users']. '"><img src="images/buttons/delete_icon_129320.png" style="width: 26px;"></a></td>';
			  }
			  if($user['role'] == 2) {?>
<?echo    '<td><a href="php/admin/changeUser.php?id='. $user['id_users'].'&bool='."false".'"><button class="admin_do_red">Убрати</button></a></td>';?>
<?echo    '<td><a href="./php/admin/deleteUser.php?id=' .$user['id_users']. '"><img src="images/buttons/delete_icon_129320.png" style="width: 26px;"></a></td>';
			   }
			   if($user['role'] == 3) {?>
			   <td><p>Керівник</p></td> 
			   <td><p>сайту</p></td>
			   <?}?> 
			</tr>
		<? $i_user++;
	}?>
		</table>
	</div>
	<?}?>
		
	<h2>Таблиця автомобілів</h2>
	<div class="button_add_class">
	<a href="07_add.php"><button class="button button2">Додати автомобіль</button></a>
	</div>
	<div class="admin_table">
		<table>
			<tr>
			<th>id</th>
			<th>Фотографія</th>
			<th>Назва</th>
			<th>Перегляд</th>
			<th>Змінити</th>
			<th>Видалити</th>
			</tr>
			<?$index_cars = 1;
			foreach($cars as $car){
				$mark = $func->get_mark($car['id_mark'])?>
				<tr>
				<td><?=$index_cars?></td>
				<td><img src="<?=$car['photo1']?>" style="width: 100px;"></td>
				<td><?=$mark['name']?> <?=$car['name']?></td>
				<td><a href="06_product_page.php?id=<?=$car['id']?>" class="admin_delete"><img src="images/buttons/free_icon_views.png" style="width: 30px;"></a></td>
				<td><a href="changeCar.php?id=<?=$car['id']?>" class="admin_delete"><img src="images/buttons/free_icon_edit_tool.png" style="width: 30px;"></a></td>
				<td><a href="php/cars/del_car.php?id=<?=$car['id']?>" class="admin_delete"><img src="images/buttons/delete_icon_129320.png" style="width: 26px;"></a></td>
				</tr>
			<?$index_cars++;
		}?>
		</table>
	</div>
</div>
</body>
</html>