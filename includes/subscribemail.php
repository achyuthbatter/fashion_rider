<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}
require_once("mailconfig.php");
$usermail = $_SESSION['usermail'];
$mail = new PHPMailer();

$emailBody = "<div><h4>Hello User,</h4><p>You have successfully Subscribed for our Newsletters<br>If you want to change the settings on how frequent you want to receive the Newsletters, Deals etc <a href=". SETTINGS_PAGE ."?email=". $usermail .">Click Here</a></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
// $mail->SMTPDebug = 2;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;
$mail->From     = SENDER_EMAIL; 
$mail->FromName = SENDER_NAME;

$mail->AddReplyTo(SENDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SENDER_EMAIL;	
$mail->AddAddress($usermail);
$mail->Subject = "Email Subscription";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
    $message =  'Problem in Subscribing Email';
} else {
    $message =  'You would recieve a mail shortly for further information';
} 
?>