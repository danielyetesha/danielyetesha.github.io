<?php
session_start();
require "../connection.php";
$payment_id=$_GET['MerchantOrderId'];
 $account_id=$_SESSION['account_id'];
$payment=  mysqli_query($connection,"SELECT * FROM payment WHERE Payment_id='$payment_id'");
$payment_data=  mysqli_fetch_assoc($payment);
$payment_type=$payment_data['Type'];
$price=$payment_data['Price'];
$status=$payment_data['Status'];
if($status=='success'){
    echo "<script>alert('payment already checked')</script>"; 
    echo "<script>window.location='../ballance.php';</script>";
}else if($status=='failed'){
    echo "<script>alert('payment already failed previously please retry again with other transaction')</script>"; 
    echo "<script>window.location='../schedule.php';</script>";
}else{
    $result=mysqli_query($connection,"UPDATE payment SET Status='failed' WHERE Payment_id='$payment_id'") or die(mysqli_error($connection));
    mysqli_query($connection,"DELETE FROM temp_seat WHERE Payment_id='$payment_id'") or die(mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>customer has cancelled the request</h2>
</body>

</html>