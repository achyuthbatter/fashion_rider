<?php
session_start();
$page_title = "Fashion Rider";
include('includes/header.php');
require('mysqli_connect.php');

if(isset($_SESSION['kaccessid'])){
    $id = $_SESSION['kaccessid'];
    $kiprod = "SELECT * FROM kidsaccess WHERE kaccess_id = $id ";
  
    $reskid = @mysqli_query($dbc,$kiprod);
   
    $rowkid = @mysqli_fetch_array($reskid);
    
    $img = $rowkid['imageone'];
    $name = $rowkid['prodname'];
    $categkid = $rowkid['category'];
}

else if(isset($_SESSION['wid'])){
    $beid = $_SESSION['wid'];
    $id = $_SESSION['wid'];
    $wbeprod = "SELECT * FROM womenaccess WHERE access_id = $beid ";
  
    $resbe = @mysqli_query($dbc,$wbeprod);
   
    $roww = @mysqli_fetch_array($resbe);
    
    $beimg = $roww['imageone'];
    $bename = $roww['prodname'];
    $categbe = $roww['category'];
}
if(isset($_SESSION['mid'])){
    $mid = $_SESSION['mid'];
    $id = $_SESSION['mid'];
    $wsprod = "SELECT * FROM menaccess WHERE menacc_id = $mid ";
  
    $ressh = @mysqli_query($dbc,$wsprod);
   
    $rowws = @mysqli_fetch_array($ressh);
    
    $mimg = $rowws['imageone'];
    $mname = $rowws['prodname'];
    $categm = $rowws['category'];
}

if(isset($_POST['post'])){
    if(isset($_SESSION['kaccessid'])){
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        $inscomment = "INSERT INTO commentskids(kaccess_id,full_name,email_id,phoneno,msg) VALUES($id,'$fullname','$email','$phone','$msg')";
        $rescomment = @mysqli_query($dbc,$inscomment);
        if($rescomment){
             echo '<script type="text/javascript">
                location.href="/single-product-details.php";
            </script>';
        }
        else{
            echo 'Not Posted';
        }
    }
    else if(isset($_SESSION['wid'])){
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        $inscomment = "INSERT INTO commentswomacc(access_id,full_name,email_id,phoneno,msg) VALUES($id,'$fullname','$email','$phone','$msg')";
        $rescomment = @mysqli_query($dbc,$inscomment);
        if($rescomment){
             echo '<script type="text/javascript">
                location.href="/single-product-details.php";
            </script>';
        }
        else{
            echo 'Not Posted';
        }
    }
    else if(isset($_SESSION['mid'])){
        $fullname = $_POST['fname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $msg = $_POST['msg'];
        $inscomment = "INSERT INTO commentsmensacc(menacc_id,full_name,email_id,phoneno,msg) VALUES($id,'$fullname','$email','$phone','$msg')";
        $rescomment = @mysqli_query($dbc,$inscomment);
        if($rescomment){
            echo '<script type="text/javascript">
                location.href="/single-product-details.php";
            </script>';
        }
        else{
            echo 'Not Posted';
        }
    }
}
?>
<div class="container">
    <div class="product-quick-view">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="view-details">
                    <div class="item">
                        <?php
                        if(isset($_SESSION['kaccessid'])){
                            echo '<img name="prodimage" class="item" src='. $img.' alt="image">';
                        }
                        else if(isset($_SESSION['wid'])){
                            echo '<img name="prodimage" class="item" src='. $beimg .' alt="image">';
                        }
                        else if(isset($_SESSION['mid'])){
                            echo '<img name="prodimage" class="item" src='. $mimg .' alt="image">';
                        }
                            
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quick-view-content">
                    <div class="top">
                        <h3 class="head"> <?php 
                            if(isset($_SESSION['kaccessid'])){
                                echo $name;
                            }
                            else if(isset($_SESSION['wid'])){
                                echo $bename;
                            } 
                            else if(isset($_SESSION['mid'])){
                                echo $mname;
                            }
                            ?> </h3>
                        <div class="price d-flex align-items-center">
                            <i class="fas fa-tag"></i>
                            <span class="amount ml-3"> <?php 
                            if(isset($_SESSION['kaccessid'])){
                                echo $_SESSION['kidprice'];
                            }
                            else if(isset($_SESSION['wid'])){
                                echo $_SESSION['wprice'];
                            }
                            else if(isset($_SESSION['mid'])){
                                echo $_SESSION['mprice'];
                            }
                             ?> </span>
                        </div>
                        <h4>Category:<span><?php 
                            if(isset($_SESSION['kaccessid'])){
                                echo $categkid;
                            }
                            else if(isset($_SESSION['wid'])){
                                echo $categbe;
                            }
                            else if(isset($_SESSION['mid'])){
                                echo $categm;
                            }
                             ?></span></h4>
                            
                        <h4 class="available">Availability:<span>InStock</span></h4>
                    </div>
                    <!-- <?php
                        if(isset($_SESION['kaccessid'])){
                            echo'<div class="row col-lg-8">
                        <input type="radio" name="size" value="XS"><h4 class="mr-3">XS</h4>
                        <input type="radio" name="size" value="S"><h4 class="mr-3">S</h4>
                        <input type="radio" name="size" value="M"><h4 class="mr-3">M</h4>
                        <input type="radio" name="size" value="L"><h4 class="mr-3">L</h4>
                        <input type="radio" name="size" value="XL"><h4 class="mr-3">XL</h4>
                        <input type="radio" name="size" value="XXL"><h4>XXL</h4>
                        </div>'; 
                        }
                    ?> -->
                    <div class="quantity-container d-flex align-items-center mt-3">
                        Quantity:
                        <input type="text" class="quantity-amount ml-3" value="1" />
                        <div class="arrow-btn d-inline-flex flex-column">
                            <button class="increase arrow" type="button" title="Increase Quantity"><i class="fas fa-chevron-up"></i></button>
                            <button class="decrease arrow" type="button" title="Decrease Quantity"><i class="fas fa-chevron-down"></i></button>
                        </div>
                    </div>
                    <div class="d-flex mt-4">
                        <form method="post" action="single-product-details.php">
                            <button type="submit" class="view-btn"><span>Add to Cart</span></button>
                            
                        </form>
                        <button type="submit" class="view-btn" name="back" onclick="goBack()"><span>Back</span></button>
                        
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="comments">
            <div class="review-wrapper">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="total-comment">
                            <div class="single-comment">
                                <?php
                                if(isset($_SESSION['kaccessid'])){
                                    $comment = "SELECT * FROM commentskids WHERE kaccess_id = $id";
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
                                }
                                else if(isset($_SESSION['wid'])){
                                    $comment = "SELECT * FROM commentswomacc WHERE access_id = $id";
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
                                }
                                else if(isset($_SESSION['mid'])){
                                    $comment = "SELECT * FROM commentsmensacc WHERE menacc_id = $id";
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
                                } 
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add-review">
                            <h3>Post a comment</h3>
                            <form action="single-product-details.php" method="post" class="main-form">
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
<script>
    function goBack(){
    window.history.back();
}
</script>

