<?php
session_start();
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_POST['prodbtn'])){
    $_SESSION['wprice'] = $_POST['wprice'];
    $_SESSION['womenid'] = $_POST['wid'];
     echo '<script type="text/javascript">
        location.href="/womendetails.php";
    </script>';
 }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h4>Offers &amp; Deals</h4>
            <p>Must Shop Sale</p>
            <p>Online Exclusive</p>
            <p>Tights:B2G1</p>
            
            <h4>Shop By Products</h4>
            <p>Dresses</p>
            <p>Shirts &amp; Blouses</p>
            <p>Cardigans &amp; Sweaters</p>
            <p>Tops</p>
            
            <h4>Shop By Brand</h4>
            <p>Gap</p>
            <p>Hollister</p>
            <p>Old Navy</p>
            <p>Bench.</p>
        </div>
        
        <div class="col-sm-10">
            <img src="images/header/womenheader.png" alt="header" class="img-fluid rounded">
            <div class="sliding">
                <div>
                    <img src="images/womensliding/bags.png">
                    <h4>Leather Bags from $59.99</h4>
                </div>
                <div><img src="images/womensliding/necklace.png">
                <h4>Necklaces from $99.99</h4></div>
                <div><img src="images/womensliding/bags.png">
                <h4>Leather Bags from $59.99</h4></div>
                <div><img src="images/womensliding/necklace.png"> 
                <h4>Necklaces from $99.99</h4></div>
                <div><img src="images/womensliding/bags.png">
                <h4>Leather Bags from $59.99</h4></div>
                <div><img src="images/womensliding/necklace.png">
                <h4>Necklaces from $99.99</h4></div>
                <div><img src="images/womensliding/bags.png">
                <h4>Leather Bags from $59.99</h4></div>
                <div><img src="images/womensliding/necklace.png">
                <h4>Necklaces from $99.99</h4></div>
                <div><img src="images/womensliding/bags.png">
                <h4>Leather Bags from $59.99</h4></div>
            </div>
        </div>
    </div>
</div>

<?php
$q = "SELECT * FROM products_women ORDER BY women_id";
$r = @mysqli_query($dbc,$q);
echo '<div class="container">
<div class="row">';
while($row = @mysqli_fetch_array($r,MYSQLI_ASSOC)){
    echo '<div class="col-sm-4 mt-50">
            <div class="lattest-product-area pb-40 category-list">
                <div class="single-product col-sm-10">
                    <div class="content">
                    <img name="one" class="content-image img-fluid d-block mx-auto" src='. $row['prod_image'] .' alt="image">
                    </div>
                    <div class="price">
                        <h4>'. $row['product_name'] .'</h4>
                        <h3 class="prodprice">'. $row['product_price'] .'</h3>
                        <form method="post" action="women.php">
                            <input type="hidden" name="wid" value='. $row['women_id'] .'>
                            <input type="hidden" name="wprice" value='. $row['product_price'] .'> 
                            <button name="prodbtn" class="btn btn-primary">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
}
echo' </div>
</div>';
include('includes/footer.php');
?>