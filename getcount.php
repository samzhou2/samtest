<?php
 
header("Content-Type:application/json");
include('connection.php');
 
$query = "SELECT count(*) as total FROM `customers`";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
$response["status"] = "true";
$response["message"] = "Customers Total Count";
$response["count"] = $row["total"];
echo json_encode($response); exit;
 
?>