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
		<form method="post" action="payment.php">
			<label for="name">Name on Card:</label>
			<input type="text" id="name" name="name" required>

			<label for="card_number">Card Number:</label>
			<input type="text" id="card_number" name="card_number" required>

			<label for="expiry_date">Expiry Date:</label>
			<input type="text" id="expiry_date" name="expiry_date" placeholder="MM / YY" required>

			<label for="cvv">CVV:</label>
			<input type="text" id="cvv" name="cvv" required>

			<button type="submit">Pay Now</button>
            </div>
		</form>
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
include '../footer.php';
?>