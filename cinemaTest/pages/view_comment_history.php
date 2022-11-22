<?php
 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <title>Gondar cinema</title>
</head>

<body>
    <?php
        include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='customer'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="mx-5">
        <div class="p-2">
            <h1 class="m-3 text-center" style="font-weight: bold; font-size:30px;">COMMENT HISTORY</h1>
        </div>
        <table id="datatablesSimple">
            <tbody>
                <?php
            $customer_id=$_SESSION['account_id'];
            $comment=  mysqli_query($connection,"SELECT * FROM comment WHERE Customer_id='$customer_id'");
            if(mysqli_num_rows($comment)>0){
                while ($comment_data=  mysqli_fetch_assoc($comment)){
                    $comment_id=$comment_data['Comment_id'];
                    $date=$comment_data['Date'];
                    $movie_id=$comment_data['Movie_id'];
                    $description=$comment_data['Comment_description'];
                    $movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                    if(mysqli_num_rows($movie)>0){
                        $movie_data=  mysqli_fetch_assoc($movie);
                        $movie_title=$movie_data['Movie_title'];
                        $posture=$movie_data['Movie_posture'];
        ?>
                <tr class="row d-flex justify-content-center">
                    <td>
                        <div class="row m-4 gx-4 gx-lg-5 align-items-center shadow bg-light p-3 w-100">
                            <div class="col-auto m-0 p-0">
                                <img src="../img/profile/<?php echo $_SESSION['profile_pic']; ?>"
                                    class="rounded-circle m-3" width="50px" height="50px" alt="pp" />
                            </div>
                            <div class="col-10 position-relative">
                                <h3>DATE: <?php echo $date?></h3>
                                <h3 class="position-absolute top-0 end-0 mx-4 text-primary"><?php echo $movie_title?>
                                </h3>
                                <p class="lead">
                                    <?php echo $description?>
                                </p>

                                <a href="delete_customer_comment.php?comment_id=<?php echo $comment_id ?>"
                                    onclick="return confirm('are you sure you want to delete this item')"
                                    class="btn btn-outline-danger btn-sm position-absolute bottom-0 end-0 mx-4"><i
                                        class="fa-solid fa-trash-can"></i><em>delete</em></a>

                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }else{
                        echo "<h1 class='text-warning'> movie does not found</h1>";
                    }
                }
            }else{
                echo "<h1 class='text-warning text-center'> empty comment history</h1>";
            }
    ?>
            </tbody>
        </table>
        <?php include 'footer.php';?>
</body>

</html>