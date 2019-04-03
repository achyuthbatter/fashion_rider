<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}
require_once("mailconfig.php");
$email = $_SESSION['email'];
$mail = new PHPMailer();

$emailBody = "<div><h4>Hello ". $user['first_name'] . $user['last_name'] .",</h4><br><p>Click this link to recover your password<br><a href=" . PROJECT_HOME . "?id=".$user['user_id'].">Click Here</a><br></p>Regards,<br> Admin.</div>";

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
$mail->AddAddress($email);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
    echo 'Problem in Sending Password Recovery Email';
} else {
    echo 'Please check your email to reset password!';
} 
?>