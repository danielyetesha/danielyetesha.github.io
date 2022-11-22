<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/sweetalert.min.js"></script>
    <title>Gondar Cinema</title>
</head>

<body>

</body>

</html>
<?php
include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
include 'connection.php';
$comment_id=$_GET['comment_id'];
$delete_comment= mysqli_query($connection,"SELECT * FROM contact_us WHERE Contact_id='$comment_id'") or die(mysqli_error($connection));
            $feedback_data=  mysqli_fetch_assoc($delete_comment);
            $name = $feedback_data['First_name'].' '.$feedback_data['Last_name'];
            $date = $feedback_data['Date'];
            $subject = $feedback_data['Subject'];
            $message = $feedback_data['Message'];
$delete_comment= mysqli_query($connection,"DELETE FROM contact_us WHERE Contact_id='$comment_id'") or die(mysqli_error($connection));
if($delete_comment){
     $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") delete a ".$name."s feedback for the system the feedback was created at ".$date." and it has :  ,   subject = ".$subject."  ,  feedback description =  ".$message;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Delete customer feedback','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

echo "<script>
swal({
    text: 'comment deleted successfuly!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='view_comment.php';
});
</script>";
}
else{
    
    echo " <script>
    swal({
    text: 'deletion failed!!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='view_comment.php';
});
</script>";
}


?>