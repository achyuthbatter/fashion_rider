<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $page_title; ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!--    datepicker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<!--    slick carousel-->
    <link rel="stylesheet" href="slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="slick-1.8.1/slick/slick-theme.css">

    <link href="css/main.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

   
</head>

<body>
    <header class="default-header">
        <div id="bg-selector">
        <div class="color white" data-value="#fff"></div>
        <div class="color gray" data-value="#eaeaea"></div>
        <div class="color black" data-value="#000"></div>
        <div class="color blue" data-value="#00529c"></div>
        <!-- <div class="color picker" onclick="pickColor();">
            <img src='data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" 
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" 
            preserveAspectRatio="xMinYMin"><path fill="#444444" d="M30.828 1.172c-1.562-1.562-4.095-1.562-5.657 0l-5.379 5.379-3.793-3.793-4.243 4.243 3.326 3.326-14.754 14.754c-0.252 0.252-0.358 0.592-0.322 0.921h-0.008v5c0 0.552 0.448 1 1 1h5c0 0 0.083 0 0.125 0 0.288 0 0.576-0.11 0.795-0.329l14.754-14.754 3.326 3.326 4.243-4.243-3.793-3.793 5.379-5.379c1.562-1.562 1.562-4.095 0-5.657zM5.409 30h-3.409v-3.409l14.674-14.674 3.409 3.409-14.674 14.674z"></path></svg>' />
        </div> -->
        </div>
    
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/logo2.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" role="button" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarContent">
                    <ul class="navbar-nav">
                        <li><a href="index.php" role="link"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="men.php" role="link"><i class="fa fa-male"></i> Men</a></li>
                        <li><a href="women.php" role="link"><i class="fa fa-female"></i> Women</a></li>
                        <!-- Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-list"></i> Categories</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" role="link" href="menaccess.php">Mens Accessories</a>
                                <a class="dropdown-item" role="link" href="womenaccess.php">Women Accessories</a>
                                <a class="dropdown-item" role="link" href="kidsinfants.php">Kids &amp; Infants</a>
                            </div>
                        </li>
                        <?php
                            if (isset($_SESSION['login_id'])) {
	                           echo '<li class="dropdown">
                                        <a class="dropdown-toggle" role="link" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-list"></i>';
                                echo $_SESSION['username'] ;
                                echo '</a>
                                        <div class ="dropdown-menu">
                                            <a class="dropdown-item" role="link" href="loginsecurity.php">Edit Profile</a>
                                            <a class="dropdown-item" role="link" href="address.php">Add/Edit Addresses</a>
                                            <a class="dropdown-item" role="link" href="logout.php">Logout</a>
                                        </div>
                                    </li>';
                            } else {
                            echo '<li><a href="login.php" role="link"><i class="fa fa-sign-in-alt"></i>Login/Register</a></li>';
                            }
                        ?>
                        <li><a href="cart.php"><i class="fa fa-cart-plus"></i> Cart
                            <?php
                                if(isset($_SESSION['cart'])){
                                    echo '('. sizeof($_SESSION['cart']) .')';
                                }
                                else if(isset($_SESSION['wcart'])){
                                    echo '('. sizeof($_SESSION['wcart']) .')';
                                }
                            ?>
                    
                    </a></li>
                        <li><a href="contactus.php" role="link"><i class="fa fa-phone"></i>Contact</a></li>
                        <li><a href="teams.php" role="link"><i class="fas fa-users"></i>Team</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="content">
