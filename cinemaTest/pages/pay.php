<?php
session_start();
require "connection.php";
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;
 $account_id=$_SESSION['account_id'];
 $schedule_id='';
 $price=0;
 $quantity=0;
 $name='';  
 $date=date("Y-m-d");
 $time=date("h:i:sa");
 $payment_id='';
if(isset($_POST['pay_for_seat'])){
	 $schedule_id=$_POST['schedule_id'];
 $price=$_POST['price'];
 $quantity=$_POST['count'];
 $name=$_POST['movie_title']; 
 $pay_query="INSERT INTO payment(Type,Schedule_id,Pay_with,Customer_id,Date,Time,Status,Price) VALUES ('Reserve_Seat','$schedule_id','Yene Pay','$account_id','$date','$time','pending','$price')";
 $result=  mysqli_query($connection,$pay_query) or die(mysqli_error($connection));
	 if(!$result){
		 echo "<script>swal('ERROR','FAILD TO PAYMENT PROCESS','error');</script>";
	 }else{
 $pay=  mysqli_query($connection,"SELECT * FROM payment WHERE Date='$date' AND Time='$time' AND Customer_id='$account_id'") or die(mysqli_error($connection));
 $payment_data=  mysqli_fetch_assoc($pay);
 $payment_id=$payment_data['Payment_id'];
 foreach($_POST['seat'] as $seat) {
		 $seats_store=  mysqli_query($connection,"INSERT INTO temp_seat(Payment_id,Seat_no) VALUES ('$payment_id','$seat')");
 }
}
}
if(isset($_POST['recharge_balance'])){
 $price=$_POST['price'];
 $quantity=1;
 $name='Rcharge balance'; 
 $pay_query="INSERT INTO payment(Type,Pay_with,Customer_id,Date,Time,Status,Price) VALUES ('Recharge balance','Yene Pay','$account_id','$date','$time','pending','$price')";
 $result=  mysqli_query($connection,$pay_query) or die(mysqli_error($connection));
	 if(!$result){
		 echo "<script>swal('ERROR','FAILD TO PAYMENT PROCESS','error');</script>";
	 }else{
 $pay=  mysqli_query($connection,"SELECT * FROM payment WHERE Date='$date' AND Time='$time' AND Customer_id='$account_id'") or die(mysqli_error($connection));
 $payment_data=  mysqli_fetch_assoc($pay);
 $payment_id=$payment_data['Payment_id'];
	 }
	}
echo __DIR__;
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/CheckoutHelper.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/CheckoutOptions.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/CheckoutItem.php');


require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/CheckoutHelper.php');
require_once(__DIR__ .'/vendor/yenepay/php-sdk/src/Models/IPN.php');

// $add = $_SERVER['SERVER_ADDR'];
	$sellerCode = "14428";
	$successUrl = "http://localhost/cinematest/pages/payment/success.php"; //"YOUR_SUCCESS_URL";
	$cancelUrl = "http://localhost/cinematest/pages/payment/cancel.php"; //"YOUR_CANCEL_URL";
	$ipnUrl = "https://localhost/cinematest/pages/ipn.php"; //"YOUR_IPN_URL";
	$useSandbox = false; // set this to false if you are on production environment

	$checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
	$checkoutOptions -> setSuccessUrl($successUrl);
	$checkoutOptions -> setCancelUrl($cancelUrl);
	$checkoutOptions -> setIPNUrl($ipnUrl);
	$checkoutOptions -> setMerchantOrderId($payment_id);
	$checkoutOrderItem = new CheckoutItem($name, $price, $quantity);
	if(isset($_POST["payment_id"]))
	{
		$checkoutOrderItem  -> setId($payment_id);
	}
	if(isset($_POST["DeliveryFee"]))
	{
		$checkoutOrderItem  -> setDeliveryFee($_POST["DeliveryFee"]);
	}
	if(isset($_POST["Tax1"]))
	{
		$checkoutOrderItem  -> setTax1($_POST["Tax1"]);
	}
	if(isset($_POST["Tax2"]))
	{
		$checkoutOrderItem  -> setTax2($_POST["Tax2"]);
	}
	if(isset($_POST["Discount"]))
	{
		$checkoutOrderItem  -> setDiscount($_POST["Discount"]);
	}
	if(isset($_POST["HandlingFee"]))
	{
		$checkoutOrderItem  -> setHandlingFee($_POST["HandlingFee"]);
	}
	
	$checkoutHelper = new CheckoutHelper();
	$checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);

	header("Location: " . $checkoutUrl);

?>