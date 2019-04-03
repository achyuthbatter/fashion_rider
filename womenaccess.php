<?php
session_start();
$page_title="Fashion Rider";
include('includes/header.php');
unset($_SESSION['kaccessid']);
unset($_SESSION['mid']);

?>
<div class="container">
    <h2 class="mb-3">Choose a Category</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/beauty.jpg);">
                <div class="catagory-content">
                    <a href="beauty.php">Beauty</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/shoes.jpg);">
                <div class="catagory-content">
                    <a href="shoes.php">Shoes</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/bags.jpg);">
                <div class="catagory-content">
                    <a href="bags.php">Bags</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>