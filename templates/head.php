<?php
require_once 'classes/Helper.php';
$h = new Helper();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $h->title(); ?></title>
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="custom/main.css"/>
        <link href="font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
        <script src="custom/scrool.js"></script>
        <script src="custom/shopp.js"></script>
    </head>
    <body id="top">
        <div class="container-fluid" id="head">
            <!--sub navigation-->
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="logo">
                        <small>Orenda Store</small>
                    </h1>
                </div>
                <br/>

                <div class="col-lg-6 custom-navbar">
                    <nav>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="./aboutus.php">About Us</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="./payment.php">Payment and Delivery</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="./withdraw.php">Withdraw</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="./contacts.php">Contacts</a>
                        <span>&nbsp;|&nbsp;</span>
                        <?php
                        if (isset($_SESSION['tbl_name']) and isset($_SESSION['item_id'])):
                            ?>
                            <a href="./cart.php?tbl_name=<?php echo $_SESSION['tbl_name']; ?>&item_id=<?php echo $_SESSION['item_id'] ?>">View Cart</a>
                            <span>&nbsp;|&nbsp;</span>
                        <?php endif; ?>  
                        <?php
                        if (!isset($_SESSION['tbl_name']) and !isset($_SESSION['item_id'])):
                            ?>
                            <a href="./cart.php">Cart is Empty</a>
                            <span>&nbsp;|&nbsp;</span>
                        <?php endif; ?>                          
                    </nav>
                </div>

            </div>
        </div>
        <!--====================-->
        <!--NAVIGATION-->
        <nav id="nav" class="navbar navbar-inverse flat">
            <div class="container-fluid" id="top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!--manage clothes link-->
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') !== false): ?>
                            <li><a href="#clothes">CLOTHES</a></li>
                        <?php endif; ?>

                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') === false): ?>
                            <li><a href="./clothes.php">CLOTHES</a></li>
                        <?php endif; ?>
                        <!-- manage clothes link-->

                        <!-- manage shoes link-->
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') !== false): ?>
                            <li><a href="#shoes">SHOES</a></li>
                        <?php endif; ?>
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') === false): ?>
                            <li><a href="./shoes.php">SHOES</a></li>
                        <?php endif; ?>
                        <!--manage shoes link-->

                        <!-- manage JEWELLERY link-->
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') !== false): ?>
                            <li><a href="#juels">JEWELLERY</a></li>
                        <?php endif; ?>
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') === false): ?>
                            <li><a href="juels.php">JEWELLERY</a></li>
                        <?php endif; ?>
                        <!-- manage JEWELLERY link-->


                        <!--manage kids link-->
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') !== false): ?>
                            <li><a href="#kids">FOR KIDS</a></li>
                        <?php endif; ?>
                        <?php if (strpos($_SERVER['PHP_SELF'], '/index.php') === false): ?>
                            <li><a href="./kids.php">FOR KIDS</a></li>
                        <?php endif; ?>
                        <!--manage kids link-->

                    </ul>
                    <form class="navbar-form navbar-right hide" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
        </nav>
        <!--NAVIGATION-->
