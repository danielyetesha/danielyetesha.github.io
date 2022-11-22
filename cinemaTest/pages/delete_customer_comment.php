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
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
include 'connection.php';

$comment_id=$_GET['comment_id'];
$query=  mysqli_query($connection,"SELECT * FROM comment WHERE Comment_id='$comment_id'") or die(mysqli_error($connection));
            $comment_data=  mysqli_fetch_assoc($query);
            $description=  $comment_data['Comment_description'];
            $date=  $comment_data['Date'];
            $movie_id=  $comment_data['Movie_id'];
            $query1=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'") or die(mysqli_error($connection));
            $movie_data=  mysqli_fetch_assoc($query1);
            $title=  $movie_data['Movie_title'];
$delete_comment= mysqli_query($connection,"DELETE FROM comment WHERE Comment_id='$comment_id'") or die(mysqli_error($connection));
if($delete_comment){
     $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") delete his comment on movie title = ".$title."the comment was created at ".$date." and it says :  ,   comment = ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Customer delete his Comment','$detail')") or die(mysqli_error($connection)) or die(mysqli_error($connection));

echo "<script>
swal({
    text: 'comment delete successfully!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='view_comment_history.php';
});
</script>";
}
else{
echo " <script>
swal('error','deletion failed!', 'error').then(function(){
window.location='view_comment_history.php';
});
</script>";
}

?>