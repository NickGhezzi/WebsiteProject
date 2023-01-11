<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ditter</title>
</head>

<body>
    <?php
    session_start();
    //establishes DB connection and gets all posts
    require_once('database.php');

    $db = db_connect(); //my connection

    //gets all posts with their usernames
    $sql = "SELECT username, postcontent FROM Users INNER JOIN Posts ON Users.userid = Posts.userid ";
    $sql .= "ORDER BY Posts.posttimestamp DESC";
    //execute the query
    $result_set = mysqli_query($db, $sql);
    ?>


    <?php
    include("header.php");
    ?>

    <div id="main-section">
        <?php
        // if user is logged in it will display their account info
        if (isset($_SESSION['valid_user'])) {
            $userEmail = $_SESSION['valid_user'];
            $nameresult = mysqli_query($db, "SELECT username FROM Users WHERE email = '$userEmail'");
            $userName = mysqli_fetch_assoc($nameresult)['username'];
            echo "<div id=\"account-window\">
                     <div class=\"header\">Logged in as: </div>
                     <div class=\"username\">$userName</div>
                     <div class=\"username\"> $userEmail</div>
                 </div>";
        }
        ?>

        <div id="feed">
            <div id="user-search">
                <form action="search.php" method="get" enctype="text/plain">
                    <input type="text" id="search-request" name="searchQ" placeholder="Search User" size="50">
                    <button type="Submit" name="submit">Search</button>
                </form>
            </div>

            <?php
            //if the user is logged in, enable post form
            if (isset($_SESSION['valid_user'])) {
                echo "<div id=\"post-prompt\">
                <form action=\"proccesspost.php\" method=\"post\">
                    <label for=\"post\">Whats on your mind?</label>
                    <textarea name=\"userPost\" id=\"post\" rows=\"6\" cols=\"10\" maxlength=\"255\" placeholder=\"Max 255 characters\"></textarea>
                    <button type=\"Submit\">Post Ditt</button>
                </form>
            </div>";
            }
            ?>

            <div>

                <?php
                //display posts from database
                while ($results = mysqli_fetch_assoc($result_set)) {
                    echo "<div class=\"post\">
                        <div class=\"post-username\"> {$results['username']} </div>
                        <div class=\"post-content\"> {$results['postcontent']}</div>
                    </div>";
                }
                ?>

            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>