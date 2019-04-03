<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');

if(isset($_POST['back'])){
   unset($_SESSION['cprodname']);
   unset($_SESSION['quantitycart']);
   unset($_SESSION['grand']);
    echo '<script type="text/javascript">
                location.href="/cart.php";
            </script>';
}
if(isset($_POST['btncheck'])){
    $_SESSION['billingname'] = $_POST['username'];
    $_SESSION['billingemail'] = $_POST['emailid'];
    $total = $_SESSION['grandtotal'];
    $intrans = "INSERT INTO transactions(total,paytype) VALUES($total,'PayPal')";
    $restrans = @mysqli_query($dbc,$intrans);
    if($restrans){
        foreach($_SESSION['cart'] AS $k => $val){
            $prod_id = $_SESSION['cart'][$k];
            $quant = $_SESSION['menquantity'][$k];
            $fulln = $_POST['fname']. $_POST['lname'];
            $email = $_POST['emailid'];
            $gettran = "SELECT MAX(transaction_id) AS tranid FROM transactions";
            $resgettran = @mysqli_query($dbc,$gettran);
            $rowgettran = @mysqli_fetch_array($resgettran);

            $tranid = $rowgettran['tranid'];
            $_SESSION['tranid'] = $rowgettran['tranid'];
            
            $inorder = "INSERT INTO orders(product_id,transaction_id,fullname,email_id,order_date,stat,quantity_ordered) 
                    VALUES($prod_id,$tranid,'$fulln','$email',DEFAULT,'Processing',$quant)";
            $resinorder = @mysqli_query($dbc,$inorder);
            if($resinorder){
                echo 'Success order';
            }
            else{
                echo 'Not Success';
                echo $inorder;
            }
        }
    }
    else{
        echo 'transaction not saved';
    }
    if(isset($_POST['chkacc'])){
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dateofbirth'];
        $phone = $_POST['pno'];
        $email = $_POST['emailid'];
        $pass = $_POST['password'];
        if(isset($_POST['choice'])){
            $option = $_POST['choice'];
        }
        else{
            $option = 0;
        }
        $stname = $_POST['streetname'];
        $stno = $_POST['streetno'];
        $aptno = $_POST['apt'];
        $zipcode = $_POST['postal'];
        $city = $_POST['city'];
        $prov = $_POST['province'];
        $country = $_POST['cntry'];

        $insert = "INSERT INTO user_registration (username,first_name,last_name,dob,phone_number,email,pswd,subscription) 
        VALUES('$username','$fname','$lname','$dob','$phone','$email','$pass','$option')";
        $resinsert = @mysqli_query($dbc,$insert);
        if($resinsert){
            $getid = "SELECT MAX(users_id) AS id FROM user_registration";
            $res = @mysqli_query($dbc,$getid);
            $rowid = @mysqli_fetch_array($res);
            $id = $rowid['id'];
            $insaddress = "INSERT INTO user_address VALUES($id,'$stname',$stno,$aptno,'$zipcode','$city','$prov','$country')";
            $rowinsaddress = @mysqli_query($dbc,$insaddress);
        }
    }
    else{
        $getorder = "SELECT MAX(transaction_id) AS transid FROM orders";
        $result = @mysqli_query($dbc,$getorder);
        $rowid = @mysqli_fetch_array($result);
        $tid = $rowid['transid'];
        $fullname = $_POST['fname']. $_POST['lname'];
        $dob = $_POST['dateofbirth'];
        $phone = $_POST['pno'];
        $email = $_POST['emailid'];
        $stname = $_POST['streetname'];
        $stno = $_POST['streetno'];
        $aptno = $_POST['apt'];
        $zipcode = $_POST['postal'];
        $city = $_POST['city'];
        $prov = $_POST['province'];
        $country = $_POST['cntry'];

        $inguest = "INSERT INTO guest_details(transaction_id,fullname,dob,phoneno,email_id,stname,stno,aptno,postal,city,province,country)
        VALUES($tid,'$fullname','$dob','$phone','$email','$stname',$stno,'$aptno','$zipcode','$city','$prov','$country')";
        $reguest = @mysqli_query($dbc,$inguest);
        if($reguest){
            echo 'success';
        }
        else{
            echo 'error guest entry';
            echo $inguest;
        }
    }
     echo '<script type="text/javascript">
                location.href="/order_details.php";
            </script>';
}
?>
<div class="container">
    <!-- returning login -->
    <div class="checktop">
        <p>Returning Customer? <a data-toggle="collapse" href="#checkout-login" aria-expanded="false" aria-controls="checkout-login">Click here to login</a></p>
    </div>
    <div class="collapse" id="checkout-login">
        <div class="checkout-login-collapse d-flex flex-column">
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
            <form action="#" class="d-block">
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" required class="common-input mt-10">

                    </div>
                    <div class="col-lg-4">
                        <input type="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-10">
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <button class="view-btn color-2 mt-3 mr-2"><span>Login</span></button>
                    <div class="mt-3">
                        <input type="checkbox" class="pixel-checkbox" id="login-1">
                        <label for="login-1">Remember me</label>
                    </div>
                </div>
            </form>
            <a href="forgotpass.php" class="mt-10">Lost your password?</a>
        </div>
    </div> 
    <!-- coupon entry -->
    <div class="check-coupon">
        <p>Have a coupon? <a data-toggle="collapse" href="#checkout-cupon" aria-expanded="false" aria-controls="checkout-cupon">Click here to enter your code</a></p>
    </div>
    <div class="collapse" id="checkout-cupon">
        <div class="checkout-login-collapse d-flex flex-column">
            <form action="#" class="d-block">
                <div class="row">
                    <div class="col-lg-8">
                        <input type="text" placeholder="Enter coupon code" onfocus="this.placeholder=''" onblur="this.placeholder = 'Enter coupon code'" required class="common-input mt-10">
                    </div>
                </div>
                <button class="view-btn color-2 mt-3"><span>Apply Coupon</span></button>
            </form>
        </div>
    </div>  
