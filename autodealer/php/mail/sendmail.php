<?
session_start();

if(!$_SESSION['user']['full_name']){
    $_SESSION['user']['send_mail'] = "not_login";
    header('Location:http://autofuture/HTML/autodealer/13_sigh.php');
    exit();
}
$to = "alinausik980@gmail.com";
$from = trim($_POST['mail_send']);
$subject = 'Питання користувача сайту AutoFuture.ua ' . $_SESSION['users']['username'] . '.';
$message_send = htmlspecialchars($_POST['message_send']);
$message_send = urldecode($message_send);
$message_send = trim($message_send);

$headers = "From: $from" . "\r\n" . 
    "Reply-To: $from" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    if(mail($to, $subject, $message_send, $headers))
        $_SESSION['mail']['message'] = "+";
        
        header('Location:http://autofuture/HTML/autodealer/index.php'); 