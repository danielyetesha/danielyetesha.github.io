<?php
include './Connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gondar cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
</head>

<body>

    <?php
    include 'header_check.php';
    ?>
    <h2 class="text-dark">News</h2>
    <div class="container my-2 px-4">
        <table id="datatablesSimple">
            <?php
                    $news=  mysqli_query($connection,"SELECT * FROM news ORDER BY Date DESC");
                    $num=0;
                    if(mysqli_num_rows($news)>0){
                        while ($news_data=  mysqli_fetch_assoc($news)){
                            $num++;
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
                        <div class="col-md-8">
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
                        </div>

                    </div>
                </td>
            </tr>
            <?php
             
            }
            else{
                echo "<h3 class='text-warning'>the posted employee does not exist</h3>";
            }
        }
    }
    else{
        echo "<h1 class='text-warning'> There is no news</h1>";
    }
    ?>
        </table>
    </div>
    <?php include 'footer.php';?>

</body>

</html>