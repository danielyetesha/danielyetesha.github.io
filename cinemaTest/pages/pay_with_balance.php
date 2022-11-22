<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <script src="../js/sweetalert.min.js"></script>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>

</body>

</html>
<?php
session_start();
require "connection.php";
if(isset($_POST['pay_with_balance'])){
$account_id=$_SESSION['account_id'];
$schedule_id=$_POST['schedule_id'];
$price=$_POST['price'];
$count=$_POST['count'];
$total_price=$price*$count;
$date=date("Y-m-d");
$time=date("h:i:sa");
$customer_check=  mysqli_query($connection,"SELECT * FROM customer WHERE Customer_id='$account_id'");
$count=  mysqli_num_rows($customer_check);
if($count>0){
    $customer_data=  mysqli_fetch_assoc($customer_check);
    $balance=$customer_data['Balance'];
    if($balance<$total_price){
        echo "<script>
swal({
    text: 'insufficent balance!',
    icon: 'warning',
    button: 'ok',
}).then(function(){
window.location='ballance.php';
});
</script>";
    }else{
        $new_balance=$balance-$total_price;
        $pay_query="INSERT INTO payment(Type,Schedule_id,Pay_with,Customer_id,Date,Time,Status,Price) VALUES ('Reserve_Seat','$schedule_id','Cinema balance','$account_id','$date','$time','pending','$price')";
        $result=  mysqli_query($connection,$pay_query) or die(mysqli_error($connection));
        if(!$result){
            echo "<script>swal('ERROR','FAILD TO PAYMENT PROCESS','error');</script>";
        }else{
            $update_query="UPDATE customer SET Balance='$new_balance'WHERE Customer_id='$account_id' ";
            $result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));
            if(!$result){
                echo "<script>alert('YOUR PAYMENT IS FAIL');</script>";
            }else{
                $pay=  mysqli_query($connection,"SELECT * FROM payment WHERE Date='$date' AND Time='$time' AND Customer_id='$account_id'") or die(mysqli_error($connection));
                $payment_data=  mysqli_fetch_assoc($pay);
                $payment_id=$payment_data['Payment_id'];
                foreach($_POST['seat'] as $seat) {
                    $seats_store=  mysqli_query($connection,"INSERT INTO temp_seat(Payment_id,Seat_no) VALUES ('$payment_id','$seat')");
                }
                header("Location: payment/success.php?MerchantOrderId=".$payment_id);
            }
        }
    }
}else{
    echo "<script>swal('ERROR','CUSTOMER DOES NOT EXIST','error');</script>";
}
}
?>