</div>

<!-- billing area -->
<div class="container">
    <form class="billing-form" action="checkout.php" method="post">
    <button name="back" class="btn btn-primary" formnovalidate >Back to Cart</button>
        <div class="row">
            <div class=" offset-sm-2 col-lg-8 col-md-6">
                <h3 class="billing-title mt-3 mb-2">Billing Details</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" name="fname" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input"
                        value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="lname" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input"
                        value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" id="date" name="dateofbirth" placeholder="Date of Birth(YYYY/MM/DD)*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Date of Birth(YYYY/MM/DD)*'" required class="common-input"
                        value="<?php if(isset($_SESSION['dob'])) echo $_SESSION['dob'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="pno" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input"
                        value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="email" name="emailid" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" required class="common-input"
                        value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <div class="sorting">
                            <select class="form-control" name="cntry">
                                <option value ='<?php if(isset($_SESSION['Country'])) echo $_SESSION['Country']; else echo '0'; ?>'><?php if(isset($_SESSION['Country'])) echo $_SESSION['Country']; else echo 'Select a Country';?> </option>
                                <option value="Canada">Canada</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="streetname" placeholder="Streetname*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Streetname*'" required class="common-input"
                        value="<?php if(isset($_SESSION['strtname'])) echo $_SESSION['strtname'] ?>">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="streetno" placeholder="Streetno*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Streetno*'" required class="common-input"
                        value="<?php if(isset($_SESSION['strtno'])) echo $_SESSION['strtno'] ?>">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="apt" placeholder="#Apt*" onfocus="this.placeholder=''" onblur="this.placeholder = '#Apt'" class="common-input"
                        value="<?php if(isset($_SESSION['aptno'])) echo $_SESSION['aptno'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" name="city" placeholder="City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'City*'" required class="common-input"
                        value="<?php if(isset($_SESSION['city'])) echo $_SESSION['city'] ?>">
                    </div>
                    <div class="col-lg-6">
                    <input type="text" name="province" placeholder="Province*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Province*'" required class="common-input"
                    value="<?php if(isset($_SESSION['province'])) echo $_SESSION['province'] ?>">
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="postal" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" class="common-input"
                        value="<?php if(isset($_SESSION['postalcode'])) echo $_SESSION['postalcode'] ?>">
                    </div>
                </div>
                <?php
                if(!isset($_SESSION['login_id'])){
               ?><div class="mt-3">
                    <input type="checkbox" name="chkacc" class="pixel-checkbox" id="login-3">
                    <label for="login-3">Create an account?</label>
                </div>
                <div class="mt-3" id="pswddiv">
                    <div class="col-lg-6">
                        <input type="text" name="username" placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username'"  class="common-input">
                    </div>
                    <div class="col-lg-6">
                        <input type="password" name="password" placeholder="New Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'New Password*' " class="common-input">
                    </div>
                    <p class="message">  
                        <?php
                            if(isset($message)){
                                echo $message;
                            }
                        ?>
                    </p>
                </div><?php
                }
                ?>
                <h3 class="billing-title mt-3 mb-2">Billing Details</h3>
                <div class="mt-20">
                    <input type="checkbox" class="pixel-checkbox" id="login-6">
                    <label for="login-6">Ship to a different address?</label>
                </div>
                <textarea placeholder="Order Notes" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order Notes'"  class="common-textarea"></textarea>
                <input type="checkbox" class="pixel-checkbox" name="choice" id="subsc" value="1">
                <label for="subsc">Subscribe to our Newsletter for Latest Deals,Offers</label>
                
                <button type="submit" class="view-btn color-2 w-100 mt-3" name="btncheck"><span>Proceed to Checkout</span></button>
            </div>  
        </div>
    </form>
</div>
<?php
include('includes/footer.php');
?>