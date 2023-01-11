<?php
session_start();
unset($_SESSION['valid_user']); //delete session variable
session_destroy(); //kill the session
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Log Out</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div id="login">
        <div class="login-header">Logged out</div>
        <p>You have been logged out.</p>
        <p class="account-buttons"><a href="index.php">Back to Home Page</a></p>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>