<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar Cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

    <link rel="stylesheet" href="../style/card_in_schedule.css">
</head>

<body>

    <?php
    include 'header_check.php';
    ?>
    <div class="p-2">
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
                <div class="card text-center m-4">
                    <img src='../img/movie/<?php echo $movie_posture; ?>' alt="...">
                    <div class="info">
                        <h1><?php echo $movie_title; ?></h1>
                        <h4><?php echo $date; ?></h4>
                        <h4><?php echo $time; ?></h4>
                        <h4><?php echo $price; ?></h5>
                            <h4><?php echo $available_seat; ?> seats are available</h4>
                            <a href="check_ticket.php?schedule_id=<?php echo $schedule_id ?>" type="submit"
                                name="check_ticket" class="btn">
                                <i class="fa-solid fa-eye fa-5x"></i>
                                <p>view</p>
                            </a>
                    </div>
                </div>
                <?php

        }
        }
    }else{
            echo "<h1 class='text-warning'> Schedule does not found</h1>";
        }
?>
            </div>
        </div>
    </div>

</body>

</html>