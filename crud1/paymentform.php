<?php
include '../header.php';
?>
<html>
<head>
	<title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<style>
		.container {
    margin: 0 auto;
    width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"], button {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    background-color: #4CAF50;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

	</style>
	<div class="container">
		<h1>Payment Page</h1>
		<form action="process_payment.php" method="post">
		<label for="amount">Amount:</label>
		<input type="number" id="amount" name="amount" step="0.01€" min="0" required><br>

		<label for="payment_method">Payment Method:</label>
		<select id="payment_method" name="payment_method" required>
			<option value="paypal">PayPal</option>
			<option value="stripe">Credit/Debit Card</option>
			
		</select><br>

		<div id="paypal_fields" class="payment_fields">
			<label for="paypal_email">PayPal Email:</label>
			<input type="email" id="paypal_email" name="paypal_email" required><br>
		</div>

		<div id="stripe_fields" class="payment_fields">
			<label for="card_number">Card Number:</label>
			<input type="text" id="card_number" name="card_number" pattern="\d{16}" required><br>

			<label for="exp_date">Expiration Date:</label>
			<input type="text" id="exp_date" name="exp_date" pattern="(0[1-9]|1[0-2])/[0-9]{2}" placeholder="MM/YY" required><br>

			<label for="cvv">CVV:</label>
			<input type="text" id="cvv" name="cvv" pattern="\d{3}" required><br>
		</div>

		

		<button type="submit">Pay Now</button>
	</form>

	<script src="script.js"></script>
</div>
		<?php
// Implement payment gateway API here

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get form data
	$name = $_POST['name'];
	$card_number = $_POST['card_number'];
	$expiry_date = $_POST['expiry_date'];
	$cvv = $_POST['cvv'];

	// Validate form data
	$errors = array();

	if(empty($name)) {
		$errors[] = 'Name on Card is required';
	}

	if(empty($card_number)) {
		$errors[] = 'Card Number is required';
	}

	if(empty($expiry_date)) {
		$errors[] = 'Expiry Date is required';
	}

	if(empty($cvv)) {
		$errors[] = 'CVV is required';
	}

	if(count($errors) > 0) {
		// Display errors
		foreach($errors as $error) {
			echo $error . '<br>';
		}
	} else {
		// Process payment and show success message
		echo 'Payment successful';
	}
}
?>



<?php

if(isset($_POST["submit"])){
    $Price = $_POST["Price"];
    $Date_Order = $_POST["Date_Order"];
    $Order_ID = $_POST["Order_ID"];
    $Costumer_ID = $_POST["Costumer_ID"];
    $Payment_Method = $_POST["Payment_Method"];
    $Total_Amount = $_POST["Total_Amount"];
    include "db.php";
    $sql = "insert into payment(Price,Date_Order,Order_ID,Costumer_ID,Payment_Method,Total_Amount)
    
    values('$Price','$Date_Order','$Order_ID','$Costumer_ID',' $Payment_Method',' $Total_Amount')" ;

    if($connection->query($sql)===TRUE){
        echo "your information is added successfully";
    }
    else{
        echo "Error:" .$connection->error;

        
    }
}


?>









<?php
include '../footer.php';
?>