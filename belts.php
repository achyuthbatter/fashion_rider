<?php
session_start();
$page_title="Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_POST['details'])){
    $_SESSION['mid'] = $_POST['prodid'];
    $_SESSION['mprice'] = $_POST['price'];
     echo '<script type="text/javascript">
                location.href="/single-product-details.php";
            </script>';
 }
?>
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
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
                                    <a href="belts.php">Belts</a>
                                </li>

                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                    <a href="ties.php">Ties</a>

                                </li>
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                    <a href="watches.php">Watches</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                     <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">By Brand</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="#">Calvin Klein</a></li>
                                <li><a href="#">Bananas Republic</a></li>
                                <li><a href="#">Under Armour</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-9">
            <div class="row">
            <?php
                $get = "SELECT * FROM menaccess WHERE category='Belt' ";
                $resget = @mysqli_query($dbc,$get);
                while($rowget = @mysqli_fetch_array($resget,MYSQLI_ASSOC)){
                    echo'<div class="col-sm-4 ">
                    <div class="row">
                        <div class="single-product col-sm-12">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img name="one" class="content-image img-fluid d-block mx-auto" src='. $rowget['imageone'] .' alt="image">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description">
                                    <form method="post" action="belts.php">
                                    <a href="single-product-details.php">
                                        <h6>'. $rowget['prodname'] .'</h6>
                                    </a>
                                    <p class="product-price">$'. $rowget['prodprice'] .'</p>
                                    <input type="hidden" name="prodid" value='. $rowget['menacc_id'] .'>
                                    <input type="hidden" name="price" value='. $rowget['prodprice'] .'>
                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="#" class="btn essence-btn">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="details" class="btn btn-primary">More Details</button>
                        </form>
                        </div>
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
