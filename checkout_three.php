<?php
ob_start();
session_start();
require_once './templates/head.php';
require_once './classes/DB.php';

$db = new DB();
$db->connect('localhost', 'root', '', 'store');

$customer_id = null;
$customers_number = null;
$message = null;
$order_id = null;
?>
<div class="container-fluid window">
    <?php
    if (isset($_REQUEST['item_id']) and ctype_digit($_REQUEST['item_id'])) {
        $id = $_REQUEST['item_id'];
    }

    if (isset($_REQUEST['tbl_name']) and ctype_alpha($_REQUEST['tbl_name'])) {
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

    if (isset($_REQUEST['ship-address-two']) and ctype_alnum($_REQUEST['ship-address-two'])) {
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

    if (isset($_REQUEST['phone']) and ctype_digit($_REQUEST['phone'])) {
        $phone = $_REQUEST['phone'];
    }
    $total = $_POST['total'];
    $session_id = session_id();
    $today = date('Y-m-d');

    // assign customers number to new customer,
    // or find existing one

    $sql = "SELECT * FROM customers WHERE ("
            . "customers_firstname = '$first_name' AND "
            . "customers_lastname = '$second_name' AND "
            . "customers_add1 = '$ship_address' AND "
            . "customers_add2 = '$ship_address_two' AND "
            . "customers_city = '$city')";
    $res = $db->select($sql);
    $rows = $res->fetchAll();
    $num_rows = count($rows);

    if ($num_rows < 1) {
        // assign neu customer
        $sql_new = "INSERT INTO customers ("
                . "customers_firstname, customers_lastname,"
                . "customers_add1, customers_add2,"
                . "customers_city, customers_zip,"
                . "customers_phone, customers_email) "
                . "Values (
        '$first_name', '$second_name', '$ship_address',
         '$ship_address_two', '$city', '$zip', '$phone', '$email'
        )";
        $new_custm_res = $db->insert($sql_new);
        $customer_id = $db->insert_id();
        echo $customer_id;
    }

    // if $customer_id exists, make it equal to
    // customer number
    if ($customer_id) {
        $customers_number = $customer_id;
    }

    // populate order main table with orders
    $shipping = $total * 1.2;

    $sql_order_main = "INSERT INTO ordermain ("
            . "ordermain_orderdate, ordermain_cusum,"
            . "ordermain_subtotal,"
            . "ordermain_shipadd1, ordermain_shipadd2,"
            . "ordermain_shipcity, ordermain_shipzip,"
            . "ordermain_shipphone, ordermain_shipemail"
            . ")"
            . "Values"
            . "("
            . "'$today', '$customers_number',"
            . "'$total','$ship_address', '$ship_address_two',"
            . "'$city', '$zip', '$phone', '$email'"
            . ")";

    $sql_order_main_res = $db->insert($sql_order_main);
    $order_id = $db->insert_id();

    // insert into orderdet
    $sql_order_det = "SELECT * FROM carttemp WHERE carttemp_sess = '$session_id'";
    $result_order_det = $db->select($sql_order_det);
    // put it to orderdet table
    while ($row = $result_order_det->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $sql_insert_order_det = "INSERT INTO orderdet (orderdet_ordernum, orderdet_qty, orderdet_prodnum) "
                . "Values('$order_id', '$carttemp_quan', '$carttemp_prod_id')";

        $db->insert($sql_insert_order_det);
    }

    // delete from temporary table
    $sql_delete_temp = "DELETE FROM carttemp WHERE carttemp_sess = '$session_id'";
    $sql_delete_res = $db->delete($sql_delete_temp);


    // populate message
    $query = "SELECT * FROM orderdet WHERE orderdet_ordernum = '$order_id'";
    $result = $db->select($query);

    $row = $result->fetch(PDO::FETCH_ASSOC);
    if($row){
       extract($row);
    }

    $prod = "SELECT * FROM " . $table . " WHERE item_id = '$id'";
    $product_sub = $db->select($prod);
    $prod_main = $product_sub->fetch(PDO::FETCH_ASSOC);
    extract($prod_main);

    $extprice = number_format($item_price * $orderdet_qty, 2);
    $formatted_item_price = number_format($item_price, 2);
    $total = number_format($total, 2);
    $final_total = number_format(($total + 4.5), 2);

    // email confirmation to site admin
    // and to the customer
    // recipients
    $to = "< " . $email . ">";

    // subject
    $subject = "Order Confirmation";

    // message
    $message .= <<< MES
<html>
<head>
<title>$subject</title>
</head>
<body>
<b><u>Here is recap of your order:</u></b>
<br/>
<br/>
Order date:
$today
<br/>
<br/>
Order Number:
$order_id
<br/>
<br/>
<table width="40%">
            <tr>
                <td>
                    <p>Bill to: <br/>
                        $first_name &nbsp;&nbsp; $second_name
                    </p>
                </td>
                <td><p>Shipping Address Primary: <br/>
                        $ship_address</p>
                </td>
                <td></td>

            </tr>
            <tr>
                <td></td>
            <td><p>
                    Second Shipping Address: <br/>
                    $ship_address_two</p>
            </td>
            </tr>
            <tr>
                <td></td>
            <td>
                <p>
                    City: $city, &nbsp;Zip: $zip
                </p>
            </td>
        </tr>
    </table>
<hr width="255" align="left"/>
<table  cellpadding="5">
<!--grab the content of the order and insert them into the message field-->
            <tr>
                <td width="33%">
                $orderdet_qty
                $item_caption &nbsp; &nbsp;
                </td>
                <td width="33%" align="right">
                $formatted_item_price
                </td>
                <td width="33%" align="right">
                $extprice
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right" width="33%">
                Your Total Before Shipping:
                $total
                </td>
            </tr>
             <tr>
                <td colspan="3" align="right" width="33%">
                Shipping Cost: 4.5
                </td>
            </tr>
              <tr>
                <td colspan="3" align="right" width="33%">
                Your Final Total is:
                $final_total
                </td>
            </tr>

</table>
</body>
</html>
MES;

    // headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html; charset=utf-8";
    $headers .= "From: <evgeni.vasilev1209@gmail.com>";
    $headers .= "X-Mailer:PHP  /". phpversion();

    if($row){
      $mail = mail($to,$subject,$message, $headers);  
      echo $message;
    } else {
        header('Location: ./index.php');
    }    

    if ($mail) {
        unset($_SESSION['tbl_name']);
        unset($_SESSION['item_id']);
    }
    ?>
</div>
<?php
require_once './templates/footer.php';
