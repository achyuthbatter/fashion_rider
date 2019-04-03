<?php
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
?>
<section class="container">
    <div class="row">
        <div class="media mr-5">
            <img src="images/achyuth.png" alt="image" class="img-thumbnail align-self-center d-flex">
            <div class="media-body mt-2 ml-2">
                <h3>Achyuth Batter</h3>
                <p>Member-1</p>
                <a href="https://www.achyuthbatterportfolio.co" target="_blank">Portfolio</a>
            </div>
        </div>
        <div class="media">
            <img src="images/Prasan.png" alt="image" class="img-thumbnail align-self-center d-flex">
            <div class="media-body ml-2">
                <h3>Prasnajit Singh</h3>
                <p>Member-2</p>
                <a href="https://www.prasanjitsingh.co" target="_blank">Portfolio</a>
            </div>
        </div>
        <div class="media mt-3 mr-5">
            <img src="images/charu.png" alt="image" class="img-thumbnail align-self-center d-flex">
            <div class="media-body ml-2">
                <h3>Charu Bhalla</h3>
                <p>Member-3</p>
                <a href="https://www.charubhalla.co" target="_blank">Portfolio</a>
            </div>
        </div>
        <div class="media mt-3 ml-4">
            <img src="images/pawan.png" alt="image" class="img-thumbnail align-self-center d-flex">
            <div class="media-body ml-2">
                <h3>Pawan Sharma</h3>
                <p>Member-4</p>
                <a href="https://pawan7837.github.io/Pawan-Portfolio/" target="_blank">Portfolio</a>
            </div>
        </div>
    </div>
</section>
<?php
require('includes/footer.php');
?>