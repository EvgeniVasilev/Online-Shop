<?php
ob_start();
session_start();
require_once './templates/head.php';
if (isset($_REQUEST['item_id'])) {
    $id = $_REQUEST['item_id'];
}

if (isset($_REQUEST['tbl_name'])) {
    $table = $_REQUEST['tbl_name'];
}
?>
<div class="container-fluid window">
    <form method='post' action="checkout_two.php?item_id=<?php echo $id; ?>&tbl_name=<?php echo $table; ?>" class='col-lg-6 col-md-6 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-2'>
        <input type="hidden" value="<?php echo $id; ?>" name="item_id"/>
        <input type="hidden" value="<?php echo $table; ?>" name="tbl_name"/>
        <div class='form-group'>
            <label for='first-name' class='label label-primary form-control'>FIRST NAME</label>
            <br/>
            <br/>
            <input id='first-name' name='first-name' type="text" class='form-control' value="Evgeni" required="">
        </div>
        <div class='form-group'>
            <label for='second-name' class='label label-primary form-control'>SECOND NAME</label>
            <br/>
            <br/>
            <input id='second-name' name='second-name' type="text" class='form-control' value="Vasilev" required="">
        </div>
        <div class='form-group'>
            <label for='ship-address' class='label label-primary form-control'>Shipping Address</label>
            <br/>
            <br/>
            <input id='ship-address' name='ship-address' type="text" class='form-control' value="Bulgaria, Sofia" required="">
        </div>
        <div class='form-group'>
            <label for='ship-address-two' class='label label-primary form-control'>Shipping Address Two</label>
            <br/>
            <br/>
            <input id='ship-address-two' name='ship-address-two' type="text" class='form-control' value="Bulgaria, Sofia" required="">
        </div>
        <div class='form-group'>
            <label for='city' class='label label-primary form-control'>City</label>
            <br/>
            <br/>
            <input id='city' name='city' type="text" class='form-control' value="Sofia" required="">
        </div>
        <div class='form-group'>
            <label for='zip' class='label label-primary form-control'>Zip</label>
            <br/>
            <br/>
            <input id='zip' name='zip' type="text" class='form-control' value="45678" required="">
        </div>
        <div class='form-group'>
            <label for='phone' class='label label-primary form-control'>Phone Number</label>
            <br/>
            <br/>
            <input id='phone' name='phone' type="text" class='form-control' value="789887790" required="" placeholder="0998556677">
        </div>
        <div class='form-group'>
            <label for='email' class='label label-primary form-control'>Email Address</label>
            <br/>
            <br/>
            <input id='email' name='email' type="text" class='form-control' value="evgeni.vasilev0912@gmail.com" required="">
        </div>
        <div class='form-group'>
            <input type='submit' value='Step Two' class='bnt btn-primary form-control'/>
        </div>
    </form>
</div>
<?php
require_once './templates/footer.php';

