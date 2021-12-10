<?php

require_once('../Settings/db_class.php');

class cart extends db_connection{

    function addToCart($product_id,$qty,$cid,$ip){
        $query = "insert into cart (`p_id`, `ip_add`, `c_id`, `qty`) values('$product_id','$ip', '$cid', 1);" ;
        return $this->db_query($query);

    }

    function viewCurrent_cart($cid) {
        $query = "SELECT * FROM cart WHERE `c_id`='$cid'";
        return $this->fetch($query);
    }

    function insertOrder($ipadd,$invoice_num,$qty,$product_id,$amt){
        $query = "insert into orders (customer_id,product_id,invoice_no,qty,amt) values('$ipadd','$product_id','$invoice_num','$qty',$amt);" ;
        return $this->db_query($query);

    }

    function displayOrder($ip){
        // join cart and product and retrieve records from join
        $query = "select * from orders where customer_id = '$ip';" ;
        return $this->fetch($query);
    }

    function processPayment($ipadd, $amount, $currency,$orderid){
		// return true or false
		return $this->db_query("insert into payment(amt, customer_id, currency, order_id) values('$amount', '$ipadd','$currency', '$orderid' );");
	}

    function removeAllCart($ip){
        $query = "DELETE * FROM cart WHERE ip_add = '$ip'; " ;
        return $this->db_query($query);
    }

    function removecart_item($id) {
        $query = "DELETE FROM `cart` WHERE `cart`.`id` = '$id' " ;
        return $this->db_query($query);
    }

    function viewAllCart(){
        // join cart and product and retrieve records from join
        $query = "select products.*, cart.qty from products INNER JOIN cart on cart.p_id = product_id;" ;
        return $this->fetch($query);
    }

    function viewOneCart($product_id){
        $query = "select * from cart where p_id = '$product_id';";
        return $this->fetch($query);

    }

    public function cartValue($cid){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`='$cid'";

        return $this->db_query($sql);
    }

    //not logged in customers
    public function cartValueNull($ipadd){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->db_query($sql);
    }

    public function displayCartIPAdd($ip){
        $sql="SELECT *
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ip'";

        return $this->fetch($sql);
    }


    public function updateCart($cid, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function updateCartNull($ipadd, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }




}



?>