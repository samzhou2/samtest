<?php
 
header("Content-Type:application/json");
include('connection.php');
include('connection_read.php');
include('connection_read_syd_1.php');
include('connection_read_syd_2.php');
 
$query = "SELECT count(*) as total FROM `customers`";

$row = mysqli_fetch_array(mysqli_query($con,$query),MYSQLI_ASSOC);
$row_us_replica = mysqli_fetch_array(mysqli_query($con_read,$query),MYSQLI_ASSOC);
$row_syd_replica1 = mysqli_fetch_array(mysqli_query($con_read_syd_1,$query),MYSQLI_ASSOC);
$row_syd_replica2 = mysqli_fetch_array(mysqli_query($con_read_syd_2,$query),MYSQLI_ASSOC);
 
$response["status"] = "true";
$response["message"] = "Customers Total Count";
$response["count_primary"] = $row["total"];
$response["count_us_replica"] = $row_us_replica["total"];
$response["count_syd_replica1"] = $row_syd_replica1["total"];
$response["count_syd_replica2"] = $row_syd_replica2["total"];
echo json_encode($response); exit;
 
?>