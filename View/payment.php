<?php

    // require_once("../Settings/core.php");
    require("../Controllers/customer_controller.php");

    session_start();

    $customer = getCurrentCustomer($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

    <style>
        
body{
    background: #000070;
  }
  
  form{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: rgba(0,0,0,.1);
    padding: 100px;
  }
  
  label{
   font-family: sans-serif;
    letter-spacing: 6px;
    text-transform: uppercase;
    font-size: .8em;
    color: #FFF;
  }
  
  input[type=text]{
    display: inline-block;
    border: none;
    text-align: left;
    box-shadow: 3px 2px rgba(121, 83, 210,.3 );
    padding: 10px;
    width: 350px;
    margin: 10px 0;
    background: transparent;
    color: #FFF;
  }
  
  input[type=text]:focus{
    background: none;
    border: none;
    color: #FFF;
  }
  
  button{
    background: transparent;
    color: #FFF;
    font-family: sans-serif;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin: 20px 0;
    padding: 10px 30px;
    border: 2px solid #FFF;
  }
  
 .button:hover{
    background: transparent;
    border: 2px solid rgba(69, 39, 160, .4);
  }


    </style>
</head>
<body>
 
<form id="paymentForm">
  <label> Email: </label> <br>
  <input type="email" id="email-address" value="<?php echo $customer['customer_email'] ?>" required /> </br>
  <br>
  <label> Currency Applied: </label> <br>
  <input type="text" id="currency" value="GHS"  readonly /></br>
  <br>
  <label> Amount: </label> </br>
  <input type="tel" id="amount" value ="<?php echo $_GET['total']?>" readonly />
  <br>
  <br>
  <label> Reference: </label> </br>
  <input type="text" id="ref" required />
<br>
  <input type="hidden" id="orderid" value = "<?php echo $orderdetails['order_id']; ?>"  />
<br/>


<button type="submit" onclick="payWithPaystack()"> Pay </button>
</form>



<script src="https://js.paystack.co/v1/inline.js"></script> 



<script> 
            var paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener('submit', payWithPaystack, false);
            function payWithPaystack(e) {
                let email = document.getElementById('email-address').value
                let amount = document.getElementById('amount').value
                let curr = document.getElementById('currency').value
                let orderid = document.getElementById('orderid').value



                e.preventDefault()
                var handler = PaystackPop.setup({
                    key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
                    email: document.getElementById('email-address').value,
                    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                    currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
                    ref: document.getElementById('ref').value, // Replace with a reference you generated
                    callback: function(response) {
                    //this happens after the payment is completed successfully
                    var reference = response.reference;
                    alert('Payment complete! Reference: ' + reference);
                    // Make an AJAX call to your server with the reference to verify the transaction
                    window.location = `../actions/process_payment.php?ref=${reference}&email=${email}&amount=${amount}&curr=${curr}&oid=${orderid}`
                    },
                    onClose: function() {
                    alert('Transaction was not completed, window closed.');
                    },
                });
            handler.openIframe();
            }
</script>


</body>
</html>