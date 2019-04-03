<?php
session_start();
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');
if(isset($_SESSION['prodid'])){
    $id = $_SESSION['prodid'];
    $prodimg = "SELECT * FROM products_men WHERE product_id = $id ";
    $details = "SELECT * FROM men_details WHERE product_id = $id";
    $resimg = @mysqli_query($dbc,$prodimg);
    $resdet = @mysqli_query($dbc,$details);

    $rowimg = @mysqli_fetch_array($resimg);
    $rowdet = @mysqli_fetch_array($resdet);
    $img = $rowimg['prodimage'];
    $name = $rowimg['productname'];
    $pprice = $rowimg['price']; 

    $category = $rowdet['category'];
    $desc = $rowdet['description'];
    $info = $rowdet['info'];
}

if(isset($_POST['post'])){
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    $inscomment = "INSERT INTO comments_men(product_id,full_name,email_id,phoneno,msg) VALUES($id,'$fullname','$email','$phone','$msg')";
    $rescomment = @mysqli_query($dbc,$inscomment);
    if($rescomment){
         echo '<script type="text/javascript">
        location.href="/mendetails.php";
    </script>';
    }
    else{
        echo 'Not Posted';
        echo $insertcomment;
    }
}

if(isset($_POST['cartbtn'])){
    $product = $_POST['product'];
    $quant = $_POST['quantity'];
    $sz = $_POST['size'];

    if(empty($_SESSION['menquantity'])){
        $_SESSION['menquantity'] = array();
    } 
    if(empty($_SESSION['mensize'])){
        $_SESSION['mensize'] = array();
    }
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $product);
    array_push($_SESSION['menquantity'], $quant);
    array_push($_SESSION['mensize'], $sz);
     echo '<script type="text/javascript">
        location.href="/men.php";
    </script>';
}
?>
<div class="container">
    <div class="product-quick-view">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="view-details">
                    <div class="item">
                        <?php
                            echo '<img name="prodimg" class="item" src='.$img.' alt="image">';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quick-view-content">
                    <div class="top">
                        <h3 class="head"> <?php echo $name; ?> </h3>
                        <div class="price d-flex align-items-center">
                            <i class="fas fa-tag"></i>
                            <span class="amount ml-3"> <?php echo $_SESSION['prodprice'] ?> </span>
                        </div>
                        <h4>Category:<span><?php echo $category; ?></span></h4>
                        <h4 class="available">Availability:<span>InStock</span></h4>
                    </div>
                    <form method="post" action="mendetails.php">
                    <div class="row col-lg-8">
                        <input type="radio" name="size" value="XS"><h4 class="mr-3">XS</h4>
                        <input type="radio" name="size" value="S"><h4 class="mr-3">S</h4>
                        <input type="radio" name="size" value="M"><h4 class="mr-3">M</h4>
                        <input type="radio" name="size" value="L"><h4 class="mr-3">L</h4>
                        <input type="radio" name="size" value="XL"><h4 class="mr-3">XL</h4>
                        <input type="radio" name="size" value="XXL"><h4>XXL</h4>
                    </div> 
                    
                    <div class="quantity-container d-flex align-items-center mt-3">
                        Quantity:
                        <input type="text" name="quantity" class="quantity-amount ml-3" value="1" />
                        <div class="arrow-btn d-inline-flex flex-column">
                            <button class="increase arrow" type="button" title="Increase Quantity"><i class="fas fa-chevron-up"></i></button>
                            <button class="decrease arrow" type="button" title="Decrease Quantity"><i class="fas fa-chevron-down"></i></button>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                            <input type="hidden" name="product" value= <?php echo $id ?> >
                            <button type="submit" name="cartbtn" class="view-btn"><span>Add to Cart</span></button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="details-tab-navigaton d-flex justify-content-center mt-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li>
                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-expanded="true">Description</a>
            </li>
            <li>
                <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification">Specification</a>
            </li>
            <li>
                <a class="nav-link active" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments">Comments</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description">
            <div class="description">
                <p><?php  echo $desc; ?></p>
            </div>
        </div>
        <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification">
            <h5>Fabric info</h5>
            <p>-<?php  echo $info; ?></p>
        </div>
        <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments">
            <div class="review-wrapper">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="total-comment">
                            <div class="single-comment">
                                <?php
                                $comment = "SELECT * FROM comments_men WHERE product_id=$id";
                                $rescomm = @mysqli_query($dbc,$comment);
                                $numrow = @mysqli_num_rows($rescomm);
                                if($numrow > 0){
                                    while($rowcomm = @mysqli_fetch_array($rescomm,MYSQLI_ASSOC)){
                                        echo'<div class="user-details d-flex align-items-center flex-wrap">
                                                <div class="user-name order-3 order-sm-2">
                                                    <h5>'. $rowcomm['full_name'] .'</h5>
                                                    <span><script>var d = new Date(); document.write(d);</script></span>
                                                </div>
                                                <a href="#" class="view-btn color-2 reply order-2 order-sm-3"><i class="fa fa-reply" aria-hidden="true"></i><span>Reply</span></a>
                                            </div>
    
                                            <p class="user-comment">
                                                '. $rowcomm['msg']  .'
                                            </p>';
                                    }
                                }
                                else{
                                    echo '<div class="user-details d-flex align-items-center flex-wrap">
                                            <div class="user-name order-3 order-sm-2">
                                                <h5>Be the First one to leave a Comment</h5>
                                            </div>
                                        </div>';
                                }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add-review">
                            <h3>Post a comment</h3>
                            <form action="mendetails.php" method="post" class="main-form">
                                <input type="text" name="fname" placeholder="Your Full name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your Full name'" required class="common-input">
                                <input type="email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address'" class="common-input">
                                <input type="text" name="phone" placeholder="Phone Number" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone Number'" class="common-input">
                                <textarea placeholder="Messege" name="msg" onfocus="this.placeholder=''" onblur="this.placeholder = 'Messege'" required class="common-textarea"></textarea>
                                <button class="view-btn" name="post"><span>Submit Now</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php
include('includes/footer.php');
?>