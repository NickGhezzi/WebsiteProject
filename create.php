<?php 
    session_start();
    if (isset($_POST['newuserEmail']) && isset($_POST['newuserPassword']) && isset($_POST['newuserName'])) {
        $userEmail = $_POST['newuserEmail'];
        $userName = $_POST['newuserName'];
        $userPassword = $_POST['newuserPassword'];
    
        require_once('database.php');
        $db = db_connect();
        $sql = "SELECT * FROM Users WHERE email = '$userEmail' OR username = '$userName'";
        $result_set = mysqli_query($db, $sql);
        
        if (mysqli_num_rows($result_set) == 0) { //if doesnt exist
            $sql = "INSERT INTO Users (username, email, password)
            VALUES ('$userName', '$userEmail', '$userPassword')";
            mysqli_query($db, $sql);
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
    <script src="validate.js" defer></script>
    <title>Ditter - Create Account</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div id="create-account">
        <div class="create-header">Create an account:</div>

        <?php
        if (isset($userEmail)) {
            // if they've tried and failed to log in
            echo '<p>User with this email and or user name already exists</p>';
        } 
        ?>

        <div class="create-form">
            <form action="create.php" method="post" onsubmit="return validate()">
                <div class="textfield">
                    <label for="user-email">Email:</label>
                    <input type="text" id="user-email" name="newuserEmail" placeholder="Email" size="30">
                </div>
                <div class="textfield">
                    <label for="user-name">User name:</label>
                    <input type="text" id="user-name" name="newuserName" placeholder="UserName" size="30">
                </div>
                <div class="textfield">
                    <label for="user-password">Password:</label>
                    <input type="password" id="user-password" name="newuserPassword" placeholder="Password" size="30">
                </div>
                <div class="textfield">
                    <label for="pass2">Re-type:</label>
                    <input type="password" id="pass2" placeholder="Password" size="30">
                </div>
                <button type="Submit">Create Account</button>
            </form>
        </div>
    </div>

    <?php 
        include("footer.php");
    ?>
</body>

</html>