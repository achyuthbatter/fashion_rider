<?php
session_start();
$page_title="Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_POST['details'])){
    $_SESSION['wid'] = $_POST['prodid'];
    $_SESSION['wprice'] = $_POST['price'];
     echo '<script type="text/javascript">
                location.href="/single-product-details.php";
            </script>';
 }
?>
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="shop_sidebar_area">
                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Catagories</h6>
                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="womenaccess.php">Women's Categories</a>
                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="beauty.php">Beauty</a>
                                </li>

                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="shoes.php">Shoes</a>

                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                    <a href="bags.php">Bags</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">By Product</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Backpacks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">By Brand</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="#">Zara</a></li>
                                <li><a href="#">Sephora</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
            <?php
                $get = "SELECT * FROM womenaccess WHERE category='Bags' ";
                $resget = @mysqli_query($dbc,$get);
                while($rowget = @mysqli_fetch_array($resget,MYSQLI_ASSOC)){
                    echo'<div class="col-sm-4 ">
                    <div class="row">
                        <div class="single-product col-sm-12">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img name="one" src='. $rowget['imageone'] .' alt="imageone">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src='. $rowget['imagetwo'] .' alt="imagetwo">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description">
                                <form method="post" action="bags.php">
                                    <a href="single-product-details.php">
                                        <h6>'. $rowget['prodname'] .'</h6>
                                    </a>
                                    <p class="product-price">$'. $rowget['prodprice'] .'</p>
                                    <input type="hidden" name="prodid" value='. $rowget['access_id'] .'>
                                    <input type="hidden" name="price" value='. $rowget['prodprice'] .'>
                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="#" class="btn essence-btn">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="details" class="btn btn-primary">More Details</button>
                        </form>
                    </div>
                </div>';   
                }
            ?>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
include('includes/footer.php');
?>
