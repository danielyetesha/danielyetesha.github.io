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
$news_id=$_GET['news_id'];
$query=  mysqli_query($connection,"SELECT * FROM news WHERE News_id='$news_id'") or die(mysqli_error($connection));
            $news_data=  mysqli_fetch_assoc($query);
            $employee_id=  $news_data['Employee_id'];
            $headline=  $news_data['Headline'];
            $description=  $news_data['Description'];
            $date=  $news_data['Date'];
$delete_news= mysqli_query($connection,"DELETE FROM news WHERE News_id='$news_id'") or die(mysqli_error($connection));
if($delete_news){
    $action_performer=$_SESSION['account_id'];
$detail= $_SESSION['account_type']."(".$_SESSION['username'].") delete a news which has released by employee id ".$employee_id." ,  with news information :  ,   Headline = ".$headline." ,  full description =  ".$description;
mysqli_query($connection,"INSERT INTO log_file(Account_id,Action,Detail) VALUES ('$action_performer','Employee delete news','$detail')") or die(mysqli_error($connection));
echo "<script>
swal({
    text: 'News delete successfully!',
    icon: 'success',
    button: 'ok',
}).then(function(){
window.location='manage_news.php';
});
</script>";
}
else{
echo "<script>
swal({
    text: 'delete failed!',
    icon: 'error',
    button: 'ok',
}).then(function(){
window.location='manage_news.php';
});
</script>";
}
?>