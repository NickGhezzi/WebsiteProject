<div id="header">
        
        <div class="logo"><a href="index.php" style="text-decoration: none; color: #FFFFFF;"> Ditter.</a></div>
        <?php
        if (!isset($_SESSION['valid_user'])) {
            echo "<div class=\"account-buttons\">
                     <a href=\"login.php\">
                        <button>Login</button>
                    </a>
                    <a href=\"create.php\">
                        <button>Create Account</button>
                    </a>
                 </div>";
        }
        else{
            echo "<div class=\"account-buttons\">
                 <a href=\"logout.php\">
                    <button>Logout</button>
                </a>
                </div>";
        }
        ?>
    </div>