<?php
session_start();
$page_title = 'Logged In!';

if (isset($_SESSION['login_id'])) {
    unset($_SESSION["login_id"]);
    unset($_SESSION['user_id']);
    unset($_SESSION["firstname"]);
    unset($_SESSION["lastname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["phone"]);
    unset($_SESSION['strtname']);
    unset($_SESSION['strtno']);
    unset($_SESSION['aptno']);
    unset($_SESSION['Country']);
    unset($_SESSION['province']); 
    unset($_SESSION['city']);
    unset($_SESSION['postalcode']);
	 echo '<script type="text/javascript">
                location.href="/index.php";
            </script>';
}
?>