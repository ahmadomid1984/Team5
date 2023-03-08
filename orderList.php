<h2 style="text-align: center; font-size: 40px; text-decoration: underline overline;">The Order List</h2>
<?php
$title = "Reading Data from the database";
include 'db_connection.php';

$sql = "SELECT c.id, c.name, c.phone, c.address, c.reg_date, GROUP_CONCAT(CONCAT(o.product_name, ' x', o.quantity)) AS orders 
        FROM customers c 
        LEFT JOIN orders o ON c.phone = o.customer_phone
        GROUP BY c.id, c.name, c.phone, c.address, c.reg_date";
$result = $conn->query($sql);

if ($result === false) {
  die("Error executing the query: " . $conn->error);
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
          <th>Orders</th>
          <th>reg_date</th>
        </tr>";

  while($row = $result ->fetch_assoc()){
    echo "
      <tr>
        <td><a href='menu.php?id=$row[id]'>$row[id]</a></td>
        <td>$row[name]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>$row[orders]</td>
        <td>$row[reg_date]</td>
      </tr>
    ";
  }
  echo "</table>";
}
else {
  echo "NO Results";
}

$conn->close();

?>