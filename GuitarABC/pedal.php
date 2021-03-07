<?php
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
			</div>
			<div class="col-sm-4 col-lg-6">
				<div class="logo text-center">
					<a href="index.php">
						<h1><span class="select">Guitar ABC.</span></h1>
						<h4>бібліотека гітарного світу</h4>
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div><!--End Header Area-->
<div class="menu-area"><!--Start Main Menu Area-->
	<div class="container">
		<div class="row">
			<div class="clo-md-12">
				<div class="main-menu hidden-sm hidden-xs">
					<nav>
						<ul>
							<li><a href="index.php" class="active"><span class="lang2">Головна</span></a>
							</li>
							<li><a ><span class="lang2">Гітари</span></a>
								<ul class="sub-menu">
									<li><a href="gitara_1.php">Акустичні гітари</a></li>
									<li><a href="gitara_2.php">Електрогітари</a></li>
									<li><a href="gitara_3.php">Класичні гітари</a></li>
									<li><a href="gitara_4.php">Бас гітари</a></li>
								</ul>
							</li>
							<li><a><span class="lang2">Комбопідсилювачі</span></a>
								<ul class="sub-menu">
									<li><a href="combik_1.php">Для акустичної гітари</a></li>
									<li><a href="combik_2.php">Для електрогітари</a></li>
									<li><a href="combik_3.php">Для басу</a></li>
								</ul>
							</li>
							
<li><a href="pedal.php"><span class="lang2">Педалі ефектів </span></a>						
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div><!--End Main Menu Area-->
<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2>Педалі ефектів та процесори</h2>
	</div>
</div><!--End Title-->
<div class="shop-product-area section fix"><!--Start Shop Area-->
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="shop-sidebar fix">
					<!-- single-sidebar start -->
				
					<div class="sin-shop-sidebar shop-category">
					<h2>Призначення</h2>
						<ul>
							<li><a 	class="activer_p" values = "elec" >Для електрогітари</a></li>
							<li><a 	class="activer_p" values = "acus" >Для акустикичної гітари</a></li>
							<li><a 	class="activer_p" values = "bass" >Для бас гітари</a></li>
							
							
						</ul>
					</div>
					<!-- single-sidebar end -->
					<!-- single-sidebar start -->

					<!-- single-sidebar end -->
					<!-- single-sidebar start -->
					<div class="sin-shop-sidebar shop-brands">
						<h2>Фірма</h2>
						<ul>
							<li><a 	class="activer_p1" values = "boss" >BOSS</a></li>
							<li><a 	class="activer_p1" values = "zoom" >Zoom</a></li>
							<li><a 	class="activer_p1" values = "dun" >Dunlop</a></li>
							<li><a 	class="activer_p1" values = "mooer" >Mooer</a></li>
							
						</ul>
					</div>
					<!-- single-sidebar end -->
					<!-- single-sidebar start -->
					<!-- single-sidebar end -->
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="shop-tool-bar col-sm-12 fix">
						
						<?php
									$products = mysqli_query($link, "SELECT * FROM `pedal`");
									 $goods  = mysqli_fetch_all($products); 
									 $kol=0;
									 foreach ($goods as $good)
									{$kol += 1;}
									 ?>
							<div class="sort-by">
						
						<span>Сортування гітар по: </span>
							<select name="sort-by" class= "sortirvka_7">
								<option default value = "original-order"> Стандарт</option>
								<option value="name">По назві вверх</option> 
								<option value="name_2">По назві вниз</option> 

							</select>
						</div>
						
						<div class="pro-Showing">
						<?php	
						if($kol==1 )
						echo '<span> В каталозі ' .$kol. ' процесор</span>';
						if($kol==2 ||  $kol==3 || $kol==4)
						echo '<span> В каталозі ' .$kol. ' процесори</span>';
						if($kol>4)
						
						echo '<span> В каталозі ' .$kol. ' процесорів</span>';
							?>
						</div>
					</div>
					<div class = "git_p">
					<div class="shop-products">
						
								<?php
								if(isset($_GET['page'])){
									$page = $_GET['page'];
								}else{ $page=1;}
								$notesOnPage = 6;
								$from = ($page-1) * $notesOnPage;
								$quary = "SELECT * FROM `pedal` LIMIT $from, $notesOnPage";
								$table = mysqli_query($link, $quary);
											
								foreach($table as $row)
									 { 
									  	/* Single Product Start -->*/
									
										echo '<div class="col-sm-4 fix">';
										echo  '<div class="product-item fix">';
											?>
												<div class="product-img-hover">
										<!-- Product image -->
							
									<a class="pro-image fix" href="/pedal_details.php?id=<?=$row['p_id']?>"> <img src="<?=$row['p_photo']?>" alt="product" width="270px" height="246px"/></a>
										<!-- Product action Btn -->
										
										</div>
									
										<!-- Product Name -->
										<div class="pro-name">
											<a href="/pedal_details.php?id=<?=$row['p_id']?>"><?=$row['p_name']?></a>
											
												<p><span class="old"><?=$row['p_country']?></span></p>
										
										</div>
										<!-- Product Price -->
										</div>
						</div><!-- Single Product End -->
									<?php
										
									}
									echo '</div>';
									$quary = "SELECT COUNT(*) as count FROM `pedal`";
								$table = mysqli_query($link, $quary);
								$count = mysqli_fetch_assoc($table)['count'];
								$pagesCount = ceil($count / $notesOnPage);

								echo  '<!-- Pagination -->';
								echo '<div class="pagination">';
								
							for($i=1; $i <=$pagesCount; $i++){
								echo	'<ul>';
								echo	"<li><a href=\"?page=$i\">$i</a> </li>";
								echo	'</ul>';
							}
						echo '</div>';
						?>	
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-area4">
<div class="container">
			</div>
</div><!--Start Shop Area-->

	

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
<script type="text/javascript" src="app_2.js"></script>
</body>

</html>