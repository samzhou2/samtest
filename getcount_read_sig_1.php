<?php
 
header("Content-Type:application/json");
include('connection_read_sig_1.php');
 
$query = "SELECT count(*) as total FROM `customers`";
$result = mysqli_query($con_read_sig_1,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
$response["status"] = "true";
$response["message"] = "Customers Total Count";
$response["count"] = $row["total"];
echo json_encode($response); exit;
 
?>