<?php
 $dbhost_read = "samtest.cluster-ro-cfy1niysvqxk.us-west-2.rds.amazonaws.com";
 $dbuser_read = "admin";
 $dbpass_read = "12345678";
 $db_read = "samtestdb";
 $con_read = mysqli_connect($dbhost_read, $dbuser_read, $dbpass_read , $db_read) or die($con_read);
?>