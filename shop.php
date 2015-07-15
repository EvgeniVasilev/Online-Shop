<?php
require_once 'templates/head.php';
require_once 'classes/DB.php';

$db = new DB();
$db->connect("", "", "", "");
?>
    <div class=" container-fluid window">
        <?php
        if (!isset($_GET['item_d']) and !isset($_GET['tbl_name']) or !(isset($_GET['quantity']))):
            ?>
            <h1 class="page-header">
                <small>Basket is empty</small>
            </h1>
        <?php endif; ?>
        <?php
        if (isset($_GET['item_id']) and isset($_GET['tbl_name']) and ctype_digit($_GET['item_id']) and ctype_alpha($_GET['tbl_name'])):
            ?>
            <div id="basket">
                <h1>
                    <small>Shopping basket</small>
                </h1>
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Item name</th>
                        <th>Item Quantity</th>
                        <th>Item Price</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        $id = $_GET['item_id'];
                        $table = $_GET['tbl_name'];
                        $sql = "SELECT * FROM " . $table . " WHERE item_id=" . $id;
                        $result = $db->select($sql);

                        foreach ($result as $row) {
                            echo "<td>";
                            echo $row['item_caption'];
                            echo "</td>";
                            echo "<td>";
                            echo $_GET['quantity'];
                            echo "</td>";
                            echo "<td>";
                            echo $row['item_price'];
                            echo "</td>";
                            echo "<td>";
                            echo "<a href=\"./shop.php\">";
                            echo "<i class=\"glyphicon glyphicon-trash\"></i>";
                            echo "</a>";
                            echo "</td>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total Price with VAT of 20%:
                            <?php
                            $quty = ($_GET['quantity'] * $row['item_price']) * 1.2 . " $";
                            echo "<br/>";
                            echo "<b>";
                            echo $quty;
                            echo "</b>";
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button id="process_shopping" class="btn btn-primary">Process Shopping</button>
                <br/>
                <br/>
                <br/>
            </div>
            <div class="row">
                <form method="" action="functions/redirect.php" id="shop_form" style="display: none" class="col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-1">
                    <div class="form-group">
                        <label class="label label-default">Full Name:</label>
                        <br/>
                        <br/>
                        <input type="text" class="form-control" required name="full_name"/>
                    </div>
                    <div class="form-group">
                        <label class="label label-default">E-mail:</label>
                        <br/>
                        <br/>
                        <input type="email" class="form-control" required name="email"/>
                    </div>
                    <div class="form-group">
                        <label class="label label-default">Telephone:</label>
                        <br/>
                        <br/>
                        <input type="" pattern="[0-9 /- //  ' ' '  ']*" class="form-control" required name="telephone"/>
                    </div>
                    <div class="form-group">
                        <label class="label label-default">Address (Country, City, Street, Zip):</label>
                        <br/>
                        <br/>
                        <textarea class="form-control" required  name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary form-control"/>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
<?php
require_once 'templates/footer.php';
