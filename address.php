<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
$id  = $_SESSION['user_id'];
$add_q = "SELECT * FROM user_address WHERE users_id = $id";
$res_add = @mysqli_query($dbc,$add_q);

$row_add = @mysqli_fetch_array($res_add);

if($row_add){
    echo '<h3>You have a Saved Address</h3>';
    echo '<p>Edit your Address if there is a Mistake</p>';
    $_SESSION['strtname'] = $row_add['street_name'];
    $_SESSION['strtno'] = $row_add['streetno']; 
    $_SESSION['aptno'] = $row_add['Apt'];
    $_SESSION['Country'] = $row_add['country'];
    $_SESSION['province'] = $row_add['province'];
    $_SESSION['city'] = $row_add['city'];
    $_SESSION['postalcode'] = $row_add['postalcode'];
}
else{
    echo '<h3>You have No Saved Addresses</h3>';
    echo '<p>Fill below details to save your address for faster checkout</p>';
}
if(isset($_POST['addresbtn'])){

    $streetname = $_POST['streetname'];
    $streetno = $_POST['streetno'];
    if(empty($_POST['aptno'])){
        $aptno = 'NULL';
    }
    else{
        $aptno = $_POST['aptno'];
    }
    $country = $_POST['Country'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $insert_q = "SELECT * FROM user_address WHERE users_id = $id";
    $result_in = @mysqli_query($dbc,$add_q);

    $row_in = @mysqli_fetch_array($res_add);
    $num_in = @mysqli_num_rows($result_in);
    if($num_in == 1){
        $update_q = "UPDATE user_address SET street_name= '$streetname', streetno= $streetno, Apt=$aptno, postalcode='$postalcode', city='$city',province='$province', country='$country' WHERE users_id= $id ";
        $res_update = @mysqli_query($dbc,$update_q);
        if($res_update){
            echo '<h3>Updated Successfully</h3>';
        }
        else{
            echo '<h3>Not Updated Successfully</h3>';
            echo $update_q;
        }
    }
    else{
        $insert_q = "INSERT INTO user_address VALUES($id, '$streetname',$streetno,$aptno,'$postalcode','$city','$province','$country')";
        $res_q = @mysqli_query($dbc,$insert_q);

        if($res_q){
            echo '<script type="text/javascript>  
                alert("Submitted Successfully");
                location.href="/address.php";
            </script>';
        }
        else{
            echo 'Not Successfull';
        }
    }
    
}

?>
<div class="container">
    <div class="col-sm-9">
        <form method="post">   
            <div class="card">
                <div class="card-heading">
                    <h4 class="card-title"><?php if(isset($_SESSION['strtname'])) echo 'Update your Address'; else { echo 'Add your Address'; } ?></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="streetname" placeholder="Street Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Street Name*'" 
                            value="<?php if(isset($_SESSION['strtname'])) echo $_SESSION['strtname'] ?>">  
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="streetno" placeholder="Street Number*" onfocus="this.placeholder=''" onblur="this.placeholder='Street Number*'" 
                            value="<?php if(isset($_SESSION['strtno'])) echo $_SESSION['strtno'] ?>">
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control"  name="aptno" placeholder="#Apt/#House*" onfocus="this.placeholder=''" onblur="this.placeholder='#Apt/#House*'"
                            value="<?php if(isset($_SESSION['aptno'])) echo $_SESSION['aptno'] ?>">                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <select class="form-control" name="Country" id="countryid">
                                <option value ='<?php if(isset($_SESSION['Country'])) echo $_SESSION['Country']; else echo '0'; ?>'><?php if(isset($_SESSION['Country'])) echo $_SESSION['Country']; else echo 'Select a Country';?> </option>
                                <option value='United States'>United States</option>
                                <option value='Canada'>Canada</option>
                                <option value='India'>India</option>
                            </select>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="province"  placeholder="Province*" onfocus="this.placeholder=''" onblur="this.placeholder='Province*'"
                            value="<?php if(isset($_SESSION['province'])) echo $_SESSION['province'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="city" placeholder="City*" onfocus="this.placeholder=''" onblur="this.placeholder='City*'"
                            value="<?php if(isset($_SESSION['city'])) echo $_SESSION['city'] ?>">  
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="postalcode" placeholder="Postal Code*" onfocus="this.placeholder=''" onblur="this.placeholder='Postal Code*'"
                            value="<?php if(isset($_SESSION['postalcode'])) echo $_SESSION['postalcode'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addresbtn" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</div>

<?php
include('includes/footer.php');
?>