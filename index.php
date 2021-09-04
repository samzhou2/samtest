<?
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $file = '/tmp/sample-app.log';
  $message = file_get_contents('php://input');
  file_put_contents($file, date('Y-m-d H:i:s') . " Received message: " . $message . "\n", FILE_APPEND);
}
else
{
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sam's Test PHP Application</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster+Two" type="text/css">
    <link rel="icon" href="https://awsmedia.s3.amazonaws.com/favicon.ico" type="image/ico" >
    <link rel="shortcut icon" href="https://awsmedia.s3.amazonaws.com/favicon.ico" type="image/ico" >
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="/styles.css" type="text/css">
</head>
<body>
    <section class="congratulations">
        <h1>Sam's Test PHP Site</h1>
    </section>

    <section class="instructions">
        <h2>Api list</h2>
        <ul>
            <li><a href="get.php?customer_id=1" target="_blank">Get Customer</a></li>
            <li><a href="getlist.php" target="_blank">Get Customers List</a></li>
            <li><a href="getlist_read.php" target="_blank">Get Customers List (Read Replica)</a></li>
            <li><a href="getlist_read_syd_1.php" target="_blank">Get Customers List (Syd Read Replica 1)</a></li>
            <li><a href="getlist_read_syd_2.php" target="_blank">Get Customers List (Syd Read Replica 2)</a></li>
            <li><a href="getcount.php" target="_blank">Get Customers Count In Primary Database</a></li>
            <li><a href="getcountall.php" target="_blank">Get Customers Count In Primary And Replica Databases</a></li>
            <li><a href="create.php?customer_name=new_" target="_blank">Create Customer</a></li>
            <li><a href="bulkcreate.php?customer_name=new_&bulk_size=2000" target="_blank">Create Customer In Bulk</a></li>
        </ul>
    </section>

    <!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
</body>
</html>
<? 
} 
?>
