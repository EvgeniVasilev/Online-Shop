<?php
ob_start();
session_start();
require_once 'templates/head.php';

require_once 'classes/DB.php';

$db = new DB();
$db->connect('localhost', 'root', '', 'store');
?>
    <div class="container-fluid  window">
        <div id="myCarousel" class="carousel slide col-lg-6 col-md-6 col-sm-6" data-ride="carousel"
             style="padding: 13px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <!--<li data-target="#myCarousel" data-slide-to="3"></li>-->
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img
                        src="http://thumb1.shutterstock.com/display_pic_with_logo/1428518/204877840/stock-photo-young-beautiful-women-at-the-weekly-cloth-market-best-friends-sharing-free-time-having-fun-and-204877840.jpg"
                        alt="Flower" class="img">
                </div>

                <div class="item">
                    <img
                        src="http://thumb7.shutterstock.com/display_pic_with_logo/459187/156198461/stock-photo-background-with-shoes-on-shelves-of-shop-156198461.jpg"
                        alt="Chania" class="img">
                </div>

                <div class="item"><img
                        src="http://thumb7.shutterstock.com/display_pic_with_logo/2403095/209979001
/stock-photo-jewelry-window-display-209979001.jpg" alt="Flower" class="img">
                </div>

            </div>
        </div>
        <!--slider-->

        <div class="carousel slide col-lg-6 col-md-6 col-sm-6 padded-13">
            <div class="carousel-inner hidden-xs" role="listbox">
                <div class="item active">
                    <img
                        src="http://thumb9.shutterstock.com/display_pic_with_logo/579082/579082,1271010336,2/stock-photo-children-playing-with-blocks-on-the-floor-focus-on-the-boy-s-face-50844475.jpg"
                        alt="Flower" class="img">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="container-fluid">
            <a href="#top" id="toTop" class="scroll-top"><img src="images/back-top.png" width="100%" height="100%"/></a>
            <!--        CLOTHES-->
            <div class="row" id="clothes">
                <div class="col-lg-12">
                    <h1>
                        <small>
                            CLOTHES
                        </small>
                    </h1>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="./clothes.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See
                            More</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            $table_name = "clothes";
                            $sql = "SELECT * FROM " . $table_name . " ORDER BY item_id ASC Limit 6";
                            $result = $db->select($sql);

                            foreach ($result as $row) {
                                echo "<div class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>";
                                echo "<input name=\"item_id\" type='hidden' value='" . $row['item_id'] . "'/>";
                                echo "<div class=\"panel-heding panel-item offset-top-12\">";
                                echo $row['item_caption'];
                                echo "</div>";
                                echo "<img class=\"img-responsive offset-bottom\" src='uploads/" . $row['item_url'] . "'/>";
                                // buttons
                                // see more
                                echo "<div class=\"col-lg12\">";
                                echo "<a href=\"items.php?item_id=" . $row["item_id"] . "&tbl_name=" . $table_name . "\"class=\"btn btn-primary col-lg-12 col-md-12 col-sm12 col-xs-12 offset-bottom\">";
                                echo "See More";
                                echo "</a>";
                                echo "<br/>";
                                echo "</div>";
                                // buttons
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <br/>


                <!--            SHOES-->
                <div class="row" id="shoes">
                    <div class="col-lg-12">
                        <h1>
                            <small>
                                SHOES
                            </small>
                        </h1>
                    </div>
                </div>
                <div class="panel panel-primary" id="shoes">
                    <div class="panel-heading">
                        <a href="./shoes.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            $table_name = "shoes";
                            $sql = "SELECT * FROM " . $table_name . " ORDER BY item_id ASC Limit 6";
                            $result = $db->select($sql);

                            foreach ($result as $row) {
                                echo "<div class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>";
                                echo "<input name=\"item_id\" type='hidden' value='" . $row['item_id'] . "'/>";
                                echo "<div class=\"panel-heding panel-item offset-top-12\">";
                                echo $row['item_caption'];
                                echo "</div>";
                                echo "<img class=\"img-responsive offset-bottom\" src='uploads/" . $row['item_url'] . "'/>";
                                // buttons
                                // see more
                                echo "<div class=\"col-lg12\">";
                                echo "<a href=\"items.php?item_id=" . $row["item_id"] . "&tbl_name=" . $table_name . "\"class=\"btn btn-primary col-lg-12 col-md-12 col-sm12 col-xs-12 offset-bottom\">";
                                echo "See More";
                                echo "</a>";
                                echo "<br/>";
                                echo "</div>";
                                // buttons
                                echo "</div>";
                            }
                            ?>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="./juels.php" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See More</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            $table_name = "jewellery";
                            $sql = "SELECT * FROM " . $table_name . " ORDER BY item_id ASC Limit 6";
                            $result = $db->select($sql);

                            foreach ($result as $row) {
                                echo "<div class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>";
                                echo "<input name=\"item_id\" type='hidden' value='" . $row['item_id'] . "'/>";
                                echo "<div class=\"panel-heding panel-item offset-top-12\">";
                                echo $row['item_caption'];
                                echo "</div>";
                                echo "<img class=\"img-responsive offset-bottom\" src='uploads/" . $row['item_url'] . "'/>";
                                // buttons
                                // see more
                                echo "<div class=\"col-lg12\">";
                                echo "<a href=\"items.php?item_id=" . $row["item_id"] . "&tbl_name=" . $table_name . "\"class=\"btn btn-primary col-lg-12 col-md-12 col-sm12 col-xs-12\">";
                                echo "See More";
                                echo "</a>";
                                echo "<br/>";
                                echo "</div>";
                                // buttons
                                echo "</div>";
                            }
                            ?>
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
                <div class="panel panel-primary" id="kids">
                    <div class="panel-heading">
                        <a href="./kids.php" href="#" class="light"><i class="glyphicon glyphicon-unchecked"></i>&nbsp;See
                            More</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            $table_name = "kids";
                            $sql = "SELECT * FROM " . $table_name . " ORDER BY item_id ASC Limit 6";
                            $result = $db->select($sql);

                            foreach ($result as $row) {
                                echo "<div class='col-lg-2 col-md-3 col-sm-3 col-xs-3'>";
                                echo "<input name=\"item_id\" type='hidden' value='" . $row['item_id'] . "'/>";
                                echo "<div class=\"panel-heding panel-item offset-top-12\">";
                                echo $row['item_caption'];
                                echo "</div>";
                                echo "<img class=\"img-responsive offset-bottom\" src='uploads/" . $row['item_url'] . "'/>";
                                // buttons
                                // see more
                                echo "<div class=\"col-lg12\">";
                                echo "<a href=\"items.php?item_id=" . $row["item_id"] . "&tbl_name=" . $table_name . "\"class=\"btn btn-primary col-lg-12 col-md-12 col-sm12 col-xs-12 offset-bottom\">";
                                echo "See More";
                                echo "</a>";
                                echo "</div>";
                                // buttons
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
