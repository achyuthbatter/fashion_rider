<?php
session_start();
$page_title = 'Fashion Rider';
include('includes/header.php');
require('mysqli_connect.php');
$pricearr = [];
$getquan = [];
$totpricearr = [];
$grandtotal = [];

$wpricearr = [];
$wgetquan = [];
$wtotpricearr = [];
//$wgrandtotal = [];

if(isset($_POST['checkout'])){
     echo '<script type="text/javascript">
                location.href="/checkout.php";
            </script>';
}

if(isset($_GET['id'])){
    if($_GET['id'] >= 0){
        $removeid = $_GET['id'];
        if(count($_SESSION['cart'])){
            unset($_SESSION['cart']);
            unset($_SESSION['wcart']);
            unset($_SESSION['menquantity']);
            unset($_SESSION['mensize']);
            unset($_SESSION['wmenquantity']);
            unset($_SESSION['wmensize']);
            unset($_SESSION['cprodname']);
            unset($_SESSION['quantitycart']);
            unset($_SESSION['grand']);
        }
        else{
            unset($_SESSION['cart'][$removeid]);
            unset($_SESSION['wcart'][$removeid]);
            unset($_SESSION['menquantity'][$removeid]);
            unset($_SESSION['mensize'][$removeid]);
            unset($_SESSION['wmenquantity'][$removeid]);
            unset($_SESSION['wmensize'][$removeid]);
            unset($_SESSION['cprodname'][$removeid]);
            unset($_SESSION['quantitycart'][$removeid]);
            unset($_SESSION['grand'][$removeid]);
        }
    }
}
if(isset($_GET['wid'])){
    if($_GET['wid'] >= 0){
        $removewid = $_GET['wid'];
        if(count($_SESSION['wcart']) == 1){
            unset($_SESSION['wcart']);
            unset($_SESSION['wmenquantity']);
            unset($_SESSION['wmensize']);
            unset($_SESSION['cprodname']);
            unset($_SESSION['quantitycart']);
            unset($_SESSION['grand']);
        }
        else{
            unset($_SESSION['wcart'][$removeid]);
            unset($_SESSION['wmenquantity'][$removeid]);
            unset($_SESSION['wmensize'][$removeid]);
            unset($_SESSION['cprodname'][$removeid]);
            unset($_SESSION['quantitycart'][$removeid]);
            unset($_SESSION['grand'][$removeid]);
        }
    }
}
if(isset($_POST['change'])){

    $size = $_POST['size'];
    $postquant = $_POST['quantity'];
    $keychange = $_POST['keyval'];
    // echo $keychange;
   
    $_SESSION['mensize'][$keychange] = $size;
    $_SESSION['menquantity'][$keychange] = $postquant;
    // echo $size;
    // echo $postquant;
    unset($_SESSION['cprodname']);
    // foreach($_SESSION['mensize'] AS $k => $v){
    //     $_SESSION['mensize'][$k] = $size[$k];
    // }
}
if(isset($_POST['wchange'])){

    $wsize = $_POST['wsize'];
    $wpostquant = $_POST['wquantity'];
    $wkeychange = $_POST['wkeyval'];
    // echo $keychange;
   
    $_SESSION['wmensize'][$wkeychange] = $wsize;
    $_SESSION['wmenquantity'][$wkeychange] = $wpostquant;
    // echo $size;
    // echo $postquant;
    unset($_SESSION['cprodname']);
    // foreach($_SESSION['mensize'] AS $k => $v){
    //     $_SESSION['mensize'][$k] = $size[$k];
    // }
}
if(isset($_SESSION['cart']) || isset($_SESSION['wcart'])){
    // if(empty($_SESSION['cprodname'])){
        $_SESSION['cprodname'] = array();
    //}
    // if(empty($_SESSION['grand'])){
        $_SESSION['grand'] = array();
    //}
    // if(empty($_SESSION['quantitycart'])){
        $_SESSION['quantitycart'] = array();
    //}
        $_SESSION['wcprodname'] = array();
        $_SESSION['wgrand'] = array();
        $_SESSION['wquantitycart'] = array();
    ?>
    <form method="post" action="cart.php">   
    <div class="container row product">
        <table class="table col-sm-6 table-responsive table-borderless prod-single">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Product Name</th>
                    <th scopr="col">Price</th>
                </tr>
            </thead>
    <?php
    if(isset($_SESSION['cart'])){
    while(list($key,$val) = each($_SESSION['cart'])){
        $getid = $_SESSION['cart'][$key];
        $getmproddetails = "SELECT * FROM products_men WHERE product_id = $getid";
        $resmprod = @mysqli_query($dbc,$getmproddetails);
        $rowmprod = @mysqli_fetch_array($resmprod);

        $mprodname = $rowmprod['productname'];
        $mprodprice = $rowmprod['price'];
        ?>
        <tbody>
            <tr>
                <td><a href='cart.php?id=<?php echo $key; ?>'><i class="fas fa-times"></i></a></td>
                <td><?php echo $mprodname; ?></td>
                <td><div class="prod-single-price"><?php echo $mprodprice; ?></div></td>
                
                
            </tr>
        </tbody>
        <?php
        array_push($pricearr, $mprodprice);
        array_push($_SESSION['cprodname'], $mprodname );
        // var_dump($_SESSION['cprodname']);
       ?>
        <?php
    }
    }
    if(isset($_SESSION['wcart'])){
    while(list($wkey,$wval) = each($_SESSION['wcart'])){
        $getwid = $_SESSION['wcart'][$wkey];
        $getwproddetails = "SELECT * FROM products_women WHERE women_id = $getwid";
        $reswprod = @mysqli_query($dbc,$getwproddetails);
        $rowwprod = @mysqli_fetch_array($reswprod);

        $wprodname = $rowwprod['product_name'];
        $wprodprice = $rowwprod['product_price'];
        ?>
        <tbody>
            <tr>
                <td><a href='cart.php?wid=<?php echo $wkey; ?>'><i class="fas fa-times"></i></a></td>
                <td><?php echo $wprodname; ?></td>
                <td><div class="prod-single-price"><?php echo $wprodprice; ?></div></td>
                
                
            </tr>
        </tbody>
        <?php
        array_push($wpricearr, $wprodprice);
        array_push($_SESSION['wcprodname'], $wprodname );
        // var_dump($_SESSION['cprodname']);
       ?>
        <?php
    }
    }
    
    ?>
    </table>
        <table class="table col-sm-3 table-responsive table-borderless prod-single">
            <thead>
                <tr>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>  
                
                <?php
                if(isset($_SESSION['cart'])){
        while(list($keyq,$valq) = each($_SESSION['menquantity'])){
            array_push($getquan,$_SESSION['menquantity'][$keyq]);
            ?>
                <tbody>
                    <tr>
                        <td> 
                            <div class="quantity-container d-flex align-items-center ">
                                <input type="text" name="quantity" class="quantity-amount ml-3" value= <?php echo $_SESSION['menquantity'][$keyq]; ?> />
                                <div class="arrow-btn d-inline-flex flex-column">
                                    <button class="increase arrow"  type="button" title="Increase Quantity"><i class="fas fa-chevron-up"></i></button>
                                    <button class="decrease arrow" type="button" title="Decrease Quantity"><i class="fas fa-chevron-down"></i></button>
                                </div>
                                <input type="hidden" name="keyval" value= <?php echo $keyq; ?> >
                            </div>
                        <td>
                    </tr>
                </tbody>
            <?php
        }
        for($i= 0; $i < count($getquan); $i++){
            $_SESSION['quantitycart'][$i] = $getquan[$i];
        }
        }
        if(isset($_SESSION['wcart'])){
            while(list($wkeyq,$wvalq) = each($_SESSION['wmenquantity'])){
                array_push($wgetquan,$_SESSION['wmenquantity'][$wkeyq]);
                ?>
                    <tbody>
                        <tr>
                            <td> 
                                <div class="quantity-container d-flex align-items-center ">
                                    <input type="text" name="wquantity" class="quantity-amount ml-3" value= <?php echo $_SESSION['wmenquantity'][$wkeyq]; ?> />
                                    <div class="arrow-btn d-inline-flex flex-column">
                                        <button class="increase arrow"  type="button" title="Increase Quantity"><i class="fas fa-chevron-up"></i></button>
                                        <button class="decrease arrow" type="button" title="Decrease Quantity"><i class="fas fa-chevron-down"></i></button>
                                    </div>
                                    <input type="hidden" name="wkeyval" value= <?php echo $wkeyq; ?> >
                                </div>
                            <td>
                        </tr>
                    </tbody>
                <?php
            }
            for($i= 0; $i < count($wgetquan); $i++){
                $_SESSION['wquantitycart'][$i] = $wgetquan[$i];
            }
            }
        ?>
        </table>
        <table class="table col-sm-3 table-responsive table-borderless prod-single">
            <thead>
                <tr>
                    <th scope="col">Size</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
        <?php
        if(isset($_SESSION['cart'])){
        while(list($keys,$vals)= each($_SESSION['mensize'])){
            ?>
                <tbody>
                    <tr>
                        <td>
                            <select name="size" id="size">
                                <option value=<?php echo $_SESSION['mensize'][$keys]; ?>><?php echo $_SESSION['mensize'][$keys]; ?></option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </td>
                        <td> <?php 
                            $total =  $pricearr[$keys] * $getquan[$keys];
                            echo $pricearr[$keys] * $getquan[$keys]; 
                            array_push($totpricearr, $total);
                            ?> 
                        </td>
                        <td> <button type="submit" class="btn" name="change">Update</button> </td>
                    </tr>
                </tbody>
            <?php
        }
        for($i= 0; $i < count($totpricearr); $i++){
            $_SESSION['grand'][$i] = $totpricearr[$i];
        }
        }
        if(isset($_SESSION['wcart'])){
            while(list($wkeys,$wvals)= each($_SESSION['wmensize'])){
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <select name="wsize" id="size">
                                    <option value=<?php echo $_SESSION['wmensize'][$wkeys]; ?>><?php echo $_SESSION['wmensize'][$wkeys]; ?></option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </td>
                            <td> <?php 
                                $wtotal =  $wpricearr[$wkeys] * $wgetquan[$wkeys];
                                echo $wpricearr[$wkeys] * $wgetquan[$wkeys]; 
                                array_push($wtotpricearr, $wtotal);
                                ?> 
                            </td>
                            <td> <button type="submit" class="btn" name="wchange">Update</button> </td>
                        </tr>
                    </tbody>
                <?php
            }
            for($i= 0; $i < count($wtotpricearr); $i++){
                $_SESSION['wgrand'][$i] = $wtotpricearr[$i];
            }
            }
        ?>
    </table></div>
    <div class="bill-total">
            <div class="row">
                <label>Subtotal</label>
                 <span id="subtotal" class="ml-5 pl-4">
                     <?php
                        $subtotal = array_sum($totpricearr) + array_sum($wtotpricearr);
                        echo array_sum($totpricearr) + array_sum($wtotpricearr);
                        array_push($grandtotal, $subtotal);
                     ?>
                     <input type="hidden" name="subtotal" value= <?php echo array_sum($totpricearr)+ array_sum($wtotpricearr); ?> >
                 </span>
            </div>
            <div class="row">
                <label>Tax (13%)</label>
                <span id="tax" class="ml-5 pl-4" >
                    <?php
                     echo (array_sum($totpricearr)+ array_sum($wtotpricearr)) * 0.13;
                     $tax = (array_sum($totpricearr)+ array_sum($wtotpricearr)) * 0.13;
                     array_push($grandtotal, $tax); 
                     ?>
                </span>
            </div>
            <div class="row">
                <label>Shipping*</label>
                <span class="ml-5 pl-4" >
                    <?php
                        if($subtotal > 100){
                            echo 'Free Shipping';
                            $shipping = 0;
                            array_push($grandtotal, $shipping);
                        }
                        else if( $subtotal > 50 && $subtotal < 100){
                            echo $subtotal * 0.05;
                            $shipping = $subtotal * 0.05;
                            array_push($grandtotal, $shipping);
                        }
                        else if( $subtotal < 50){
                            echo $subtotal * 0.08;
                            $shipping = $subtotal * 0.08;
                            array_push($grandtotal, $shipping);
                        }
                    ?>
                </span>
            </div>
            <div class="row" style="margin-bottom:2%;">
                <label>Grand Total</label>
                <span class="ml-4 pl-3" >
                   <?php echo array_sum($grandtotal); 
                        $_SESSION['grandtotal'] = array_sum($grandtotal);
                   ?>
                   <input type="hidden" name="grandtotal" value= <?php echo array_sum($grandtotal); ?>>
                </span>
            </div>
    </div>
   
    <div class="checkout-button">
    <div class="row">
        <button class="btn btn-primary" name="checkout">Proceed to Checkout</button>
    </div></div>
    <p style="font-size:10px;">*shipping is free for more than 100$ if you make between 50$ and 100$ the shipping rate is 5% and if less than 50$ its 8%(Exclusive Taxes)</p>
    </form>
    <?php
}
else{
    echo '<h1>Your Cart is Empty</h1><br><br><br><br><br>';
}

?>

<?php
include('includes/footer.php');
?>