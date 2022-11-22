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
}else{
$result=mysqli_query($connection,"UPDATE payment SET Status='success' WHERE Payment_id='$payment_id'") or die(mysqli_error($connection));
if($result>0){
       $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") payed ".$price." birr";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Customer payed successfuly','$detail')") or die(mysqli_error($connection));

if($payment_type=='Reserve_Seat'){
$schedule_id=$payment_data['Schedule_id'];
$seats=  mysqli_query($connection,"SELECT * FROM temp_seat WHERE Payment_id='$payment_id'");
$schedule=  mysqli_query($connection,"SELECT * FROM schedule WHERE Schedule_id='$schedule_id'");
$schedule_data=  mysqli_fetch_assoc($schedule);
$available_seat=$schedule_data['Available_seat'];
$count=0;
 $date=date("Y-m-d");

    while ($seats_data=  mysqli_fetch_assoc($seats)){
        $count++;
        $seat_no=$seats_data['Seat_no'];
        $seat=  mysqli_query($connection,"SELECT * FROM seat WHERE Seat_no='$seat_no' AND Schedule_id='$schedule_id'") or die(mysqli_error($connection));
        $seat_data=  mysqli_fetch_assoc($seat);
        $seat_id=$seat_data['Seat_id'];
        $status=$seat_data['Status'];
        if($status=='unreserved'){
        $available_seat=$available_seat-1;
        mysqli_query($connection,"UPDATE schedule SET Available_seat='$available_seat' WHERE Schedule_id='$schedule_id'") or die(mysqli_error($connection));
        mysqli_query($connection,"UPDATE seat SET Status='reserved' WHERE Seat_no='$seat_no' AND Schedule_id='$schedule_id'") or die(mysqli_error($connection));
        // mysqli_query($connection,"DELETE FROM temp_seat WHERE Seat_no='$seat_no' AND Payment_id='$payment_id'") or die(mysqli_error($connection));
        $code= rand(999999, 111111);
        mysqli_query($connection,"INSERT INTO ticket(Customer_id,Schedule_id, Seat_id,Date,Qr_code,Payment_id) VALUES ('$account_id','$schedule_id','$seat_id','$date','$code','$payment_id')") or die(mysqli_error($connection));
        echo "<script>alert('ticket reserved successfuly')</script>"; 
        $ticket=  mysqli_query($connection,"SELECT * FROM ticket WHERE Schedule_id='$schedule_id' AND Seat_id='$seat_id'") or die(mysqli_error($connection));
        $ticket_data=  mysqli_fetch_assoc($ticket);
        $ticket_id=$ticket_data['Ticket_id'];
        header("Location: ../ticket.php?ticket_id=".$ticket_id);
        echo "count = ".$count;
        }else{
            echo "<script>alert('seat already reserved')</script>"; 
            break;
        }
    }
}else if($payment_type=='Recharge balance'){
    $customer=  mysqli_query($connection,"SELECT * FROM customer WHERE Customer_id='$account_id'") or die(mysqli_error($connection));
        $customer_data=  mysqli_fetch_assoc($customer);
        $balance=$customer_data['Balance'];
    $new_balance=$balance+$price;
            mysqli_query($connection,"UPDATE customer SET Balance='$new_balance' WHERE Customer_id='$account_id'") or die(mysqli_error($connection));
            header("Location: ../recharge_success.html?Payment_id=".$payment_id);   
}
}else{
    echo "<script>alert('unknown error occured please contact adminstrator using phone: 0965570891')</script>"; 
}}
?>