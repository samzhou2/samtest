<?php

header("Content-Type:application/json");
include('connection.php');
 
if (isset($_GET['customer_name']) && $_GET['customer_name']!="")
{
    $customer_name = $_GET['customer_name'].base64_encode(random_bytes(10));
    $query = "INSERT INTO `customers` (`customer_name`,`customer_email`,`customer_contact`,`customer_address`,`country`) values ('$customer_name','samzhou.it@gmail.com','13676042888','Room 1206','China')";
    mysqli_query($con, $query);
    $result = mysqli_query($con, "SELECT * FROM `customers` WHERE customer_id=LAST_INSERT_ID()");
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $customerData['customer_id'] = $row['customer_id'];
    $customerData['customer_name'] = $row['customer_name'];
    $customerData['customer_email'] = $row['customer_email'];
    $customerData['customer_contact'] = $row['customer_contact'];
    $customerData['customer_address'] = $row['customer_address'];
    $customerData['country'] = $row['country'];
    
    $response["status"] = "true";
    $response["message"] = "Customer Details";
    $response["customers"] = $customerData;

}
else
{
    $response["status"] = "false";
    $response["message"] = "customer_name is required!";
}
echo json_encode($response); exit;

?>