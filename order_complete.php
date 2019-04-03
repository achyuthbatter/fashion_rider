<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');

foreach($_SESSION['cart'] AS $k => $val){
    $prod_id = $_SESSION['cart'][$k];
    $quant = $_SESSION['menquantity'][$k];
    $tranid = $_SESSION['tranid'];
    $updateorder = "UPDATE orders SET stat ='Confirmed' WHERE transaction_id = $tranid";
    $resupdateorder = @mysqli_query($dbc,$updateorder);
    if($resupdateorder){
        echo 'Success order';
    }
    else{
        echo 'Not Success';
        echo $updateorder;
    }
}

?>
<div class="container">
    <div class=" offset-sm-1 col-sm-8 mt-4">
        <h4>Thank you your order has been completed</h4>
    </div>
</div>
<?php
include('includes/footer.php');
?>