<!-- Infinity free.net -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="./">
            <div class="brand">
                <img src="./assets/Logo/Logo-400-100.png" alt="logo_here" height="30">


            </div>
        </a>



        <?php


        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '
                        <a href="./mypost.php"><div class="nav-item">My posts</div></a>
                        <a href="./makepost.php"><div class="nav-item">New Post</div></a>
                        <a href="./request.php"><div class="nav-item">Requests</div></a>
                    ';
        }
        ?>
        <form action="search.php" method="GET">
            <input type="text" name="search">
            <input type="submit">

        </form>

        <!-- show logout or login -->
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<div class="nav-item">Welcome ' . $_SESSION["useremail"] . '</div>';

            //logout button
            echo '<a href="partials/logouthandle.php">logout</a>';
        } else {
            echo '
            <div>
            <a href="partials/login.php">login</a>
            </div>
            <div>
            <a href="partials/signup.php">signup</a>
            </div>
            ';
        }
        ?>


    </nav>
</body>

</html>