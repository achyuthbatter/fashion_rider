<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_POST['change'])){
    $password = $_POST['npass'];
    $cpassword = $_POST['cnpass'];
    $user_id = $_POST['id'];

    if($password == $cpassword){
        $q_pass = "UPDATE user_registration SET pswd = '$password' WHERE user_id = $user_id";
        $l_pass = "UPDATE login SET pswd ='$password' WHERE login_id =$user_id";
        $rp = @mysqli_query($dbc,$q_pass);
        $rlp = @mysqli_query($dbc,$l_pass);

        if($rp){
            echo 'Password Changed Successfully Login with your new Password';
        }
        else{
            echo 'Failed to Change Password';
        }
    }
    else{
        echo 'Password and Confirm Password does not match';
    }
    
}   

?>
<div class="container">
    <div class="offset-sm-3 col-sm-6 mt-80">
        <form class="form-horizontal" method="post" action="changepass.php">
            <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
            <div class="form-group">
                <label class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                        <input type="password" class="form-control" name="npass">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-5 control-label">Confirm New Password</label>
                <div class="col-sm-8">
                        <input type="password" class="form-control" name="cnpass">
                </div>
            </div>
                            
            <div class="form-group">
                <div class="col-sm-10 ">
                    <button type="submit" name="change" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include('includes/footer.php');
?>