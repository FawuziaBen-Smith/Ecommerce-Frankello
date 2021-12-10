<?php
    //database credentials
    require_once('../Settings/db_class.php');

    class Customer_class extends db_connection {

        //Insert method
        public function insert_customer($name, $email, $password, $country, $city, $contact, $image, $role) {
            $sql = "INSERT INTO `customer` 
            (`customer_name`, `customer_email`, `user_role`, `customer_pass`,
            `customer_country`, `customer_city`, `customer_contact`, `customer_image`)
            VALUES ('$name','$email','$role','$password','$country','$city','$contact','$image')";            
            //execute query
            return $this->db_query($sql);
        }

        public function customer_select($email)  {

            //formulate select query
            $sql = "SELECT * FROM customer WHERE (customer_email = '$email')";
            //$result = $this->db_fetch($sql);

            //execute query
            return $this->db_query($sql);
        }

        public function get_user($email) {
            $sql = "SELECT * FROM customer WHERE (customer_email = '$email')";
            return $this->fetchOne($sql);
        }

        public function CustomerLogin($email){
            //sql query
            $sql = "SELECT `customer_id`, `user_role`, `customer_email`, `customer_pass` FROM `customer` WHERE `customer_email` = '$email'";
    
            //run the sql query
            return $this->db_query($sql);
        }

        public function ExistingCustomer($email){
            //sql query
            $sql = "SELECT `customer_email` FROM `customer` WHERE `customer_email` = '$email'";
    
            //return the executed query
            return $this->db_query($sql);
        }

        public function login_customer($email, $pass) {
            $sql = "SELECT * FROM `customer` WHERE `customer_email` = '$email' and `customer_pass`='$pass'";
            return $this->fetchOne($sql);
        }

    }
?>