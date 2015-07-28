<?php
class Helper
{
    public function title() {
       global $title;
       
       if(strpos($_SERVER['PHP_SELF'], '/index.php') !== false){
            $title="Store Home";
       }
       if(strpos($_SERVER['PHP_SELF'], '/items.php') !== false){
            $title="Store Item Preview";
       }

       if(strpos($_SERVER['PHP_SELF'], '/cart.php') !== false){
            $title="Shop from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/shoes.php') !== false){
            $title="Shop Shoes from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/kids.php') !== false){
            $title="Shop for Kids from the Store";
       }
       
       if(strpos($_SERVER['PHP_SELF'], '/clothes.php') !== false){
            $title="Shop Clothes from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/juels.php') !== false){
            $title="Shop Jewellery from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/aboutus.php') !== false){
            $title="About Us";
       }

       if(strpos($_SERVER['PHP_SELF'], '/withdraw.php') !== false){
            $title="Withdrawing from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/payment.php') !== false){
            $title="Payment and Delivery  from the Store";
       }

       if(strpos($_SERVER['PHP_SELF'], '/contacts.php') !== false){
            $title="Contact Us";
       }
       
        if(strpos($_SERVER['PHP_SELF'], '/modcart.php') !== false){
            $title="Process Shopping";
       }

        return $title;
    }
}