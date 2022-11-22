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
    <link rel="stylesheet" href="../style/card_in_schedule.css">
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</head>

<body>
    <?php
    include 'header_check.php';
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="p-2">
        <h1 class="m-3 text-center" style="font-weight: bold;">TICKET FOR SCHEDULES</h1>
        <div class="p-3">
            <div class="wrapper">
                <?php
                    $schedule=  mysqli_query($connection,"SELECT * FROM schedule");
                    $num=0;
                     if(mysqli_num_rows($schedule)>0){
        while ($schedule_data=  mysqli_fetch_assoc($schedule)){
             $num++;
             $schedule_id=$schedule_data['Schedule_id'];
             $movie_id=$schedule_data['Movie_id'];
             $date=$schedule_data['Date'];
             $time=$schedule_data['Time'];
             $price=$schedule_data['Price'];
             $no_of_seat=$schedule_data['No_of_seat'];
             $available_seat=$schedule_data['Available_seat'];
              $find_movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
            if(mysqli_num_rows($find_movie)>0){
                $movie_data=  mysqli_fetch_assoc($find_movie);
                $movie_title=$movie_data['Movie_title'];
                $movie_posture=$movie_data['Movie_posture'];
     ?>
                <div class="card text-center">
                    <img src='../img/movie/<?php echo $movie_posture; ?>' alt="...">
                    <div class="info">
                        <h1><?php echo $movie_title; ?></h1>
                        <h4><?php echo $date; ?></h4>
                        <h4><?php echo $time; ?></h4>
                        <h4><?php echo $price; ?></h5>
                            <h4><?php echo $available_seat; ?> seats are available</h4>
                            <form action="view_schedule_ticket.php" method="POST" class="text-center">
                                <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                                <button type="submit" name="view_ticket" class="btn">
                                    <i class="fa-solid fa-eye fa-5x"></i>
                                    <p>view</p>
                                </button>
                            </form>
                    </div>
                </div>
                <?php

        }
        }
    }else{
            echo "Schedule does not found";
        }
?>
            </div>
        </div>
    </div>

    <script src="../js/sweetalert.min.js"></script>

    <?php include 'footer.php';?>
</body>

</html>