<?php 
    //Classes
    require_once('../Classes/customer_class.php');

    function customeradd($name, $email, $password, $country, $city, $contact, $image, $role) {
        $customer_instance = new customer_class();
        return $customer_instance->insert_customer($name, $email, $password, $country, $city, $contact, $image, 2);
    } 
    
    function selectcustomer($email, $password){
        $customer_instance = new customer_class();
        return $customer_instance->select_customer($email, $password);
    }

    function checkforcustomer($email){
        $customer_instance = new customer_class();
        return $customer_instance->checkexistingcustomer($email);
    }


    function getCurrentCustomer($email){
        $customer_instance = new customer_class();
        return $customer_instance->get_user($email);
    }

    function login_controller($email, $pass){
        $customer_instance = new customer_class();
        return $customer_instance->login_customer($email, $pass);
    }


?>