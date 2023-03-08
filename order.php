<?php include "./header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
</head>
<body style="font-family: Sansita; font-weight: 500;">
  <div style="border: 3px solid white; padding: 30px; width: 40%; display: block; margin: 0 auto;">
	<h1 style="color: white; text-align: center;">Order Confirmation</h1>
	<form action="order_confirmation.php" method="post" style="text-align: center;">
		<label for="customer_name" style="color: white;"></label>
		<input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" required><br><br>
    <label for="customer_phone" style="color: white;"></label>
		<input type="tel" name="customer_phone" id="customer_phone" placeholder="Customer Phone" required><br><br>
		<label for="customer_address" style="color: white;"></label>
    <textarea name="customer_address" id="customer_address" rows="5" cols="50" placeholder="Customer Address" required></textarea><br><br>
<table style="border-collapse: collapse; width: 75%; margin: 0 auto;">
  <thead>
    <tr>
      <th style="border: 2px solid white; color: white; font-weight: 500; padding: 8px; background-color: firebrick;">Product Name</th>
      <th style="border: 2px solid white; color: white; font-weight: 500; padding: 8px; background-color: firebrick;">Price</th>
      <th style="border: 2px solid white; color: white; font-weight: 500; padding: 8px; background-color: firebrick;">Quantity</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include 'db_connection.php';

    // Get information from the previous page
    $product_ids = isset($_POST['product_id']) ? $_POST['product_id'] : array();
    $product_names = isset($_POST['product_name']) ? $_POST['product_name'] : array();
    $product_prices = isset($_POST['product_price']) ? $_POST['product_price'] : array();
    $quantities = isset($_POST['quantity']) ? $_POST['quantity'] : array();

    // Display the order form
    for ($i = 0; $i < count($product_ids); $i++) {
      if (isset($quantities[$i]) && $quantities[$i] > 0 && isset($product_names[$i]) && isset($product_prices[$i]) && isset($product_ids[$i])) {
        echo "<tr>";
        echo "<td style='border: 2px solid white; padding: 8px; color:white; text-align: center;'>" . $product_names[$i] . "</td>";
        echo "<td style='border: 2px solid white; padding: 8px; color:white; text-align: center;'>€" . $product_prices[$i] . "</td>";
        echo "<td style='border: 2px solid white; padding: 8px; color:white; text-align: center;'>" . $quantities[$i] . "</td>";
        echo "<input type='hidden' name='product_id[]' value='" . $product_ids[$i] . "'>";
        echo "<input type='hidden' name='product_name[]' value='" . $product_names[$i] . "'>";
        echo "<input type='hidden' name='product_price[]' value='" . $product_prices[$i] . "'>";
        echo "<input type='hidden' name='quantity[]' value='" . $quantities[$i] . "'>";
        echo "</tr>";

        // Insert information into the table
        $sql = "INSERT INTO orders (product_id, product_name, product_price, quantity) VALUES ('" . $product_ids[$i] . "', '" . $product_names[$i] . "', '" . $product_prices[$i] . "', '" . $quantities[$i] . "')";
        if ($conn->query($sql) === TRUE) {
          // information is inserted successfully
        } else {
          echo "Error: " . $sql . "<br>" . $conn->connect_error;
        }
      }
    }
    // Close the database connection
    $conn->close();
?>
 </tbody>
	</table>
	<br>
	<input type="submit" value="Confirm Order" onclick="myFunction()"
               style="background-color: firebrick; color: white; border-radius: 10px; font-family: Sansita; font-size: 20px; font-weight: 500; padding: 5px 5px 10px 5px;"
               onmouseover="this.style.color='firebrick';
                            this.style.backgroundColor='white';
                            this.style.fontSize='1.5em';" 
               onmouseout="this.style.color='white';
                           this.style.backgroundColor='firebrick';
                           this.style.fontSize='1.5em';">
  </form>
  <script>
    function myFunction() {
    var txt;
    if (confirm("Do you confirm the order?")) {
      txt = "You pressed Button!";
    } else {
      txt = "You pressed Cancel Button!";
    }
    document.getElementById("confirmation-box").innerHTML = txt;
    }
  </script>
  </div>
</body>
</html>
<?php include "./footer.php" ?>