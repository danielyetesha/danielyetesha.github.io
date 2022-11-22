<?php
session_start();
include 'connection.php';

if(isset($_POST['add_replay'])){
    $comment_id=$_POST['comment_id'];
    $schedule_id=$_POST['schedule_id'];
    $replay=$_POST['text_comment'];
    $account_id=$_SESSION['account_id'];
    $replay_query="INSERT INTO replay(Comment_id,Customer_id,No_like,Replay) VALUES ('$comment_id','$account_id','0','$replay')";
    $result = mysqli_query($connection,$replay_query) or die(mysqli_error($connection));
    if(!$result){
        echo "<script>swal('ERROR','FAILD TO ADD MOVIE','error');</script>";
    }else{
        $detail= $_SESSION['account_type']." whose account id is ". $account_id ." and name ".$_SESSION['username']." replay the message for comment id ".$comment_id.". and the replay say that -- ".$replay." --";
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$account_id','Customer replay for comment','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));
 header('location: schedule_detail.php?schedule_id='.$schedule_id);
    }
}

?>