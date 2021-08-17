<?
session_start();

$to = "alinausik980@gmail.com";
$from = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
$subject = 'Питання з сайту Riffs_UA.';
$message = htmlspecialchars($_POST['message']);
$message = urldecode($message);
$message = trim($message);

$headers = "From: $from" . "\r\n" . 
    "Reply-To: $from" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    if(mail($to, $subject, $message, $headers))  {
        $_SESSION['mail'] = "+";
    }
        
       header('Location:http://diplom/about.php');