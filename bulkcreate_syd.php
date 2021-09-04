<?php

header("Content-Type:application/json");
include('connection_read_syd_1.php');
$bulk_size=1000;
if (isset($_GET['bulk_size']) && $_GET['bulk_size']!="" && is_numeric($_GET['bulk_size']))
{
    $bulk_size = (int) $_GET['bulk_size'];
}

 
if (isset($_GET['customer_name']) && $_GET['customer_name']!="")
{
    for ($i = 0; $i < $bulk_size; $i++)
    {   
        $customer_name = $_GET['customer_name'].base64_encode(random_bytes(10));
        $query = "INSERT INTO `customers` (`customer_name`,`customer_email`,`customer_contact`,`customer_address`,`country`) values ('$customer_name','samzhou.it@gmail.com','13676042888','Room 1206','China')";
        mysqli_query($con_read_syd_1, $query);
        $result = mysqli_query($con_read_syd_1, "SELECT * FROM `customers` WHERE customer_id=LAST_INSERT_ID()");
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $customerData['customer_id'] = $row['customer_id'];
        $customerData['customer_name'] = $row['customer_name'];
        $customerData['customer_email'] = $row['customer_email'];
        $customerData['customer_contact'] = $row['customer_contact'];
        $customerData['customer_address'] = $row['customer_address'];
        $customerData['country'] = $row['country'];
        
        $customerList[$i] = $customerData;
    }

    $response["status"] = "true";
    $response["message"] = "Customer Details";
    $response["customers"] = $customerList;
}
else
{
    $response["status"] = "false";
    $response["message"] = "customer_name is required!";
}
echo json_encode($response); exit;

?>