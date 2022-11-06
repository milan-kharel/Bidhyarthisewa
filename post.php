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
            color: #FCE2DB;
            font-size: 1.05rem;
        }
    </style>
    <title>Bidyarthisewa</title>
</head>

<body style="background-color:#80489C ;">

    <?php

    include 'partials/header.php';
    include 'partials/dbconnect.php';
    $p_id = $_GET['pid'];
    $sql = "SELECT * FROM post_item  WHERE post_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $bok_n = $row['item_name'];
        $og_pr = $row['original_price'];
        $ex_pr = $row['expected_price'];
        $des_n = $row['item_description'];
        $time = $row['post_time'];
        $pic1 = $row['item_picture1'];
        $pic2 = $row['item_picture2'];
        $pic3 = $row['item_picture3'];
        $usrid = $row['user_id'];
        echo '<br>
       
            <div class="cont" style="min-height:80vh;display:flex; flex-direction:column;justify-content:space-around;align-items:center;">

                <div><h1 class="name"><b style="font-size:2rem; text-transform:uppercase;">' . $bok_n . '</b></h1></div>
    
                <div class="pic-cont" style=" width:45rem;height:17rem;display:flex; justify-content:center;align-items:center;gap:0.3rem;" >
                    <div class="pic">
                        <img src="project_x_copy/' . $pic1 . '" style="height:18rem;width:15rem">
                    </div>
                    <div class="pic">
                        <img src="project_x_copy/' . $pic2 . '" style="height:18rem;width:15rem">
                    </div>
                    <div class="pic">
                        <img src="project_x_copy/' . $pic3 . '" style="height:18rem;width:15rem">
                    </div>
                </div>
                <p class="lead">
                <h6> Description </h6>
                ' . $des_n . '
                </p>
              
                <!--row2-->
                <div class="">
                    <div class="">
                        <div class="">
                            <h6>Original Price: </h6> ' . $og_pr . '
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <h6>Expected Price: </h6> ' . $ex_pr . '
                        </div>
                    </div>
                </div>
              
            </div>

            <div>
            <a href="partials/buyrequest.php?pid=' . $p_id . '&owid=' . $usrid . '" style=" padding:5px;border:1px solid white;text-align:center;font-size:1.5rem;margin-left:45%">Request to Buy</a>
            </div>
     
       
  ';
    }
    ?>


</body>

</html>