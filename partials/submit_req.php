<?php

include 'dbconnect.php';
echo $email = $_POST["emreq"];
echo $cont1 = $_POST["con1req"];
echo $reqmony = $_POST["monyreq"];
echo $poid = $_POST['p_id'];
echo $usrid = $_POST['usrid'];

$sql = "INSERT INTO `requests` (`customer_email`, `customer_contact`, `bid_price`, `post_id`, `owner_user_id`) VALUES ('$email', '$cont1', '$reqmony', '$poid',  '$usrid')";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: ../index.php?postrequest=true");
    exit();
} else {
    header("Location: ../index.php?postrequest=false");
}
