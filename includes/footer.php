<?php
$regex = "/^([a-zA-Z0-9_\.-]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
if(isset($_POST['subscribe'])){
    $inputemail = $_POST['email'];
    $sanitize_e = filter_var($inputemail, FILTER_SANITIZE_EMAIL);
    $valdated_e = filter_var($sanitize_e, FILTER_VALIDATE_EMAIL);
    if(preg_match($regex,$valdated_e)){
        $_SESSION['usermail'] = $valdated_e;
        require_once('includes/subscribemail.php');
    }
    else{
        $message = "Invalid Email";
    }
    
}
?>
</div>
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div>
                    <h4 class="text-white">Follow Us</h4>
                    <p>Let us be Social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
				        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
				        <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
				        <a href="#"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="#"><i class="fab fa-google-plus fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="single-footer-widget">
                    <h4 class="text-center">Fear of Missing Out?</h4>
                    <p class="text-center">Be the First to Know the latest deals,styles and stay updated</p>
                    <form class="row" method="post">
                        <input class="form-control" required type="email" name="email" placeholder="Enter Email*" onfocus="this.placeholder =''" onblur="this.placeholder='Enter Email*'">
                        <button name="subscribe" class="click-btn btn btn-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        
                    </form>
                    <p class="offset-sm-1" name="message"><?php if(isset($_POST['subscribe'])) echo $message; ?></p>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p> 
        </div>
    </div>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="slick-1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="js/main.js"></script>

</html>
