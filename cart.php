<?php
ob_start();
session_start();
require_once './classes/DB.php';

$db = new DB();
$db->connect('localhost', 'root', '', 'store');
require_once './templates/head.php';
$table = '';
$id = '';

if (isset($_REQUEST['tbl_name'])) {
    $table = $_REQUEST['tbl_name'];
}

if (isset($_REQUEST['item_id'])) {
    $id = $_REQUEST['item_id'];
}
?>
<div class="container-fluid window">
    <h2>
        <small>
            You currently have

            <?php
            $sessid = session_id();
// display number of items in cart
            $sql = "SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
            $results = $db->select($sql);
            $rows = $results->rowCount();
            echo $rows;
            ?>
            item (s) in your cart.
        </small>
    </h2>
    <?php if ($rows > 0): ?>
        <table class="table table-bordered">
            <tr>
                <th>Quantity</th>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Price Each</th>
                <th>Extended Price</th>
                <th>Change Quantity</th>
                <th>Delete Item</th>
            </tr>
            <?php
            $total = 0;
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $sql = "SELECT * FROM " . $table .
                        " WHERE item_id =" . $carttemp_prod_id;
                $p_results = $db->select($sql);
                $p_results_arr = $p_results->fetch(PDO::FETCH_ASSOC);
                extract($p_results_arr);

                echo "<td>";
                echo "<form method='post' action=\"modcart.php?action=change&tbl_name=$table&item_id=$id\">"
                . "<input type='hidden' name='modified_hidden' value='$carttemp_hidden'/>"
                . "<input type='text' name='modified_quan' value='$carttemp_quan' size='2' class='form-control-fixed'/>";
                echo "</td>";
                echo "<td>";
                echo "<a href='getprod.php?prodid='" . $item_id . ">";
                echo "<img height='80' width='60' src='uploads/" . $item_url . "' class='img-responsive'/>";
                echo '</a>';
                echo "</td>";
                echo "<td>";
                echo "<span>";
                echo $item_caption;
                echo "</span>";
                echo "</td>";
                echo "<td>";
                echo number_format($item_price, 2);
                echo "</td>";
                echo "<td align='right'>";
                // get extended price
                $extprice = number_format($item_price * $carttemp_quan, 2);
                echo $extprice;
                echo "</td>";
                echo "<td>";                                   
                echo "<input type='submit' name='submit' value='Change Quantity' class='btn btn-default'>";
                echo "</form>";
                echo "</td>";

                echo "<td>";
                echo "<form method='post' action='modcart.php?action=delete'>";
                echo "<input type='hidden' name='modified_hidden' value='$carttemp_hidden'>";
                echo "<input type='submit' name='submit' value='Delete Item' class='btn btn-default'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                // add extended price to total
                $total = $extprice + $total;
            }
            ?>
            <tr>
                <td colspan="4" align="right">
                    Your total before shipping is:
                </td>
                <td align="right">
                    <?php echo number_format($total, 2); ?>
                </td>
                <td>
                    <?php
                    echo "<form method='post' action='modcart.php?action=empty'>";
                    echo "<input type='hidden' name='carttemp_hidden' value='$carttemp_hidden'/>";

                    echo "<input type='submit' name='submit' value='Empty Cart' class='btn btn-default'/>";
                    echo "<form>";
                    ?>
                </td>
            </tr>
        </table>
        <span>&nbsp;|&nbsp;</span>
        <a href="checkout.php?item_id=<?php echo $item_id; ?>&tbl_name=<?php echo $table ?>">Process to Checkout</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="index.php">Go Back to Main Page</a>
        <span>&nbsp;|&nbsp;</span>
    <?php endif; ?>
    <br/>
    <br/>
    <br/>
</div>
<?php
require_once './templates/footer.php';

