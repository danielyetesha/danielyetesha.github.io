<?php
 
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap-5.0.2-dist/css/bootstrap.css" />
    <title>Gondar cinema</title>
    <link rel="stylesheet" href="../style/comment.css">
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='admin'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <section class="content-item" id="comments">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    $comment=  mysqli_query($connection,"SELECT * FROM contact_us");
                    $count_comment=mysqli_num_rows($comment);
                    if($count_comment>0){
?>
                    <h3><?php echo $count_comment; ?> Feedback from customer</h3>
                    <?php
                        while ($comment_data=  mysqli_fetch_assoc($comment)){
                            $comment_id=$comment_data['Contact_id'];
                            $first_name=$comment_data['First_name'];
                            $last_name=$comment_data['Last_name'];
                            $email_address=$comment_data['Email_address'];
                            $subject=$comment_data['Subject'];
                            $message=$comment_data['Message'];
                            $date=$comment_data['Date'];
                                ?>
                    <div class="media position-relative">
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $first_name. " ". $last_name?></h4>
                            <h5><?php Movie : echo $email_address?></h5>
                            <h5><?php Subject : echo $subject?></h5>
                            <p>
                                <?php echo $message?>
                            </p>
                            <ul class="list-unstyled list-inline media-detail pull-left">
                                <li><i class="fa fa-calendar"></i><?php echo $date?></li>
                            </ul>
                            <a href="delete_comment.php?comment_id=<?php echo $comment_id ?>"
                                onclick="return confirm('are you sure you want to delete the feedback')"
                                class="btn btn-outline-danger btn-sm position-absolute bottom-0 end-0 mx-4"><i
                                    class="fa-solid fa-trash-can"></i><em>delete</em></a>
                        </div>
                    </div>
                    <?php
                        }       
    }else{
        echo "<h1 class='text-warning'>there is no feedback</h1>";
    }
    ?>


                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php';?>
</body>

</html>