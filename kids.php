<?php
require_once 'templates/head.php';

require_once 'classes/DB.php';

$db = new DB();
$db->connect("", "", "", "");
?>
    <div class="container-fluid window">
        <div class="page-header">
            <h1>
                <small>For Kids</small>
            </h1>
        </div>
        <div class="panel panel-primary">
            <a href="#top" id="toTop" class="scroll-top"><img src="images/back-top.png" width="100%" height="100%"/></a>

            <div class="panel-body">
                <?php
                $table_name = 'kids';
                $sql = 'SELECT * FROM clothes';
                $result = $db->select($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    echo "<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3'>";
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
<?php
require_once 'templates/footer.php';
