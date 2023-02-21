<?php
$title = "A simle CRUP app";
include '../header.php';
?>

<form method="post" action="" style="display: block; text-align: center; border: 5px solid white; width: 300px; padding: 10px; margin: 0 auto;">
    <input type="text" name="fname" placeholder="First Name" required> <br><br>
    <input type="text" name="lname" placeholder="Last Name" required> <br><br>
    <input type="text" name="email" placeholder="Email" required> <br><br>
    <input type="text" name="cpassword" placeholder="Password" required> <br><br>

    <input type="submit" value="Submit" name="submit">
</form>


<?php
if (isset($_POST["submit"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    include 'db.php';
    $sql = "insert into Customer (fname, lname, email, cpassword)
    values('$fname', '$lname', '$email', '$cpassword')";

    if ($conn ->query($sql) === TRUE){
        echo "
        <style>
        h1 {
          color: white;
          text-align: center;
          font-size: 20px;
        }
        </style>
        <h1>Your account has been created</h1>
        ";   
    }
    else {
        echo "Error:" . $conn->error;
    }
}

?>



<?php
include '../footer.php';
?>