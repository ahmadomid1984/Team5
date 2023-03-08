<h2 style="text-align: center; font-size: 40px; text-decoration: underline overline;">The Order List</h2>
<?php
$title = "Reading Data from the database";
include 'db_connection.php';

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result === false) {
  die("Error executing the query: " . $conn->connect_error);
}

if($result->num_rows > 0) {
  echo "
      <style>
        table, th, td {
          color: black;
          text-align: center;
          margin: 0 auto;
          border: 1px solid;
          border-collapse: collapse;
          padding: 10px;
        }
      </style>
      <table class='table'>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>phone</th>
          <th>address</th>
          <th>reg_date</th>
        </tr>";

  while($row = $result ->fetch_assoc()){
    // get orders for customer
    $orders_sql = "SELECT * FROM orders WHERE id = " . $row['id'];
    $orders_result = $conn->query($orders_sql);

    // order details
    $orders = "";
    if ($orders_result->num_rows > 0) {
      while($order_row = $orders_result->fetch_assoc()){
        $orders .= $order_row['product_name'] . " (x" . $order_row['quantity'] . ")<br>";
      }
    } else {
      $orders = "No orders found";
    }

    echo "
      <tr>
        <td><a href='menu.php?id=$row[id]'>$row[id]</a></td>
        <td>$row[name]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>$row[reg_date]</td>
      </tr>
    ";
  }
  echo "</table>";
}
else {
  echo "NO Results";
}

$sql = "select * from orders";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    echo "<table class='table'>
    <br><tr><th>ID</th><th>Product Name</th>
          <th>Product price</th><th>Quantity</th></tr>";

    while($row = $result ->fetch_assoc()){
    echo "
        <tr>
        <td><a href='updatesingle.php?id=$row[id]'>$row[id]</a></td>
        <td>$row[product_name]</td>
        <td>$row[product_price]</td>
        <td>$row[quantity]</td>
        </tr>
    ";
    }
    echo "</table>";
}
else
    {
        echo "NO Results";
    }
$conn->close();

?>
