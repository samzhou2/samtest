<?php
 $dbhost_read_syd_2 = "sam-global-db-cluster-1.cluster-ro-cfrnundnmczd.ap-southeast-2.rds.amazonaws.com";
 $dbuser_read_syd_2 = "admin";
 $dbpass_read_syd_2 = "12345678";
 $db_read_syd_2 = "samtestdb";
 $con_read_syd_2 = mysqli_connect($dbhost_read_syd_2, $dbuser_read_syd_2, $dbpass_read_syd_2 , $db_read_syd_2) or die($con_read_syd_2);
?>