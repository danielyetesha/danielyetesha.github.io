<?php
include 'connection.php';
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <h1 class="m-3 text-center" style="font-weight: bold;">MANAGE NEWS</h1>

    <div class="m-3 text-center">
        <a href="add_news.php"> <button class="btn btn-lg btn-primary"> <i class="fa-solid fa-plus"></i> Add
                News</button></a>
    </div>

    <div class="container my-2 px-4">
        <table id="datatablesSimple">
            <?php
$news=  mysqli_query($connection,"SELECT * FROM news");
                    $num=0;
                    if(mysqli_num_rows($news)>0){
                        while ($news_data=  mysqli_fetch_assoc($news)){
                            $num++;
                            $news_id=$news_data['News_id'];
                            $headline=$news_data['Headline'];
                            $news_pic=$news_data['Picture'];
                            $description=$news_data['Description'];
                            $date=$news_data['Date'];
                            $employee_id=$news_data['Employee_id'];
                          $employee=mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$employee_id'");
                          if(mysqli_num_rows($employee)){
                            $employee_data= mysqli_fetch_assoc($employee);
                            $profile_pic=$employee_data['Profile_pic'];
                            $username=$employee_data['Username'];
     
     ?>
            <tr>
                <td>
                    <div class="row m-4 gx-4 gx-lg-5 align-items-center shadow bg-light rounded">
                        <div class="col-md-4 m-0 p-0">
                            <img src="../img/<?php echo $news_pic?>" class="card-img-top m-0" height="250px"
                                widht="300px" alt="message from">
                        </div>
                        <div class="col-md-8 position-relative">
                            <div class="row">
                                <div class="col-3">
                                    <img src="../img/profile/<?php echo $profile_pic?>" class="rounded-circle"
                                        height="70px" widht="70px" alt="message from">
                                </div>
                                <div class="col">
                                    <h3>DATE: <?php echo $date?></h3>
                                    <h4>headline: <?php echo $headline?></h4>
                                </div>
                            </div>
                            <p class="lead">
                                <?php echo $description?>
                            </p>
                            <div class="position-absolute bottom-0 end-0 mx-4">
                                <form action="edit_news.php" method="POST" style="display: inline">
                                    <input type="hidden" name="news_id" value="<?php echo $news_id ?>" />
                                    <button type="submit" name="edit_news" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-pencil-alt"></i><em>edit</em></button>
                                </form>
                                <a href="delete_news.php?news_id=<?php echo $news_id ?>" type="submit"
                                    onclick="return confirm('are you sure you want to delete this news')"
                                    name="delete_news" class="btn btn-outline-danger btn-sm"><i
                                        class="fa-solid fa-trash-can"></i><em>delete</em></a>
                            </div>
                        </div>

                    </div>
                    <!--Section: News of the day-->

                </td>
            </tr>

            <?php

        }
        }}
        else{
            echo "<h1 class='text-warning'> Movie does not found</h1>";
        }
?>
        </table>

        <script src="../js/sweetalert.min.js"></script>

        <?php include 'footer.php';?>
</body>

</html>