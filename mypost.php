<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mypost</title>
  <style>
        a {
            color: #fff;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            color:#FCE2DB;
        }
    </style>
</head>

<body style="background-color: #80489C;">
  <?php
  session_start();
  include 'partials/header.php';

  ?>

  
    <center style="margin:2rem;">
      <h1>My Posts!</h1>
    </center>
    <div class="row mx-2 block " style="display:flex; flex-wrap:wrap; justify-content:space-around; align-items:center; gap:2rem;" >
      <?php $i = 0;
      include 'partials/dbconnect.php';

      $e_id = $_SESSION['uid'];
      $sql = "SELECT * FROM post_item WHERE user_id=$e_id";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        $bok_n = $row['item_name'];
        $og_pr = $row['original_price'];
        $ex_pr = $row['expected_price'];
        $time = $row['post_time'];
        $pic = $row['item_picture1'];
        $p_id = $row['post_id'];
        echo '<div class="">
      <div class="">
        <div class="">
          <img src="project_x_copy/' . $pic . '" class="card-img" alt="..." width="360" height="250">
        </div>
        <div class="">
          <div class="">
          <h5 class=""><a href="post.php?pid=' . $p_id . '" class="text-dark">' . $bok_n . '</a></h5>
            <p class="">Original Price: ' . $og_pr . '</p>
            <p class="">Expected Price: ' . $ex_pr . '</p>
            <p class=""><small class="text-muted">Last updated ' . $time . '</small></p>
          </div>
        </div>
      </div>
    </div>';
      }


      ?>
    </div>
</body>

</html>