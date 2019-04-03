<?php
session_start();
$page_title = 'Fasion Rider';
include('includes/header.php');

echo '<section>
        <div class="mainSlider">
            <div><img src="images/Slider/frontend_slide.png"></div>
            <div><img src="images/Slider/ModalImage.png"></div>
            <div><img src="images/Slider/model.png"></div>
            <div><img src="images/Slider/offerslider.png"></div>
            <div><img src="images/Slider/slider.png"></div>
        </div>
    </section>';

echo '<section class="category-area section-gap" id="catagory">
			<div class="container">
                <div class="row d-flex justify-content-center">
				    <div class="menu-content pb-40">
				        <div class="title text-center">
				            <h1 class="mb-10">Shop for Different Categories</h1>
				            <p>Who are in extremely love with eco friendly system.</p>
				        </div>
				    </div>
				</div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-10">
                        <div class="row category-bottom">
                            <div class="col-lg-4 col-md-6">
								<div class="content">
								    <a href="women.php" >
                                        <h3>Women&#39;s Sale</h3>
									  	<img class="content-image img-fluid d-block mx-auto" src="images/WOMEN/women.jpg" alt="women">
                                    </a>
								</div>
				            </div>
                            <div class="col-lg-4 col-md-6 ">
								<div class="content">
								    <a href="men.php">
                                        <h3>Men&#39;s Sale</h3>
									  	<img class="content-image img-fluid d-block mx-auto" src="images/MEN/man2.jpg" alt="Men">
								    </a>
								</div>
				            </div>
                            <div class="col-lg-4 col-md-6 ">
								<div class="content">
								    <a href="kidsinfants.php">
                                        <h3>Kid&#39;s Sale</h3>
									  	<img class="content-image img-fluid d-block mx-auto" src="images/kids.jpg" alt="Kids">
								    </a>
								</div>
				            </div>
                        </div>
                    </div>
                </div>
            </div>	
      </section>';

include('includes/footer.php');
?>