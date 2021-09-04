<?php
 
header("Content-Type:application/json");
include('connection_read.php');
 
$page_size = 10;
if (isset($_GET['page_size']) && $_GET['page_size']!="" && is_numeric($_GET['page_size']))
{
    $page_size = $_GET['page_size'];
}

try
{
    $query = "SELECT * FROM `customers` Order by `customer_id` Desc Limit 0 , $page_size ";
    $result = mysqli_query($con_read,$query);
    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $customerData['customer_id'] = $row['customer_id'];
        $customerData['customer_name'] = $row['customer_name'];
        $customerData['customer_email'] = $row['customer_email'];
        $customerData['customer_contact'] = $row['customer_contact'];
        $customerData['customer_address'] = $row['customer_address'];
        $customerData['country'] = $row['country'];
        $customerList[$rownumber]=$customerData
    }
    
    mysql_free_result($result);
    $response["status"] = "true";
    $response["message"] = "Customers List"
    $response["customers"] = $customerList;
}
catch(Exception $ex)
{
    $response["status"] = "false";
    $response["message"] = $ex->getMessage();
}
finally
{
    echo json_encode($response); exit;
}
 
?>