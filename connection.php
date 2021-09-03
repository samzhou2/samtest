<?php
 $dbhost = "samtest.cluster-cfy1niysvqxk.us-west-2.rds.amazonaws.com";
 $dbuser = "admin";
 $dbpass = "12345678";
 $db = "samtestdb";
 $con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
?>