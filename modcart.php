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

if (isset($_REQUEST['tbl_name']) and ctype_alpha($_REQUEST['tbl_name'])) {
    $table = $_REQUEST['tbl_name'];
}

if (isset($_POST['quantity']) and ctype_digit($_REQUEST['quantity'])) {
    $quantity = $_POST['quantity'];
}

if (isset($_POST['item_id']) and ctype_digit($_REQUEST['item_id'])) {
    $prod_num = $_POST['item_id'];
};

if (isset($_POST['modified_hidden']) and ctype_alnum($_REQUEST['modified_hidden'])) {
    $modified_hidden = $_POST['modified_hidden'];
}

if (isset($_POST['modified_quan']) and ctype_digit($_REQUEST['modified_quan'])) {
    $modified_quan = $_POST['modified_quan'];
}

$sess = session_id();

$action = $_REQUEST['action'];
?>
<div class="container-fluid window">
    <?php
    switch ($action) {
        case 'add':
        $sql_crat = "SELECT * FROM carttemp WHERE carttemp_sess ='$sess'";
        $result_cart = $db->select($sql_crat);
        $rows_cart = $result_cart->rowCount();
        
        if($rows_cart == 1){
           header("Location:./cart_warn.php");
        } else {
             $query = "INSERT  INTO carttemp ("
                    . "carttemp_sess, carttemp_quan, carttemp_prod_id"
                    . ")"
                    . "Values("
                    . "'$sess', '$quantity', '$prod_num')";
            $db->insert($query);
        
          
        if (isset($_REQUEST['tbl_name'])) {
             $table = $_REQUEST['tbl_name'];
        }

        if (isset($_REQUEST['item_id'])) {
            $id = $_REQUEST['item_id'];
        }

        $_SESSION['tbl_name'] = $table;
        $_SESSION['item_id'] = $id;                 
           
        echo  $_SESSION['tbl_name'] = $table;
        echo $_SESSION['item_id'] = $id;             
            header("Location: ./cart.php?item_id=$id&tbl_name=$table");
        }
            break;
        case 'change':
            if (isset($_REQUEST['tbl_name'])) {
               $table = $_REQUEST['tbl_name'];
            }

            if (isset($_REQUEST['item_id'])) {
                $id = $_REQUEST['item_id'];
            }
            
            $query = "UPDATE carttemp"
                    . " SET carttemp_quan = '$modified_quan'"
                    . " WHERE carttemp_hidden = '$modified_hidden'";
            $db->update($query);            
            header("Location: ./cart.php?item_id=$id&tbl_name=$table");
            break;

        case 'delete':         
                            
            $query = "DELETE FROM carttemp "
                    . "WHERE carttemp_hidden='$modified_hidden'";
            $result = $db->delete($query);             
            
            unset($_SESSION['tbl_name']);
            unset($_SESSION['item_id']); 
            
            header('Location: ./cart.php');   
            
            session_unset();
            session_destroy(); 
            break;
        case 'empty':
            unset($_SESSION['tbl_name']);
            unset($_SESSION['item_id']);
            $query = "DELETE FROM carttemp  WHERE carttemp_sess='$sess'";
            $db->delete($query);
            
            header('Location: ./cart.php'); 
             
            session_unset();
            session_destroy();             
            break;
    }
    ?>
</div>
<?php
require_once './templates/footer.php';
