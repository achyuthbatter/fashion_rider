<?php
session_start();
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');

if(isset($_POST['sub'])){
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $email_q = "SELECT * from user_registration WHERE email = '$email' ";
        $res_email = @mysqli_query($dbc,$email_q);
        $user = @mysqli_fetch_array($res_email);
        if(!empty($user)){
            $_SESSION['email'] = $user['email'];
            require_once('includes/recoverpass.php');  
        }
        else{
            echo '<h3>Email is not registererd with us</h3>';
        }
    }
    else{
        echo '<h3>Email is Empty</h3>';
    }
    
}
else{
    
}
?>
<div class="container section-gap">
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="forgotpass.php" class="form-horizontal">
                <input type="text" class="form-control" name="email" placeholder="Enter your Email*" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Email*'" required>
                
                <button type="submit" name="sub" class="btn btn-primary mt-10">Submit</button>
            </form>
        </div>
    </div>
</div>
