<?php
session_start();
$page_title = "Subscription Settings";
include('includes/header.php');
require('mysqli_connect.php');

if(isset($_POST['insert'])){
    $email = $_POST['email'];
    $frequency = $_POST['freq'];
    $preference = $_POST['preference'];
    // if(isset($_SESSION['user_id'])){
    //     $sessionuser = $_SESSION['user_id'];
    //     $subsc_insert  = "INSERT INTO subscriber(user_id,email,frequency,preference) VALUES($sessionuser,'$email','$frequency','$preference')";
    //     $runquery = @mysqli_query($dbc,$subsc_insert);
    //     if($runquery){
    //         echo '<h4>Yayy Your settings have been saved</h4>';
    //     }
    //     else{
    //         echo '<h4>There is a Problem saving</h4>';
    //         echo $subsc_insert;
    //     }
    // }
    // else{
        // $get = "SELECT MAX(user_id) AS user FROM subscriber ORDER BY subscriber_id";
        // $get_res = @mysqli_query($dbc,$get);
        // $row_get = @mysqli_fetch_array($get_res);
        // if($row_get['user'] == NULL){
        //     $userget = 1;
        // }
        // else{
        //     $val = $row_get['user'];
        //     $userget = $val + 1;
        // }
        // echo $userget;
        $insert = "INSERT INTO subscriber(email,frequency,preferences) VALUES('$email','$frequency','$preference')";
        $res_insert = @mysqli_query($dbc,$insert);
        if($res_insert){
            echo '<h4>Yayy Your settings have been saved</h4>';
        }
        else{
            echo '<h4>There is a Problem saving</h4>';
        }

}
?>
<div class="container">
    <div class="offset-sm-3 col-sm-6 mt-80">
        <form class="form-horizontal" method="post" action="subscribesettings.php">
            <div class="form-group">
                <label class="col-sm-4 control-label">Your Email</label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <input type="hidden" name="update" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>">
                        <input type="text" class="disable form-control" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; ?>">
                    </div>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default editBtn"><i class="fas fa-pencil-alt"></i></button>
                    </span>
                    
                </div>
            </div>

            <h4 class="control-label">Frequency</h4>
            <div class="form-check-inline">
                <label class="form-check-label" for="opt1">
                    <input type="radio" id="opt1" class="form-check-input" name="freq" value="daily">Daily
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="opt2">
                    <input type="radio" id="opt2" class="form-check-input" name="freq" value="biweekly">Bi-Weekly
                </label>
            </div>
            <div class="form-check-inline" for="opt3">
                <label class="form-check-label">
                    <input type="radio" id="opt3" class="form-check-input" name="freq" value="month">Month
                </label> 
            </div>

            <h4 class="control-label">Preference</h4>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio1">
                    <input type="radio" id="radio1" class="form-check-input" name="preference" value="deals" checked>Deals
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio2">
                    <input type="radio" id="radio2" class="form-check-input" name="preference" value="biweekly">Sale Offers
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label" for="radio3">
                    <input type="radio" id="radio3" class="form-check-input" name="preference" value="seasoncollect">Season Collection
                </label> 
            </div>
                
                            
            <div class="form-group">
                <div class="col-sm-10 ">
                    <button type="submit" name="insert" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="slick-1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="js/main.js"></script>  