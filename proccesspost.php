<?php 
    session_start();
    if (isset($_POST['userPost']) && isset($_SESSION['valid_user'])) {
        $userPost = $_POST['userPost'];
        $userEmail = $_SESSION['valid_user'];

        require_once('database.php');
        $db = db_connect();
        $sql = "SELECT * FROM Users WHERE email = '$userEmail'";
        $result_set = mysqli_query($db, $sql);
        $result = mysqli_fetch_assoc($result_set);
        $userID = $result['userID'];
        if (isset($userID)) {
            $sql = "INSERT INTO Posts (postcontent, userID)
            VALUES ('$userPost', $userID)" ;
            mysqli_query($db, $sql);
            header("Location: index.php");
        }
    }
?>