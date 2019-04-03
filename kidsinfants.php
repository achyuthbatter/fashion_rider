<?php
session_start();
$page_title="Fashion Rider";
include('includes/header.php');
unset($_SESSION['wid']);
unset($_SESSION['mid']);
?>
<div class="container">
    <h2 class="mb-3">Choose a Category</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/kidsbag.jpg);">
                <div class="catagory-content">
                    <a href="kidbags.php">Bags</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/iii.jpg);">
                <div class="catagory-content">
                    <a href="caps.php">Caps</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(images/ACCESSORIES/clothes.jpg);">
                <div class="catagory-content">
                    <a href="clothes.php">Clothes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>