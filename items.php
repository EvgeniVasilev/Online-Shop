<?php
ob_start();
session_start();
require_once 'templates/head.php';
require_once 'classes/DB.php';

$db = new DB();
$db->connect("localhost", "root", "", "store");
?>
<div class="container-fluid window">
    <div class="row">
        <?php
        $table = $_REQUEST["tbl_name"];
        $id = $_REQUEST["item_id"];

        $sql = "SELECT * FROM  $table Where item_id=$id";
        $result = $db->select($sql);
        foreach ($result as $row) {
            ?>
            <div class="col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-3">
                <div class="panel-item">
                    <?php echo $row['item_caption']; ?>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <br/>
                    <?php echo "<img class='img-responsive' src='uploads/" . $row['item_url'] . "'/>"; ?>
                </div>

                <div class="col-lg-6">
                    <h1>
                        <small>
                            <b>
                                Item Description:
                            </b>
                        </small>
                    </h1>
                    <p>
                        <b>
                            <?php echo $row['item_description']; ?>
                        </b>
                    </p>

                    <p>
                        <b>Item price: </b>
                        <?php echo $row['item_price']; ?> $
                    </p>

                    <p>
                        <b>Price is with no VAT included: </b>
                    </p>

                    <p>
                        <b>Limit for singe client s three items!</b>
                    </p>

                    <form method="post" action="./modcart.php?action=add&item_id=<?php echo $id;?>&tbl_name=<?php echo $table?>" class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                        <input type="hidden" name="tbl_name" value="<?php echo $table; ?>"/>
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>"/>
                        <div class="form-group">
                            <label class="label label-default">ITEM QUANTITY:</label>
                            <br/>
                            <br/>
                            <select  name="quantity" class="form-control-static">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add to Card" class="btn btn-primary form-control"/>
                        </div>
                    </form>

                    <form method="post" action="cart.php" class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <input type="hidden" name="tbl_name" value="<?php echo $table; ?>"/>
                            <input type="hidden" name="item_id" value="<?php echo $id; ?>"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="View Card" class="btn btn-primary form-control"/>
                        </div>
                        <div class="form-group">
                            <a href="./index.php">Back to Main Page</a>
                        </div>
                    </form>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
<br/>
<br/>
<br/>
<?php
require_once 'templates/footer.php';
