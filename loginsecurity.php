<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
$id = $_SESSION['login_id'];
if(isset($_POST['update'])){
    $uname = $_POST['uname'];
    $curpass = $_POST['curpass'];
    $pass = $_POST['npass'];
    $cpass = $_POST['cnpass'];
    $password_query = "SELECT * FROM user_registration where users_id = $id ";
    $result = @mysqli_query($dbc,$password_query);
    $row = @mysqli_fetch_array($result);
    $row_username = $row['username'];
    $row_pass = $row['pswd'];
    echo $row_pass;
    echo $curpass;
    if($row_pass == $curpass){
        if($pass == $cpass){
            $update_pass = "UPDATE user_registration SET username='$uname',pswd = '$pass' WHERE users_id =$id";
            $update_login = "UPDATE login SET username ='$uname',pswd ='$pass' WHERE login_id =$id";
            
            $update_result = @mysqli_query($dbc,$update_pass);
            $login_result = @mysqli_query($dbc,$update_login);
                
            if($update_result){
                echo 'Password Changed Successfully';
            }
            else{
                echo 'Failed to Change Password';
            }
        }
        else{
            echo 'New Password and Confirm New Password doesn&#39;t Match';
        }
    }
    else{
        echo 'Current Password is Incorrect';
    }   
}
if(isset($_POST['detailupdate'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $q = "UPDATE user_registration SET first_name='$firstname', last_name='$lastname', dob='$dob',phone_number='$phone',email='$email' WHERE user_id = $id";
    $r = @mysqli_query($dbc,$q);
    if($r){
        echo 'Updated Successfully';
    }
    else{
        echo 'Not Updated';
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-9 ml-50">
            <form class="form-horizontal" method="post">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="images/userprofile.jfif" class="img-square profile-edit" alt="User">
                    </div>
                    
                    <div class="card">
                        <div class="card-heading">
                            <h4 class="card-title">Edit Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">First Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name=firstname value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Last Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lastname" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Date Of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="dob" value="<?php if(isset($_SESSION['dob'])) echo $_SESSION['dob'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email Id:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Phone Number:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-10 ">
                                    <button type="submit" name="detailupdate" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-heading">
                            <h4 class="panel-title">Security</h4>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                     <input type="text" class="form-control" name="uname" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username'] ?>">
                                     <a href="#" class="show">Change</a>
                                    <a href="#" class="hidelink">Hide</a>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <label class="col-sm-2 control-label">New Username</label>
                                <div class="col-sm-10">
                                     <input type="text" class="form-control" name="nuname">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Current Password</label>
                                <div class="col-sm-10">
                                     <input type="password" class="form-control" name="curpass">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">New Password</label>
                                <div class="col-sm-10">
                                     <input type="password" class="form-control" name="npass">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Confirm New Password</label>
                                <div class="col-sm-10">
                                     <input type="password" class="form-control" name="cnpass">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-10 ">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>