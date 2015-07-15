<?php
require_once 'templates/head.php';
require_once 'classes/DB.php';

$db = new DB();
$db->connect("", "", "", "");
?>
    <div class="container-fluid window">
        <div class="row">
            <?php
            $table = $_GET["tbl_name"];
            $id = $_GET["item_id"];

            $sql = "SELECT * FROM  $table Where item_id=$id";
            $result = $db->select($sql);
            foreach ($result as $row) {
                // left panel
                echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">";
                echo "<div class=\"panel-item\">";
                echo $row["item_caption"];
                echo "</div>";
                echo "<div class=\"col-lg-6\">";
                echo "<br/>";
                // item image
                echo "<img class=\"img-responsive\" src=\"";
                echo "uploads/" . $row["item_url"] . "\"";
                echo "/>";
                echo "</div>";
                // meta information for item
                echo "<div class=\"col-lg-6\">";
                echo "<br/>";
                echo "<p>";
                echo "<b>Item Price: </b>";
                echo $row["item_price"] . " $";
                echo "</p>";
                echo "<p><b>";
                echo "Price is with no VAT calculated!";
                echo "</b></p>";
                echo "<p><b>";
                echo "Limited o three items per client!";
                echo "</b></p>";
                echo "<form action='./shop.php' method='get' class='form'>";
                echo "<div class='form-group'>";
                // hidden field with value of item id
                echo "<input type='hidden' name='item_id' value='" . $row['item_id'] . "'/>";
                // hidden field with value of table name
                echo "<input type='hidden' name='tbl_name' value='" . $table . "'/>";
                echo "<label class='label label-default'>";
                echo "Item Quantity:";
                echo "</label>";
                echo "<br/></br>";
                echo "<select name='quantity'>";
                // option one
                echo "<option value='1' selected>";
                echo "1";
                echo "</option>";
                // option two
                echo "<option value='2'>";
                echo "2";
                echo "</option>";
                // option three
                echo "<option value='3'>";
                echo "3";
                echo "</option>";
                echo "</select>";
                echo "</div>";
                // form submit button
                echo "<div class='form-group'>";
                echo "<input type='submit' value='Shop Now' class='btn btn-primary form-control'/>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                // right panel
                echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">";
                echo "<div class=\"panel-item\">";
                echo "Item Description";
                echo "</div>";
                echo "<br/>";
                echo "<p>";
                echo $row["item_description"];
                echo "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
<?php
require_once 'templates/footer.php';
