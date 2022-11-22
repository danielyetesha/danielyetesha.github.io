<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/sweetalert.min.js"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php
include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
include 'connection.php';
$schedule_id=$_GET['schedule_id'];
 $movie=  mysqli_query($connection,"SELECT * FROM schedule Where Schedule_id='$schedule_id'");
    $num=0;
    if(mysqli_num_rows($movie)==1){
        $movie_data=  mysqli_fetch_assoc($movie);
        $movie_id=$movie_data['Movie_id'];
        $date=$movie_data['Date'];
        $time=$movie_data['Time'];
        $price=$movie_data['Price'];
        $no_of_seat=$movie_data['No_of_seat'];
        $available_seat=$movie_data['Available_seat'];

$delete_schedule= mysqli_query($connection,"DELETE FROM schedule WHERE Schedule_id='$schedule_id'");
if($delete_schedule){
               $update_query="UPDATE movies SET Is_scheduled='0' WHERE Movie_id='$movie_id' ";

$result=  mysqli_query($connection,$update_query) or die(mysqli_error($connection));

$action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") delete a schedule which has schedule information of : ,  schedule date : ".$date." ,  schedule time : ".$time." ,   price = ".$price." ,  number of seat =  ".$no_of_seat." ,  number of available seat =  ".$available_seat;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee delete schedule','$detail')") or die(mysqli_error($connection));
echo "<script>
swal({
    text: 'schedule delete successfully!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_schedule.php';
});
</script>";
}
else{
echo "<script>
swal({
    text: 'THE SCHEDULE IS ALREADY IN USED SO YOU CAN NOT DELETE IT',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='manage_schedule.php';
});
</script>";
}
}
?>