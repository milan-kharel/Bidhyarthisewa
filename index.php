<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if (!mysqli_select_db($conn, 'Bidhyarthisewa')) {
    echo "CREATE A DATABASE WITH NAME 'Bidhyarthisewa' in phpmyadmin and import Bidhyarthisewa.sql file in 'dbfile' folder";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a {
            color: #fff;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
        }
    </style>
    <title>Bidhyarthisewa</title>
</head>

<body>

    <?php
    include 'partials/header.php';

    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
        $errmsg = $_GET['perror'];
        echo '<div class="alert">
            <strong>' . $errmsg . ' or email cannot Login !!!</strong> Try another Email
          </div>';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Sign up Successful !!!</strong> You can browse now
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
        $errmsg = $_GET['error'];
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>' . $errmsg . ' cannot signup !!!</strong> Try another Email
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    if (isset($_GET['postsucess']) && $_GET['postsucess'] == "false") {
        $errmsg = $_GET['poerror'];
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <strong>' . $errmsg . ' cannot upload your post !!!</strong> Check your uploaded content!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
    ?>

    <!-- intro section -->
    <div class="intro" style="background-color: #80489C; display:flex; justify-content:center; align-items:center;">
        <div>

            <p style="color:#FCE2DB; font-size:4.5rem;"> BidhyarthiSewa</p>
            <p style="color:#FCE2DB"> Platform for every students to buy/sell their used materials in a reasonable price</p>
        </div>
    </div>

    <!-- find items section -->
    <div class="find-items" >
        <div style="height:7rem; text-align:center; padding:2rem;font-size:3rem;color:#FCE2DB; ">Find Items</div>
        <div class="items-list" >

            <?php

            include 'partials/dbconnect.php';

            $sql = "SELECT * FROM `post_item` ORDER BY `post_item`.`post_time` DESC LIMIT 9";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $item_name = $row['item_name'];
                $original_price = $row['original_price'];
                $expected_price = $row['expected_price'];
                $post_time = $row['post_time'];
                $picture = $row['item_picture1'];
                $post_id = $row['post_id'];
                echo '
                    <div style=" padding:0.5rem;border:1px solid #80489C;height:23rem; color:#FCE2DB ;display:flex; flex-direction:column; justify-content:space-around; align-items:center;">
                        <div >
                                <img src="Bidhyarthisewa/' . $picture . '" " class="card-img" alt="..." width="300" height="250">
                        </div>
                        
                                <div class="card-body" style=" display:flex; flex-direction:column; justify-content:space-around;">
                                    <h5 class="card-title">  <a href="post.php?pid=' . $post_id . '" class="text-dark" style="font-size:1rem; text-transform:uppercase;">' . $item_name . '</a></h5>
                                    <p class="card-text">Original Price: ' . $original_price . '</p>
                                    <p class="card-text">Expected Price: ' . $expected_price . '</p>
                                    <p class="card-text"><small class="text-muted">Last updated ' . $post_time . '</small></p>
                                </div>
                             
                    </div>
                
                        ';
            }

            ?>

        </div>

    </div>

</body>

</html>