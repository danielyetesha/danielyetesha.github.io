<?php
session_start();
    	$payment=  mysqli_query($connection,"SELECT * FROM payment ORDER BY Payment_id DESC LIMIT 1") or die(mysqli_error($connection));
        $payment_data=  mysqli_fetch_assoc($payment);
        $payment_id=$payment_data['Payment_id'];
        $status=$payment_data['Status'];
        $account_id=$_SESSION['account_id'];
        $fee=$_GET["TotalAmount"];
        if($status=='pending'){
            $payment=  mysqli_query($connection,"UPDATE payment SET Status='success' WHERE Payment_id='$payment_id'") or die(mysqli_error($connection));
            $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") payed ".$fee." birr for recharging the ballance";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Customer payed successfuly','$detail')") or die(mysqli_error($connection));

        }
            	$customer=  mysqli_query($connection,"SELECT * FROM customer WHERE Customer_id='$account_id'") or die(mysqli_error($connection));
$customer_data=  mysqli_fetch_assoc($customer);
        $balance=$customer_data['Balance'];
        $new_balance=$balance+$fee;
            $payment=  mysqli_query($connection,"UPDATE customer SET Balance='$new_balance' WHERE Customer_id='$account_id'") or die(mysqli_error($connection));
    echo "<h1>Your balance is recharged successfully Thank you for your service</h1>"; 
    echo "<h1>Amount of recharge is $fee </h1>"; 
    echo "<h1>Your current balance is $new_balance </h1>"; 

?>