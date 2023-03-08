<?php include "./header.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<style>
		table, th, td {
			border: 1px solid white;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
		}
	</style>
</head>
<body>
	<h1 style="color: white;">Menu</h1>
	<table>
		<thead>
			<tr>
				<th style="color: white;">Product Name</th>
				<th style="color: white;">Price</th>
				<th style="color: white;">Category</th>
				<th style="color: white;">Order</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'db_connection.php';
                
                // Get information from database
				$sql = "SELECT p.id, p.name, p.price, c.name AS category FROM products p INNER JOIN categories c ON p.category_id = c.id";
				$result = $conn->query($sql);

                // Display information in a table
					if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        echo "<tr>";
				        echo "<td style='color:white;'>" . $row["name"] . "</td>";
				        echo "<td style='color:white;'>" . $row["price"] . "</td>";
				        echo "<td style='color:white;'>" . $row["category"] . "</td>";
				        echo '<td><form action="order.php" method="post">
							  <input type="hidden" name="product_id[]" value="' . $row["id"] . '">
							  <input type="hidden" name="product_name[]" value="' . $row["name"] . '">
							  <input type="hidden" name="product_price[]" value="' . $row["price"] . '">
							  <input type="number" name="quantity[]" value="0" min="0"><br><br></td>';
				        echo "</tr>";
				    }
				    echo '<tr><td colspan="4"><input type="submit" value="Order"></form></td></tr>';
				} else {
				    echo "No products found";
				}

				// Close the database connection
				$conn->close();
			?>
		</tbody>
	</table>
</body>
</html>

<?php include "./footer.php" ?>
