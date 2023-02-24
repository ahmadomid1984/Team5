<?php
$title = "Login Method";
include '../header.php';
include 'db.php';
$a = $_GET['id'];
$result = mysqli_query($conn, "Select * from Customer where id='$a' ");
$row = mysqli_fetch_array($result);
?>

<form method="post" action="" style="display: block; text-align: center; border: 5px solid white; width: 300px; padding: 10px; margin: 0 auto;">
    <input type="text" name="email" placeholder="Email" required> <br><br>
    <input type="text" name="cpassword" placeholder="Password" required> <br><br>

    <input type="submit" value="Submit" name="submit">
</form>


<?php
if (isset($_POST["submit"])){
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    include 'db.php';
    header("location: index2.php");

    if ($conn ->query($sql) === TRUE){
        echo"You have been logged in";
        
    }
    else {
        echo "Error:" . $conn->error;
    }
}

?>

<?php
include '../footer.php';
?>