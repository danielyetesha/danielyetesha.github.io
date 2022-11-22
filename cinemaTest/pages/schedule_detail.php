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
    <link rel="stylesheet" href="../style/accordion_for_comment.css">
</head>

<body>
    <?php
    include 'header_check.php';
    ?>
    <section class="p-2">
        <?php
    $schedule_id=$_GET['schedule_id'];
    $schedule=  mysqli_query($connection,"SELECT * FROM schedule Where Schedule_id='$schedule_id'");
    $num=0;
    if(mysqli_num_rows($schedule)==1){
        $schedule_data=  mysqli_fetch_assoc($schedule);
        $movie_id=$schedule_data['Movie_id'];
        $date=$schedule_data['Date'];
        $s_status='';
        $cdate=date("Y-m-d");
        if($cdate>$date){
            $s_status='expired';
        }else{
            $s_status='unexpired';
        }
        $time=$schedule_data['Time'];
        $price=$schedule_data['Price'];
        $no_of_seat=$schedule_data['No_of_seat'];
        $available_seat=$schedule_data['Available_seat'];
    $movie=  mysqli_query($connection,"SELECT * FROM movies Where Movie_id='$movie_id'");
    if(mysqli_num_rows($movie)==1){
        $movie_data=  mysqli_fetch_assoc($movie);
        $movie_title=$movie_data['Movie_title'];
        $movie_type=$movie_data['Movie_type'];
        $movie_posture=$movie_data['Movie_posture'];
        $movie_trailer=$movie_data['Trailer'];
        $movie_length=$movie_data['Movie_length'];
        ?>
        <div class=" my-2">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <video width="100%" height="400" controls>
                    <source src="../video/<?php echo $movie_trailer?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class=" my-3">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="../img/movie/<?php echo $movie_posture?>" alt="..." height="400px"
                        class="card-img-top mb-5 mb-md-0">
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">
                        <?php echo $movie_title; ?>
                    </h1>
                    <h2 class="display-5">
                        <?php echo $movie_type; ?>
                    </h2>
                    <h3 class="display-7">
                        duration : <?php echo $movie_length; ?>
                    </h3>
                    <h3 class="display-7">
                        Date : <?php echo $date; ?>
                    </h3>
                    <h3 class="display-7">
                        Time : <?php echo $time; ?>
                    </h3>
                    <h3 class="display-7">
                        Price : <?php echo $price; ?>
                    </h3>
                    <h3 class="display-7">
                        Number of seat allowed : <?php echo $no_of_seat; ?>
                    </h3>
                    <?php
                    if($s_status=='unexpired'){
                    ?>
                    <h3 class="display-7">
                        Number of available seat : <?php echo $available_seat; ?>
                    </h3>
                    <div class="d-flex">
                        <a href="seats.php?schedule_id=<?php echo $schedule_id ?>&price=<?php echo $price ?>"
                            class="btn btn-outline-danger flex-shrink-0" type="submit">
                            <i class="bi-chart-fill me-1">Reserve</i></a>
                    </div>
                    <?php
                    }else{
                    ?>
                    <h3 class="display-7">
                        <?php echo $no_of_seat-$available_seat; ?> persons show this schedule
                    </h3>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class=" bg-light">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-10">
                    <div class="">
                        <div class="p-3">
                            <h6>Comments</h6>
                        </div>
                        <?php
                        if(isset( $_SESSION['username']) && ($_SESSION['account_type']=="customer")){
                            ?>
                        <form action="add_comment_in_schedule.php" method="post">
                            <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                                <img src="../img/profile/<?php echo $_SESSION['profile_pic']?>" width="50"
                                    class="rounded-circle mr-4">
                                <input type="text" class="form-control" name="text_comment"
                                    placeholder="Enter your comment...">
                                <input type="hidden" class="form-control" name="movie_id"
                                    value="<?php echo $movie_id?>">
                                <input type="hidden" class="form-control" name="schedule_id"
                                    value="<?php echo $schedule_id?>">
                                <input type="submit" value="submit" name="add_comment" class="btn btn-primary ml-3">
                            </div>
                        </form>
                        <?php } ?>
                        <div class="mt-2">
                            <?php
                            $comment=  mysqli_query($connection,"SELECT * FROM comment WHERE Movie_id='$movie_id'");
                    $count_comment=mysqli_num_rows($comment);
                    if($count_comment>0){
                        while ($comment_data=  mysqli_fetch_assoc($comment)){
                            $comment_id=$comment_data['Comment_id'];
                            $customer_id=$comment_data['Customer_id'];
                            $date=$comment_data['Date'];
                            $movie_id=$comment_data['Movie_id'];
                            $comment_description=$comment_data['Comment_description'];
                            $customer=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$customer_id'");
                            if(mysqli_num_rows($customer)>0){
                                $customer_data=  mysqli_fetch_assoc($customer);
                                $first_name=$customer_data['First_name'];
                                $last_name=$customer_data['Last_name'];
                                $profile=$customer_data['Profile_pic'];
                                // $movie_posture=$movie_data['Movie_posture'];
                                ?>
                            <div class="d-flex flex-row p-3 accordion-item"> <img
                                    src="../img/profile/<?php echo $profile?>" width="40" height="40"
                                    class="rounded-circle mr-3">
                                <div class="w-100">
                                    <div class="accordion-item-header">

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center"> <span
                                                    class="mr-2"><?php echo $first_name." ".$last_name;?></span>
                                            </div>
                                            <small><?php echo $date?></small>
                                        </div>
                                        <p class="text-justify comment-text mb-0"><?php echo $comment_description?></p>
                                        <?php
                                    
                                    $replay=  mysqli_query($connection,"SELECT * FROM replay WHERE Comment_id='$comment_id'");
                                    $num=0;
                                    $count_replay=mysqli_num_rows($replay);
                                    ?>
                                        <div class="d-flex flex-row user-feed"></i><?php echo $count_replay;?></span>
                                            <span class="ml-3"><i class="fa fa-comments-o mr-2"></i>Reply</span>
                                        </div>
                                    </div>
                                    <!-- replay start -->
                                    <div class="accordion-item-body">

                                        <?php
                                        if(isset( $_SESSION['username']) && ($_SESSION['account_type']=="customer")){
                                            ?>
                                        <form action="add_replay.php" method="post">
                                            <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                                                <img src="../img/profile/<?php echo $_SESSION['profile_pic']?>"
                                                    width="50" class="rounded-circle mr-4">
                                                <input type="text" class="form-control" name="text_comment"
                                                    placeholder="Enter your comment...">
                                                <input type="hidden" class="form-control" name="comment_id"
                                                    value="<?php echo $comment_id?>">
                                                <input type="hidden" class="form-control" name="schedule_id"
                                                    value="<?php echo $schedule_id?>">
                                                <input type="submit" value="submit" name="add_replay"
                                                    class="btn btn-primary ml-3">
                                            </div>
                                        </form>
                                        <?php } ?>
                                        <?php
                                        if($count_comment>0){
                                            while ($replay_data=  mysqli_fetch_assoc($replay)){
                                                $num++;
                                                $replay_id=$replay_data['Replay_id'];
                                                $desc=$replay_data['Replay'];
                                                $no_like=$replay_data['No_like'];
                                                $customer_id1=$replay_data['Customer_id'];
                                                $date1=$replay_data['Date'];
                                                $customer1=  mysqli_query($connection,"SELECT * FROM account WHERE Account_id='$customer_id1'");
                                                if(mysqli_num_rows($customer1)>0){
                                                    $customer_data1=  mysqli_fetch_assoc($customer1);
                                                    $first_name1=$customer_data1['First_name'];
                                                    $last_name1=$customer_data1['Last_name'];
                                                    $profile1=$customer_data1['Profile_pic'];
                                                    ?>
                                        <div class="d-flex flex-row p-3"> <img
                                                src="../img/profile/<?php echo $profile1?>" width="40" height="40"
                                                class="rounded-circle mr-3">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex flex-row align-items-center"> <span
                                                            class="mr-2"><?php echo $first_name1." ".$last_name1;?></span>
                                                    </div>
                                                    <small><?php echo $date1?></small>
                                                </div>
                                                <p class="text-justify comment-text mb-0"><?php echo $desc?></p>
                                            </div>
                                        </div>
                                        <?php
              
                                                    }else{
                                                        echo "<h1 class='text-warning'> customer information does not found</h1>";
                                                    }
                                                }
                                            }
                                        ?>
                                        <!-- replay end -->
                                    </div>
                                </div>
                            </div>
                            <?php
              
            }else{
                echo "<h1 class='text-warning'> customer information does not found</h1>";
            }
        }
    }else{
        echo "<h1 class='text-warning'>there is no comment</h1>";
    }
        }else{
                  echo "<h3 class='text-warning'> movie does not found</h3>";
                }
              }else{
                  echo "<h3 class='text-warning'> schedule does not found</h3>";
                }

    ?>
                        </div>
                    </div>
                </div>
            </div>
            <table id="datatablesSimple">
                <tbody class="row  px-4 px-lg-5 pt-4 gy-3 text-white">
                    <?php
                    $schedule=  mysqli_query($connection,"SELECT * FROM schedule");
                    if(mysqli_num_rows($schedule)>0){
                        while ($schedule_data=  mysqli_fetch_assoc($schedule)){
                            $schedule_id1=$schedule_data['Schedule_id'];
                            $date=$schedule_data['Date'];
                            $movie_id=$schedule_data['Movie_id'];
                            $s_status='';
                            $cdate=date("Y-m-d");
                            if($cdate>$date){
                                $s_status='expired';
                            }else{
                                $s_status='unexpired';
                            }
                    $movies=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                    $num=0;
                    $movie_data=  mysqli_fetch_assoc($movies);
                            $num++;
                            $movie_id=$movie_data['Movie_id'];
                            $movie_title=$movie_data['Movie_title'];
                            $movie_type=$movie_data['Movie_type'];
                            $movie_posture=$movie_data['Movie_posture'];
                          $active='';
                          if($num==1){
                            $active="active";
                          }
                                ?>
                    <tr style="display:inline;" class="col-sm-6 col-md-3 col-lg-3">
                        <td class="card" style="<?php if($s_status=='expired'){echo 'background-color: coral;';} ?>">
                            <img class="card-img-top" src="../img/movie/<?php echo $movie_posture?>" height="200px"
                                alt="image" />
                            <div class="card-body text-dark">
                                <span class="card-title text-primary"><?php echo $movie_title?></span>
                                <p class="card-text">
                                    type: <?php echo $movie_type?>
                                </p>
                                <?php
                                if($s_status=='expired'){ ?>
                                <p class="card-text">expried
                                </p>
                                <a href="schedule_detail.php?schedule_id=<?php echo $schedule_id1 ?>" name="detail"
                                    class="btn btn-secondary">Watch Schedule History</a>
                                <?php }else{?>
                                <p class="card-text"><?php echo $date;?>
                                </p>
                                <a href="schedule_detail.php?schedule_id=<?php echo $schedule_id1 ?>" name="detail"
                                    class="btn btn-primary">Reserve Now</a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>

                    <?php
             
        }
    }
    else{
        echo "<h1 class='text-warning'> There is no schedule</h1>";
    }
    ?>
                </tbody>
            </table>
    </section>
    <?php include 'footer.php';?>
    <script src="../js/accordion.js"></script>

</body>

</html>