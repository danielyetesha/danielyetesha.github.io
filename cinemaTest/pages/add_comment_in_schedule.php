<?php
session_start();
include 'connection.php';

if(isset($_POST['add_comment'])){
    $comment=$_POST['text_comment'];
    $movie_id=$_POST['movie_id'];
    $schedule_id=$_POST['schedule_id'];
    $account_id=$_SESSION['account_id'];
    $movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
    $movie_data=  mysqli_fetch_assoc($movie);
    $movie_title=$movie_data['Movie_title'];
    $comment_query="INSERT INTO comment(Customer_id,Movie_id,Comment_description) VALUES ('$account_id','$movie_id','$comment')";
    
    $result = mysqli_query($connection,$comment_query) or die(mysqli_error($connection));
    if(!$result){
        $detail= $_SESSION['account_type']." whose account id is ". $account_id ." and name is ".$_SESSION['username']." commented on the movie title called ".$movie_title.". and the comment say that -- ".$comment." --";
    mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$account_id','Comment on movie','$detail')") or die(mysqli_error($connection));
        echo "<script>swal('ERROR','FAILD TO ADD MOVIE','error');</script>";
    }else{
 header('location: schedule_detail.php?schedule_id='.$schedule_id);
    }
}

?>