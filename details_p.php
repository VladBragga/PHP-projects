<?php
		include "functions.php";
		$funs =	new fun();
		        $pedal_id = $funs->get_pedal_id($_GET['id']);
        if($_SESSION['prava']=="-")
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
<div class="page-title fix"><!--Start Title-->
	<div class="overlay section">
		<h2><?php	echo $pedal_id['p_name'];?></h2>
	</div>
</div><!--End Title-->
<?php 
	$funs =	new fun();
$var = $funs->get_vary($pedal_id['id_vid']); 
       if($pedal_id['id_vid']==2)
	   $vid=" Для акустичної гітари";
		 if($pedal_id['id_vid']==3)
		 $vid=" Для електрогітари";
		 if($pedal_id['id_vid']==4)
		 $vid=" Для бас гітари";
  ?>
<section class="product-page page fix"><!--Start Product Details Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="details-pro-tab">
			<!-- Tab panes -->
					<div class="tab-content details-pro-tab-content">
						<div class="tab-pane fade in active" id="image-1">
							<div class="simpleLens-big-image-container">
								<a class="simpleLens-lens-image" data-lens-image="<?php	echo $pedal_id['p_photo'];?>">
									<img src="<?php	echo $pedal_id['p_photo'];?>" alt="" class="simpleLens-big-image">
								</a>
							</div>
						</div>
					</div>
					<!-- Nav tabs -->
			
					<ul class="tabs-list details-pro-tab-list" role="tablist">
						<li class="active"><a href="#image-1" data-toggle="tab"><img src="<?php	echo $pedal_id['p_photo'];?>" alt="" /></a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="shop-details">
					<!-- Product Name -->
					<div class="select-menu fix">
						<div class="sort fix">
						   
							<h2 line-height="2.9em" text-align="centre" ><?php echo $pedal_id['p_name'];?> </h2>
								
						</div>
					</div>
			
					<div class="detal_pr">
					<h6 > Країна виготовлювача: <a><?php	echo $pedal_id['p_country'];?></h6></a>
					<h6 > Кількість ефектів: <a><?php	echo $pedal_id['p_kol_e'];?></h6></a>
					
					<h6 > Призначення: <a><?php echo $vid;  ?></h6></a>
					
					<h6 > Входи: <a><?php	echo $pedal_id['p_vhod'];?></h6></a>
					<h6 > Виходи: <a> <?php 	echo $pedal_id['p_vihod'];?></h6></a>
					<h6 > Живлення: <a><?php	echo $pedal_id['p_giv'];?></a></h6>
					<h6 > Розміри: <a><?php	echo $pedal_id['p_size'];?> мм</a></h6>
					<h6 > Маса: <a><?php	echo $pedal_id['p_masa'];?> кг</a></h6>
					<?php 	if($pedal_id['p_site'] == "Товар не продається в Україні")
					{ 
						echo    '<h6>' .$pedal_id['p_site'].'<h6 >';
					}        
   					else{
					echo'<div class="log-link">';
					echo '<h6> Посилання на <a target="new" href="'.$pedal_id['p_site']. '"><u>сайт</u> </a>з найвигіднішою ціною на цю примочку </h6>';
					echo'</div>';
						}
					?>
					</div>
				</div>  
			</div>
			<div class="col-sm-6 fix">
				<div class="description">
					<!-- Nav tabs -->
					<div class="nav product-nav">
						<li><a>ДОДАТКОВА ІНФОРМАЦІЯ ПРО ПРИМОЧКУ</a></li>
						</div>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="description" class="tab-pane fade active in" role="tabpanel">
							<p><?php	echo $pedal_id['p_add'];?></p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!--End Product Details Area-->
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