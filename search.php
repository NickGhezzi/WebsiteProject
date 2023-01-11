<?php
if (isset($_GET['submit'])) {
    if ((!isset($_GET['searchQ']))) {
        echo "*" . "No search terms found";
    } else {
        $searchUser = $_GET['searchQ'];
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
    <title>Ditter - Search</title>
</head>

<body>
    <?php
    //establishes DB connection and gets all posts
    require_once('database.php');

    $db = db_connect(); //my connection

    //gets posts that match given username
    $sql = "SELECT postcontent FROM Posts WHERE userID =  (SELECT userID FROM Users WHERE username = '$searchUser')";
    //execute the query
    $result_set = mysqli_query($db, $sql);

    ?>


    <?php
    include("header.php");
    ?>

    <div id="main-section">
        <div id="feed">
            <?php
            if (mysqli_num_rows($result_set) != 0) {
                while ($results = mysqli_fetch_assoc($result_set)) {
                    echo "<div class=\"post\">
                        <div class=\"post-username\"> {$searchUser} </div>
                        <div class=\"post-content\"> {$results['postcontent']}</div>
                    </div>";
                }
            } else {
                echo "<p>No results found</p>";
            }
            ?>
        </div>
    </div>

    <?php 
        include("footer.php");
    ?>
</body>

</html>