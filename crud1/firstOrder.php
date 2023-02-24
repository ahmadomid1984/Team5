<?php
$title = "Order page";
include '../header.php';
?>
<div class = "text">


<form method="post" action="" onsubmit="return crud1()" name="form2" style="display: block; text-align: center; border: 5px solid white; width: 300px; padding: 10px; margin: 0 auto;">
    <input type="text" name="fname" placeholder="First Name" required> <br>
    <input type="text" name="lname" placeholder="Last Name" required> <br>
    <input type="text" name="email" placeholder="Email" required> <br>
    Hot Drinks: <select name="hotDrinks">
        <option value="Hot Drinks"></option>
        <option value="Americano">Americano</option>
        <option value="Bisco Chocolate">Bisco Chocolate </option>
        <option value="Black Latte">Black Latte </option>
        <option value="Caramel Macchiato">Caramel Macchiato </option>
        <option value="Espresso">Espresso </option>
        <option value="Hot Chocolate">Hot Chocolate </option>
        <option value="Mocha">Mocha </option>
        <option value="Pistachio Chocolate">Pistachio Chocolate </option>
        <option value="White Chocolate">White Chocolate </option>
    </select> <br>
   Cold Drinks: <select name="coldDrinks">
        <option value="Cold Drinks"></option>
        <option value="Assogato">Assogato </option>
        <option value="Chocolate Shake">Chocolate Shake </option>
        <option value="Ice Americano">Ice Americano </option>
        <option value="Ice Latte">Ice Latte</option>
        <option value="Ice Mocha">Ice Mocha</option>
        <option value="Nutella Shake">Nutella Shake</option>
        <option value="Peanut Shake">Peanut Shake</option>
        <option value="Pony Shake">Pony Shake</option>
        <option value="Strawbery Shake">Strawbery Shake</option>
    </select> <br>
    Cakes: <select name="cakes">
        <option value="Cakes"></option>
        <option value="Rasberry Cheese Cake">Rasberry Cheese Cake </option>
        <option value="Blueberry Pie">Blueberry Pie</option>
        <option value="Caramel Cheese Cake">Caramel Cheese Cake</option>
        <option value="Cardamon Bun">Cardamon Bun</option>
        <option value="Chocolate Ball">Chocolate Ball</option>
        <option value="Cinnamon">Cinnamon </option>
        <option value="Cookie Dark Chocolate">Cookie Dark Chocolate </option>
        <option value="Mud Cake">Mud Cake</option>
        <option value="Apple Croissant">Apple Croissant</option>
    </select> 
  <br>  <input type="submit" value="Order" name="submit">
</form>

<?php
if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $hotDrinks = $_POST['hotDrinks'];
    $coldDrinks = $_POST['coldDrinks'];
    $cakes = $_POST['cakes'];
    include "db.php";
    $sql = "insert into Customer(fname,lname, email, hotDrinks, coldDrinks, cakes)
    values('$fname', '$lname', '$email', '$hotDrinks', '$coldDrinks', '$cakes')";

    if ($conn->query($sql) === TRUE){
        echo "Your order has been registered, please procceed to next page";
        echo '<form method="POST" action="index2.php">
         <input type="submit"/ value="Proceed to payment">
    </form>';
    }
   
    else {
        

        echo "Error: " . $conn->error;
    }

}

?>



</div>

<?php
include '../footer.php';
?>