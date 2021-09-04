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
    mysqli_query($con_read_syd_1, "set aurora_replica_read_consistency = 'session'");

    for ($i = 0; $i < $bulk_size; $i++)
    {   
        $customer_name = $_GET['customer_name'].base64_encode(random_bytes(10));
        $query = "INSERT INTO `customers` (`customer_name`,`customer_email`,`customer_contact`,`customer_address`,`country`) values ('$customer_name','samzhou.it@gmail.com','13676042888','Room 1206','China')";
        mysqli_query($con_read_syd_1, $query);
    }

    $response["status"] = "true";
    $response["message"] = "Customer bulk insert done!";
}
else
{
    $response["status"] = "false";
    $response["message"] = "customer_name is required!";
}
echo json_encode($response); exit;

?>