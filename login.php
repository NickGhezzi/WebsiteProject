<?php
session_start();
if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    //validate that the email and password exists
    require_once('database.php');
    $db = db_connect();
    $sql = "SELECT * FROM Users WHERE email = '$userEmail' AND password = '$userPassword'";
    $result_set = mysqli_query($db, $sql);

    if (mysqli_num_rows($result_set) != 0) { //if exist
        $_SESSION['valid_user'] = $userEmail; //create session variable
        header("Location: index.php"); //redirect the user to the main page
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ditter - Login</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div id="login">
        <div class="login-header">Log in:</div>

        <?php
        if (isset($userEmail)) {
            // if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
        }
        ?>

        <div class="login-form">
            <form action="login.php" method="post">
                <label for="user-email">Email:</label>
                <input type="text" id="user-email" name="userEmail" size="30">

                <label for="user-password">Password:</label>
                <input type="password" id="user-password" name="userPassword" size="30">

                <button type="Submit" name='login'>Login</button>
            </form>
        </div>
    </div>

    <?php 
        include("footer.php");
    ?>
</body>

</html>