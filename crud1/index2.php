<?php
$title = "Login Method";
include '../header.php';
?>

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    form {
        color: white;
        text-align: center;
        font-size: 20px;

        display: block; 
        text-align: center; 
        border: 5px solid white; 
        width: 300px; 
        padding: 10px; 
        margin: 0 auto;
    }
    </style>
</head>

<body>

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Email</label>

        <input type="text" name="email" placeholder="Email"><br>

        <label>Password</label>

        <input type="cpassword" name="cpassword" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>

<?php
include '../footer.php';
?>