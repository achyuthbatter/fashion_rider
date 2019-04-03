<?php
session_start();
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_POST['prodbtn'])){
   $_SESSION['prodname'] = $_POST['prodname'];
   $_SESSION['prodprice'] = $_POST['price'];
   $_SESSION['prodid'] = $_POST['prodid'];
//   include('includes/login_func.inc.php');
//   redirect_user('mendetails.php');
    echo '<script type="text/javascript">
        location.href="/mendetails.php";
    </script>';
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <h4>Offers &amp; Deals</h4>
            <p>Mens Shop Sale</p>
            <p>Online Exclusive</p>
            
            <h4>Shop By Products</h4>
            <p>T-Shirts</p>
            <p>Shirts</p>
            <p>Jeans</p>
            <p>Joggers</p>
            
            <h4>Shop By Brand</h4>
            <p>Gap</p>
            <p>Hollister</p>
            <p>Old Navy</p>
            <p>Bench.</p>
        </div>
        
        <div class="col-sm-10">
            <img src="images/header/menheader.png" alt="header" class="img-fluid rounded">
            <div class="sliding">
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
                <div><img src="images/mensliding/display-1.png"></div>
            </div>
        </div>
    </div>
</div>
<?php
$qm = "SELECT * FROM products_men ORDER BY product_id";
$rm = @mysqli_query($dbc,$qm);
echo '<div class="container">
<div class="row">';
while($rowm = @mysqli_fetch_array($rm,MYSQLI_ASSOC)){
    echo '<div class="col-sm-4 mt-50">
            <div class="lattest-product-area pb-40 category-list">
                <div class="single-product col-sm-10">
                    <div class="content">
                        <img name="one" class="content-image img-fluid d-block mx-auto" src='. $rowm['prodimage'] .' alt="image">
                    </div>
                    <div class="price">
                        
                        <h4>'. $rowm['productname'] .'</h4>
                        <h3 class="prodprice">'. $rowm['price'] .'</h3>
                        <form method="post" action="men.php">
                            <input type="hidden" name="prodid" value=' . $rowm['product_id'] . '> 
                            <input type="hidden" name="prodname" value='. $rowm['productname'] .'>
                            <input type="hidden" name="price" value='. $rowm['price'] .'>
                            <button name="prodbtn" role="button" class="btn btn-primary">Buy</button>
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