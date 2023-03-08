<?php include "./header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Confirmation</title>
</head>
<body style="font-family: Sansita; font-weight: 500;">
<div style="border: 3px solid white; padding: 30px; width: 50%; display: block; margin: 0 auto;">
	<h1 style="color: white; text-align: center;">Payment Confirmation</h1>
	<?php
		include 'db_connection.php';

		// Get customer information from the previous page
		$customer_name = $_POST['customer_name'];
		$customer_phone = $_POST['customer_phone'];
		$customer_address = $_POST['customer_address'];

    // Insert customer information into the database
    $sql = "INSERT INTO customers (name, phone, address) VALUES ('$customer_name', '$customer_phone', '$customer_address')";
    if ($conn->query($sql) === TRUE) {
	  echo "<b></b>";
    } else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
    }

		// Get information from the previous page
		$product_ids = isset($_POST['product_id']) ? $_POST['product_id'] : array();
    $product_names = isset($_POST['product_name']) ? $_POST['product_name'] : array();
    $product_prices = isset($_POST['product_price']) ? $_POST['product_price'] : array();
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : array();

		// Calculate the total price
    $total_price = 0;
      for ($i = 1; $i < count($product_ids); $i++) {
        if ($quantities[$i] > 0) {
        $total_price += $product_prices[$i] * $quantities[$i];
        $sql = "INSERT INTO orders (product_id, product_name, product_price, quantity, customer_phone) VALUES ('$product_ids[$i]', '$product_names[$i]', '$product_prices[$i]', '$quantities[$i]', '$customer_phone')";
        if ($conn->query($sql) === TRUE) {
        // information is inserted successfully
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  }

		// order confirmation
		echo "<p style='color: white; text-align: center; font-size: 25px;'><b>Thank you, " . $customer_name . ", for your order!</b></p>";
		echo "<p style='color: white; text-align: center; font-size: 20px;'><b>Your order details</b></p>";
    echo "<table style='border-collapse: collapse; width: 80%; margin: 0 auto; text-align: center;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='color: white; border: 2px solid white; padding: 5px; background-color: firebrick;'>Product Name</th>";
    echo "<th style='color: white; border: 2px solid white; padding: 5px; background-color: firebrick;'>Price</th>";
    echo "<th style='color: white; border: 2px solid white; padding: 5px; background-color: firebrick;'>Quantity</th>";
    echo "<th style='color: white ; border: 2px solid white; padding: 5px; background-color: firebrick;'>Subtotal</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for ($i = 1; $i < count($product_ids); $i++) {
        if ($quantities[$i] > 0) {
            $sub_total = $product_prices[$i] * $quantities[$i];
            echo "<tr>";
            echo "<td style='color: white; border: 2px solid white; padding: 5px;'>" . $product_names[$i] . "</td>";
            echo "<td style='color: white; border: 2px solid white; padding: 5px;'>€" . $product_prices[$i] . "</td>";
            echo "<td style='color: white; border: 2px solid white; padding: 5px;'>" . $quantities[$i] . "</td>";
            echo "<td style='color: white; border: 2px solid white; padding: 5px;'>€" . number_format($sub_total, 2) . "</td>";
            echo "</tr>";
        }
    }
    echo "<tr>";
    echo "<td style='color: white; border: 2px solid white; padding: 5px;' colspan='3'><strong>Total Price:</strong></td>";
    echo "<td style='color: white; border: 2px solid white; padding: 5px;'>€" . number_format($total_price, 2) . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table> <br><br>"; 
		if ($total_price > 20) {
			echo "<h1 style='color: white; text-align: center;'>Congratulations! You have earned a free coffee as a reward for spending over €20!</h1>";
		}
    // payment link
    echo "<p style='color: white; text-align: center; font-size: 20px;'>Please click the following button to make the payment:</p>";
    echo "<a style='text-decoration:none;' href='https://www.nordea.fi/en/personal/our-services/online-mobile-services/netbank.html' target='_blank'>
          <input type='submit' value='Click Here to Pay' style=' border-radius: 10px; margin: 0 auto; display: grid; padding: 10px 10px 15px 10px; color: white; font-size: 1.5rem; font-weight: 500; background-color: firebrick; font-family: Sansita;'></a><br><br>"; 
    
    echo "<p style='color: white; text-align: center; font-size: 20px;'><b>Your order will be sent to the following address:</b></p>";
    echo "<div style='background-color: firebrick; padding: 20px; text-align: center; width: 60%; display: block; margin: 0 auto; line-height: 2.0; margin-bottom: 0px; border-radius: 25px;'>";
    echo "<b style='font-family: Sansita; font-weight: 500; color: white; text-align: center; font-size: 20px;'>Name: " . $customer_name . "<br>";
		echo "<b style='color: font-family: Sansita; font-weight: 500; white; text-align: center; font-size: 20px;'>Phone: " . $customer_phone . "</b><br>";
		echo "<b style='color: font-family: Sansita; font-weight: 500; white; text-align: center; font-size: 20px;'>Address: " . $customer_address . "</b>";		
    echo "</div>";
?>
<script type="text/javascript">  
 alert("Your information has been recorded successfully");  
</script>
</div>
</body>
</html>
<?php include "./footer.php" ?>