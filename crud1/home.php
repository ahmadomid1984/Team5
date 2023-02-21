<?php
$title = "Home";
session_start();
include '../layout/header.php';

if (isset($_SESSION['email']) && isset($_SESSION['cpassword'])){
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>Hello, <?php echo $_SESSION['email']; ?></h1>
</body>
</html>

<?php
}
else {
    header("Location: index2.php");
    exit();
}
?>
