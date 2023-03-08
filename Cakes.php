<?php include "./header.php" ?>

<form action="order_confirmation.php" method="post">
<section>
        <section class="grid-container">
            <div class="container10">
                <img src="img/Cakes/8Rasberry cheese cake.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px; font-size: 18px;">Rasberry Cheese Cake - 7€
                    <?php
				    include 'db_connection.php'; 
                    // Get information from database
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Rasberry Cheese Cake'";
				    $result = $conn->query($sql);
                    // Display information in a table
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[1]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[1]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[1]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[1]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    // Close the database connection
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/1Blueberry pie.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Blueberry Pie - 5€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Blueberry Pie'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[2]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[2]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[2]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[2]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/2Caramel chesse cake.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Caramel Chesse Cake - 6€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Caramel Chesse Cake'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[3]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[3]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[3]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[3]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/3Cardamon bun.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Cardamon Bun - 4€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Cardamon Bun'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[4]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[4]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[4]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[4]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/4Chocolate ball.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Chocolate Ball - 7€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Chocolate Ball'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[5]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[5]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[5]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[5]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/5Cinnamon.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Cinnamon - 8€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Cinnamon'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[6]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[6]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[6]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[6]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/6Cooki dark chocolate.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Cooki Dark Chocolate - 4€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Cooki Dark Chocolate'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[7]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[7]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[7]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[7]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/7Mud cake.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Mud Cake - 5€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Mud Cake'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[8]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[8]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[8]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[8]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
            <div class="container10">
                <img src="img/Cakes/Apple croissant.jpg" alt="">
                <div class="content">
                    <h1 style="word-spacing: 10px; margin-bottom: 0px;">Apple Croissant - 3€
                    <?php
				    include 'db_connection.php'; 
                    $sql = "SELECT id, name, price FROM products WHERE name = 'Apple Croissant'";
				    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<input type="hidden" name="product_id[9]" value="' . $row["id"] . '">';
                        echo '<input type="hidden" name="product_name[9]" value="' . $row["name"] . '">';
                        echo '<input type="hidden" name="product_price[9]" value="' . $row["price"] . '">';
                        echo '<input type="number" name="quantity[9]" value="0" min="0" style="width: 40px; height: 30px;"><br><br>';
                    }
				    $conn->close();
                    ?></h1>
                </div>
            </div>
           </section>
    </section>
   
    <div style="border: 3px solid white; padding: 30px; width: 40%; display: block; margin: 0 auto; text-align: center; margin-top: 1rem;">
        <h1 style="color: white; text-align: center; margin-top: 0;">Please Enter Your Information</h1>
        <label for="customer_name" style="color: white;";></label>
		<input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" required><br><br>
        <label for="customer_phone" style="color: white;"></label>
		<input type="tel" name="customer_phone" id="customer_phone" placeholder="Customer Phone" required><br><br>
		<label for="customer_address" style="color: white;"></label>
        <textarea name="customer_address" id="customer_address" rows="5" cols="50" placeholder="Customer Address" required></textarea><br>
    </div>

    <!-- Submit button -->
    <div style="text-align: center; margin-top: 1rem;">
    <input type="submit" value="Confirm Order" onclick="myFunction()"
               style="background-color: firebrick; color: white; border-radius: 10px; font-family: Sansita; font-size: 40px; font-weight: 500; padding: 5px 5px 10px 5px;"
               onmouseover="this.style.color='firebrick';
                            this.style.backgroundColor='white';
                            this.style.fontSize='2em';" 
               onmouseout="this.style.color='white';
                           this.style.backgroundColor='firebrick';
                           this.style.fontSize='2em';">
    </div>
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
  
</form>
</body>
</html>
<?php include "./footer.php" ?>