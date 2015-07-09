<?php
require_once 'classes/DB.php';

// $db = new DB();
// $db->connect('localhost', 'root', '', "store");

require_once 'templates/head.php';
?>
<div class="container-fluid  window">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <!--            <li data-target="#myCarousel" data-slide-to="3"></li>-->
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            <div class="item active">
                <img src="images/img_chania2.jpg" alt="Chania" class="img">
            </div>

            <div class="item">
                <img src="images/img_flower.jpg" alt="Flower" class="img">
            </div>

            <div class="item">
                <img src="images/img_flower2.jpg" alt="Flower" class="img">
            </div>
        </div>
    </div>
    <!--slider-->
    <br/>
    <br/>

    <div class="container-fluid">
        <!--        CLOTHES-->
        <div class="row" id="clothes">
            <div class="col-lg-12">
                <h1>
                    <small>
                        Clothes
                    </small>
                </h1>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-primary window">
                <div class="panel-heading">
                    <a  href="./clothes.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6  offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-sm-6  offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 col-sm-6  offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>


                        <div class="col-lg-3  col-md-6 col-sm-6  offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>


            <!--            SHOES-->
            <div class="row" id="shoes">
                <div class="col-lg-12">
                    <h1>
                        <small>
                            Shoes
                        </small>
                    </h1>
                </div>
            </div>
            <div class="panel panel-primary window" id="shoes">
                <div class="panel-heading">
                    <a href="./shoes.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 offset-bottom">
                            <div class="panel-danger">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 offset-bottom">
                            <div class="panel-danger ">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <!--            JEWELLERY-->

            <div class="row" id="juels">
                <div class="col-lg-12">
                    <h1>
                        <small>
                            JEWELLERY
                        </small>
                    </h1>
                </div>
            </div>
            <div class="panel panel-primary window">
                <div class="panel-heading">
                    <a href="./juels.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>

            <!--            FOR KIDS-->
            <div class="row" id="kids">
                <div class="col-lg-12">
                    <h1>
                        <small>
                            FOR KIDS
                        </small>
                    </h1>
                </div>
            </div>
            <div class="panel panel-primary window" id="kids">
                <div class="panel-heading">
                    <a href="./kids.php" href="#" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger">
                                <div class="panel-heading offset-bottom">Item One</div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="panel-danger offset-bottom">
                                <div class="panel-heading">Item One</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'templates/footer.php';
?>


