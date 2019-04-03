<?php
session_start();
$page_title = "Fashion Rider";
include("includes/header.php");
require("mysqli_connect.php");
if(isset($_POST['sub'])){
    
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class ="contact-form">
                <h3 class="billing-text text-center">Contact Us</h3>
                <p class="text-center">Send your concerns &amp; we will get back to you</p>
                <form action="contactus.php" method="post">
                    <input type="text" name="firstname" placeholder="First Name*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'First Name*'" class="common-input mt-20" readonly value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>">

                    <input type="text" name="lastname" placeholder="Last Name*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Last Name*'"  class="common-input mt-20" readonly value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?>">

                    <input type="text" name="email" placeholder="Email*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Email*'"  class="common-input mt-20" readonly value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>">

                     <input type="text" name="phoneno" placeholder="Phone Number*" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number*'"  class="common-input mt-20" readonly value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>">

                    <textarea name="text" placeholder="Write something to us" required onfocus="this.placeholder=''" onblur="this.placeholder = 'Write something to us'" class="common-input mt-20"></textarea>

                    <button class="view-btn color-2 mt-20 w-100" name="sub"><span>Submit</span></button>
                </form>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Feel free to Call</h3>
            <div class="row">
                <p class="mt-30">Toll Free Number: +1 (880)771-1987</p>
                <p class="mt-50">Our Office Address</p>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Fairview%20Park%20Mall&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">webdesign agentur</a>
                    </div>
                    <style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>