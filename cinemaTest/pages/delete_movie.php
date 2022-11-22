<!DOCTYPE html>
<html lang="en">

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
$movie_id=$_GET['movie_id'];
$query=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'") or die(mysqli_error($connection));
            $movie_data=  mysqli_fetch_assoc($query);
            $movie_title=  $movie_data['Movie_title'];
            $movie_type=  $movie_data['Movie_type'];
            $movie_description=  $movie_data['Movie_id'];
            $actors=  $movie_data['Movie_id'];
$delete_movie= mysqli_query($connection,"DELETE FROM movies WHERE Movie_id='$movie_id'");
if($delete_movie){
  $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") delete a movie which movie information is : ,   movie title = ".$movie_title." ,  movie type =  ".$movie_type." ,  movie actors = ".$actors." ,  movie description = ".$movie_description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee delete movie','$detail')") or die(mysqli_error($connection));
echo "<script>
swal({
    text: 'movie delete successfully!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_movies.php';
});
</script>";
}
else{
  echo "<script>
swal({
    text: 'YOU CAN NOT DELETE THIS MOVIE BECAUSE IT IS ALREADY SCHEDULED!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='manage_movies.php';
});
</script>";
}
?>