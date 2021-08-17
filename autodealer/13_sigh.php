<?
session_start();
include "php/connect.php";

/* if(($_SESSION['user']))
{
	echo '<HTML><HEAD><META HTTP-EQUIV="REFRESH" CONTENT="1; URL=http://test/exit_admin.php"></HEAD></HTML>';
} */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Facebook APP ID -->
    <meta property="fb:app_id" content="12345" />

    <meta name="keywords" content="Car-Dealer, auto-salon, automobile, business, car, car-gallery, car-selling-template, cars, dealer, marketplace, mobile, real estate, responsive, sell, vehicle" />
    <meta name="description" content="Auto Dealer HTML - Responsive HTML Auto Dealer Template" />

    <!-- Open Graph -->
    <meta property="og:site_name" content="Auto Dealer HTML" />
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
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
							<!-- <li><a href="/HTML/autodealer/04_catalog.html">Налаштування</a></li> -->
						</ul>
					</div>
				
				</div>
			</div>
		</div>
	<!--EOF HEADER-->
	<?
        if ($_SESSION['users']['success_message'] ){
        echo '<div class="popup-bg" id="pop">
                <div class="popup">
                    <img class="close-popup" src="images/buttons/close.png" alt="icon">';
                        echo '<p>' . $_SESSION['users']['success_message'] . '</p>';
                echo '</div>
            </div>';  
        
    ?>
    <script>
        $('.close-popup').click(function() {
        $('.popup-bg').fadeOut(800);
        document.location.href = "http://autodealer/index.php";
        });
    </script>
    <?
        };
        unset($_SESSION['users']['success_message']);
    

        if ($_SESSION['login']){
            echo '<div class="popup-bg">
                    <div class="popup">
                        <img class="close-popup" src="images/buttons/close.png" alt="icon">';
                            echo '<p>Ви успішно авторизувалися, ' . $_SESSION['login'] . '!</p>';
                    echo '</div>
                </div>';  
        ?>
        <script>
            $('.close-popup').click(function() {
            $('.popup-bg').fadeOut(800);
            document.location.href = "http://autodealer/index.php";
            });
        </script>
        <?php
          unset($_SESSION['login']);
        };
        
        if($_SESSION['user']['send_mail']){
            echo '<div class="popup-bg" id="pop">
            <div class="popup_not_login">
                <img class="close-popup-log" src="images/buttons/close.png" alt="icon">';
                    echo '<p>Авторизуйтеся для відправки смс</p>';
            echo '</div>
        </div>';  
        } 
        
        unset($_SESSION['user']['send_mail']);
    ?>
    <script>
        $('.close-popup-log').click(function() {
        $('.popup-bg').fadeOut(800);
        });
    </script>
    <!-- ======================================-->
    <div class="row">
        <div class="breadcrumbs">
            <div class="home_reg_panel">
					<a href="index.php">Головна</a>
					<img src="images/marker_2.gif" alt=""/>
					<span>Реєстрація & Авторизація</span>
                    </div>
				</div>
        <!-- BEGIN FORM REGISTRATION-->
        <div class="column">
            <div class="registration">
                <div class="comment_form">
                    <h2><strong>Реєстрація</strong></h2>
                    <form method="POST" action="php/sigh/check_reg.php" class="reg_form" enctype="multipart/form-data">

                        <label>Повне ім'я: </label>
                        <input type="text" id="full_name" name="full_name" required/>

                        <label>Нікнейм: </label>
                        <input type="text" id="username" name="username" required/>

                      
                            <label class="custom-file-upload">
                                <input id="fl_inp" name="avatar" type="file"/>
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i> Додати аватарку
                            </label>
                            <div id="fl_nm" style="margin-left: 50px;"><h7>Файл не выбран</h7></div>
                      
                            <script>
                            $(document).ready( function() {
                                $("#fl_inp").change(function(){
                                    var filename = $(this).val().replace(/.*\\/, "");
                                    $("#fl_nm").html(filename);
                                });
                            });
                            </script>
                        <label>Пошта: </label>
                        <input type="email" id="mail" name="mail" required/>

                        <div class="clear"></div>

                        <label>Пароль: </label>
                        <input type="password" id="password" name="password" required/>

                        <label>Підтвердити пароль: </label>
                        <input type="password" id="password_confirm" name="password_confirm" required/>

                        <div class="sign_ui">
                            <input type="submit" value="Реєстрація" id="registration" class="submit" />
                        </div>
                        <?php
                        if ($_SESSION['full_name']) {
                            echo '<p class = "check_log">' . $_SESSION['full_name'] . '</p>';
                        } else if ($_SESSION['username']) {
                            echo '<p class = "check_log">' . $_SESSION['username'] . '</p>';
                        } else if ($_SESSION['mail']) {
                            echo '<p class = "check_log">' . $_SESSION['mail'] . '</p>';
                        } else if ($_SESSION['password']) {
                            echo '<p class = "check_log">' . $_SESSION['password'] . '</p>';
                        } else if ($_SESSION['password_confirm']) {
                            echo '<p class = "check_log">' . $_SESSION['password_confirm'] . '</p>';
                        }else if ($_SESSION['register_error']) {
                            echo '<p class = "check_log">' . $_SESSION['register_error'] . '</p>';
                        }
                        unset($_SESSION['register_error']);
                        unset($_SESSION['full_name']);
                        unset($_SESSION['mail']);
                        unset($_SESSION['username']);
                        unset($_SESSION['password']);
                        unset($_SESSION['password_confirm']);
                        
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- EOF REGISTRARTION-->

        <div class="column">
            <!-- BEGIN LOGIN-->
            <div class="login">
                <div class="comment_form">
                    <h2><strong>Авторизація</strong></h2>
                    <form method="POST" action="php/sigh/check_log.php">

                        <label>Нікнейм: </label>
                        <input type="text" name="username_login" required />

                        <div class="clear"></div>

                        <label>Пароль: </label>
                        <input type="password" name="password_login" required/>

                        <div class="sign_ui">
                            <input type="submit" value="Логін" class="submit" id="login" />
                        </div>
                       <!--  <p class = "check_log">Неправильний логін чи пароль</p> -->
                        
                       <?php
                       if ($_SESSION['password_login']) {
                           echo '<p class = "check_log">' . $_SESSION['password_login'] . '</p>';
                       } else if ($_SESSION['username_login']) {
                           echo '<p class = "check_log">' . $_SESSION['username_login'] . '</p>';
                       } else if ($_SESSION['login_error']) {
                           echo '<p class = "check_log">' . $_SESSION['login_error'] . '</p>';
                       }
                       
                       unset($_SESSION['login_error']);
                       unset($_SESSION['username_login']);
                       unset($_SESSION['password_login']);
                       ?>
                    </form>
                </div>
            </div>

        </div>
        
        <!-- EOF LOGIN-->
    </div>
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