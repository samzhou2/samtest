<?php
 
header("Content-Type:application/json");
include('connection.php');
include('connection_read.php');
 
$query = "SELECT count(*) as total FROM `customers`";

$row = mysqli_fetch_array(mysqli_query($con,$query),MYSQLI_ASSOC);
$row_us_replica = mysqli_fetch_array(mysqli_query($con_read,$query),MYSQLI_ASSOC);
 
$response["status"] = "true";
$response["message"] = "Customers Total Count";
$response["count_primary"] = $row["total"];
$response["count_us_replica"] = $row_us_replica["total"];
echo json_encode($response); exit;
 
?>