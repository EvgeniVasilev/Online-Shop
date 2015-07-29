<?php
ob_start();
session_start();
require_once './templates/head.php';
require_once './classes/DB.php';
$db = new DB();
$db->connect('localhost', 'root', '', 'store');

if (isset($_REQUEST['item_id']) and ctype_digit($_REQUEST['item_id'])) {
        $id = $_REQUEST['item_id'];
    }

    if (isset($_REQUEST['tbl_name'])and ctype_alpha($_REQUEST['tbl_name'])) {
        $table = $_REQUEST['tbl_name'];
    }

    // get checkout details
    if (isset($_REQUEST['first-name']) and ctype_alpha($_REQUEST['first-name'])) {
        $first_name = $_REQUEST['first-name'];
    }

    if (isset($_REQUEST['second-name']) and ctype_alpha($_REQUEST['second-name'])) {
        $second_name = $_REQUEST['second-name'];
    }

    if (isset($_REQUEST['ship-address']) and ctype_alnum($_REQUEST['ship-address'])) {
        $ship_address = $_REQUEST['ship-address'];
    }

    if (isset($_REQUEST['ship-address-two'])and ctype_alnum($_REQUEST['ship-address-two'])) {
        $ship_address_two = $_REQUEST['ship-address-two'];
    }

    if (isset($_REQUEST['city']) and ctype_alpha($_REQUEST['city'])) {
        $city = $_REQUEST['city'];
    }

    if (isset($_REQUEST['zip']) and ctype_alnum($_REQUEST['zip'])) {
        $zip = $_REQUEST['zip'];
    }

    if (isset($_REQUEST['email']) and filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_REQUEST['email'];
    }

    if (isset($_REQUEST['phone']) and ctype_alnum($_REQUEST['phone'])) {
        $phone = $_REQUEST['phone'];
    }
?>
<div class="container-fluid window">
    <form method='post' action="checkout_three.php?tbl_name=<?php echo $table; ?>&item_id=<?php echo $id; ?>">
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='first-name' class='label label-primary form-control'>FIRST NAME</label>
            <br/>
            <br/>
            <input id='first-name' name='first-name' type="text" class='form-control' value="<?php echo $first_name; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='second-name' class='label label-primary form-control'>SECOND NAME</label>
            <br/>
            <br/>
            <input id='second-name' name='second-name' type="text" class='form-control' value="<?php echo $second_name; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='ship-address' class='label label-primary form-control'>Shipping Address</label>
            <br/>
            <br/>
            <input id='ship-address' name='ship-address' type="text" class='form-control' value="<?php echo $ship_address; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='ship-address-two' class='label label-primary form-control'>Shipping Address Two</label>
            <br/>
            <br/>
            <input id='ship-address-two' name='ship-address-two' type="text" class='form-control' value="<?php echo $ship_address_two ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='city' class='label label-primary form-control'>City</label>
            <br/>
            <br/>
            <input id='city' name='city' type="text" class='form-control' value="<?php echo $city; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='zip' class='label label-primary form-control'>Zip</label>
            <br/>
            <br/>
            <input id='zip' name='zip' type="text" class='form-control' value="<?php echo $zip; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='phone' class='label label-primary form-control'>Phone Number</label>
            <br/>
            <br/>
            <input id='phone' name='phone' type="text" class='form-control' value="<?php echo $phone; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <label for='email' class='label label-primary form-control'>Email Address</label>
            <br/>
            <br/>
            <input id='email' name='email' type="text" class='form-control' value="<?php echo $email; ?>">
        </div>
        <div class='form-group col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
            <input type='submit' value='Step Three' class='bnt btn-primary form-control'/>
        </div>
        <br/>
        <div class='clearfix'></div>
        <h1>
            <small>
                Information for the product you that you have been just selected.
            </small>
        </h1>
        <table class='table table-bordered'>
            <thead>
            <th>Quantity</th>
            <th>Image</th>
            <th>Item Name</th>
            <th>Price Each</th>
            <th>Price Extended</th>
            <td></td>
            </thead>
            <?php
            $sessid = session_id();

            $query = "SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
            $results = $db->select($query);
            $total = 0;
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $product = "SELECT * FROM " . $table . " WHERE item_id = '$carttemp_prod_id'";
                $product_two = $db->select($product);
                $product_three = $product_two->fetch(PDO::FETCH_ASSOC);
                extract($product_three);
                echo "<tr>";
                echo "<td>";
                echo $carttemp_quan;
                echo "</td>";
                echo "<td>";
                echo "<img height=\"80\" width=\"60\" src=\"uploads/" . $item_url . "\"/>";
                echo "</td>";
                echo "<td>";
                echo "<span>";
                echo $item_caption;
                echo "</span>";
                echo "</td>";
                echo "<td>";
                echo number_format($item_price, 2);
                echo "</td>";
                echo "<td>";
                // get extended price
                $extprice = number_format($item_price * $carttemp_quan, 2);
                echo $extprice;
                echo "</td>";
                echo "<td>";
                echo "<a href='cart.php?item_id=$id&tbl_name=$table'>";
                echo "Make Changes to Cart";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='4' align='right'>";
                echo "Your price before shiping";
                echo "</td>";
                echo "<td colspan='2'>";
                echo number_format($total = $extprice + $total, 2);
                echo "</td>";
            }
            ?>
            </tr>
        </table>
        <input type="hidden" name="total" value="<?php echo $total; ?>"/>
        <input type="submit" value="Send Order" class="btn btn-danger"/>
    </form>
    <br/>
    <br/>
</div>
<?php
require_once './templates/footer.php';

