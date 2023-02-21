<?php
$title = "Login";
session_start();
include '../header.php';

if (isset($_POST['email']) && isset($_POST['cpassword'])){
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
}

$email = validate($_POST['email']);
$cpassword = validate($_POST['cpassword']);

if(empty($email)){
    header("Location: index2.php?error=Email is required");
    exit();
}
else if (empty($cpassword)) {
    header("Location: index2.php?error=Password is required");
    exit();
}

$sql="SELECT * FROM crush WHERE email='$email' AND cpassword='$cpassword'";

$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1){
    $row=mysqli_fetch_assoc($result);
    if($row['email'] === $email && $row['cpassword'] === $cpassword) {
        echo "You are logged in";
        $_SESSION['email'] = $row['email'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        header("Location: home.php");
        exit();
    }
    else {
        header("Location: index2.php?error=Incorrect Email or Password");
    }
}
else {
    header("Location: index2.php");
    exit();
}

include '../footer.php';
?>
