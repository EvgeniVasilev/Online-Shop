<?php
  ob_start();
  session_start();  
  require_once './templates/head.php';
?>
<div class="container-fluid window">
    <div class="alert-success rounded red">
    <p>
            It seems that you have selected a new  product but there is onother one in your Cart!<br/>
            In order to keep your orders ranged and clean, please do one of the following:
        </p>
        <p>
            1. Checkout your product and finish shopping.
        </p>
        <p>
         2. Delete selected product from cart and pick up another one.       
        </p>  
        <p>
            Thank you, for choosing Orenda Store!
        </p> 
    </div>    
</div>
<?php
    require_once './templates/footer.php';
?>