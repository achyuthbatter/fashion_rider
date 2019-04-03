<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
$loginmsg = "";
$registermsg = "";
if(isset($_POST['login'])){
    $username = $_POST['lusername'];
    $password =  $_POST['lpassword'];
  
    $q = "SELECT * FROM login WHERE username = '$username' AND pswd ='$password'";
    $q_u = "SELECT * FROM user_registration WHERE username = '$username'";
    
    $r = @mysqli_query($dbc,$q);
    $q_u_r = @mysqli_query($dbc,$q_u);
    
    $row = @mysqli_fetch_array($r);
    $row_r = @mysqli_fetch_array($q_u_r);
    if($row){
        if(!empty($_POST['remember'])){
            setcookie("lusername",$_POST['lusername'],time()+(10 * 365 * 24 * 60 * 60));
            setcookie("lpassword",$_POST['lpassword'],time()+(10 * 365 * 24 * 60 * 60));
        }
        else{
            if(isset($_COOKIE['lusername'])){
                setcookie("lusername","");
            }
            if(isset($_COOKIE['lpassword'])){
                setcookie("lpassword","");
            }
            
        }
    }
    else{
        $loginmsg = 'No files found';
    }
    $num = @mysqli_num_rows($r);
    $num_r = @mysqli_num_rows($q_u_r);

    $id = $row['login_id'];
    $userid = $row_r['users_id']; 
    $user = $row['username'];
    $firstname = $row_r['first_name'];
    $lastname = $row_r['last_name'];
    $em_id = $row_r['email'];
    $pno = $row_r['phone_number'];
    $dateofbirth = $row_r['dob'];
    if($num == 1 && $num_r == 1){
        session_start();
        $_SESSION['login_id'] = $id;
        $_SESSION['user_id'] = $userid;
        $_SESSION['username'] = $user;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $em_id;
        $_SESSION['phone'] = $pno;
        $_SESSION['dob'] = $dateofbirth;
         echo '<script type="text/javascript">
                location.href="/index.php";
            </script>';
    }
    else{
        $loginmsg =  'The username and password entered do not match those on file.';
        ?>
         <div class="alert alert-danger" role="alert" >
            <strong><?php echo $loginmsg; ?></strong>
        </div>
        <?php
    }
}
if(isset($_POST['register_btn'])){
    $username = $_POST['username'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dateofbirth'];
    $phone = $_POST['phoneno'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    if(isset($_POST['choice'])){
        $option = $_POST['choice'];
    }
    else{
        $option = 0;
    }
   
    $errors = [];
    $_SESSION['username'] = $username;
    if($pass != $cpass){
        $errors[] = 'Your password did not match the confirmed password.';
    } 
    else {
        $p = mysqli_real_escape_string($dbc, trim($pass));
        $query = "select * from user_registration WHERE username ='$username'";
        $query_run = @mysqli_query($dbc,$query);
		$rows = @mysqli_num_rows($query_run);
        if($rows == 1){
            $errors[] = 'Username Already Taken';
        }
    }
    if(empty($errors)){
        $q = "INSERT INTO user_registration (username,first_name,last_name,dob,phone_number,email,pswd,subscription) VALUES('$username','$fname','$lname','$dob','$phone','$email','$pass','$option')";
        
        $q_login = "INSERT INTO login(username,pswd) VALUES('$username','$pass')";
        
        $r = @mysqli_query($dbc,$q);
        
        $r_login = @mysqli_query($dbc,$q_login);
        
        if($r){
            ?>
            <div class="alert alert-success" role="alert" >
            <?php
                echo '<h1>Thank you!</h1>
                <p>You are now registered.Login now with your Registered Credentials</p><p><br></p>';
            ?>
            </div>
            <?php

        }
        else{
            echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
            echo '<p>' .mysqli_error($dbc) . '<br> Query:' . $q . '</p>';
        }
    }
    else{
        ?>
        <div class="alert alert-danger" role="alert">
        <?php
        echo '<h1>Try Again <pre>'; print_r($errors[0]); echo '</pre></h1>';
        ?>
        </div>
        <?php
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="login-form">
                <h3 class="billing-title text-center">Login <i class="fa fa-lock"></i></h3>
                <p class="text-center mt-5 mb-4">Welcome back! Sign in to your account </p>
                <form action="login.php" method="post">
                    <input type="text" name="lusername"  placeholder="Username*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Username*'"  class="common-input mt-20" value="<?php if(isset($_COOKIE['lusername'])) { echo $_COOKIE['lusername']; } ?>">
                    
                    <input type="password" name="lpassword" placeholder="Password*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'"  class="common-input mt-20"  value="<?php if(isset($_COOKIE['lpassword'])) { echo $_COOKIE['lpassword']; } ?>" >
                    
                    <button class="view-btn color-2 mt-4 w-100 btnlogin" name="login"><span>Login</span></button>
                    
                    <div class="mt-1 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="pixel-checkbox" name="remember" id="login-1" <?php if(isset($_COOKIE["lusername"])) { ?> checked <?php } ?> >
                            <label for="login-1">Remember me</label></div>
                        <a href="forgotpass.php">Forgot Password?</a>
                    </div>
                   
                   
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="register-form">
                <h3 class="billing-title text-center">Register <i class="fa fa-pencil-alt"></i></h3>
                <p class="text-center mt-5 mb-4">Create your very own account </p>
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username*'" required class="common-input mt-20">
                    
                    <input type="text" name="firstname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input mt-20" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" >
                    
                    <input type="text" name="lastname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input mt-20" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
                    
                    <input type="text" id="date" name="dateofbirth" placeholder="Date of Birth(YYYY/MM/DD)*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Date of Birth(YYYY/MM/DD)*'" required class="common-input mt-20" value="<?php if(isset($dob)){ echo $dob; } ?>">
                    
                    <input type="text" name="phoneno" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input mt-20" value="<?php if(isset($_POST['phoneno'])) echo $_POST['phoneno']; ?>">
                    
                    <input type="email" name="email" placeholder="Email address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email address*'" required class="common-input mt-20" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    
                    <input type="password" name="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-20">
                    
                    <input type="password" name="cpassword" placeholder="Re-Enter Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Re-Enter Password*'" required class="common-input mt-20">

                    <div class="mt-4">
                        <input type="checkbox" class="pixel-checkbox" name="choice" id="subsc" value="1">
                        <label for="subsc">Subscribe to our Newsletter for Latest Deals,Offers</label>

                        <button name="register_btn" class="view-btn color-2 mt-20 w-100"><span>Register</span></button>
                    </div>
                                        
                   
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>