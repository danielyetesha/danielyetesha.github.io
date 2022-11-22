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
    <link rel="stylesheet" href="../style/fontawesome-free-6.1.1-web/css/all.css" />
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>


    <title>Gondar cinema</title>
</head>

<body>
    <?php
    include 'header_check.php';
    
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <div class="p-2">
        <h1 class="m-3 text-center" style="font-weight: bold;">MANAGE SCHEDULE</h1>

        <div class="m-3 text-center">
            <a href="add_schedule.php"> <button class="btn btn-lg btn-primary"> <i class="fa-solid fa-plus"></i> Add
                    Schedule</button></a>
        </div>

        <div class="p-3" id="no-more-tables">

            <table class="table table-striped" id="datatablesSimple">
                <thead class="table-dark">
                    <th scope="col">NO</th>
                    <th scope="col"></th>
                    <th scope="col">MOVIE TITLE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">TIME</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">NUMBER OF SEAT</th>
                    <th scope="col">AVAILABLE SEAT</th>
                    <th scope="col" class="text-center" colspan="3">MANAGE</th>
                </thead>
                <tbody class="table-light">
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
                    <tr>
                        <th data-title="NO"><?php echo $num; ?></th>
                        <td class="m-0 p-0" data-title="Posture"><img src='../img/movie/<?php echo $movie_posture; ?>'
                                width='100px' height='100px' alt='pic' /></td>
                        <td data-title="Movie title"><?php echo $movie_title; ?></td>
                        <td data-title="Date"><?php echo $date; ?></td>
                        <td data-title="Time"><?php echo $time; ?></td>
                        <td data-title="Price"><?php echo $price; ?></td>
                        <td data-title="No of seat"><?php echo $no_of_seat; ?></td>
                        <td data-title="Available seat"><?php echo $available_seat; ?></td>

                        <td data-title="Detail">
                            <form action="view_schedule.php" method="POST" style="display: inline">
                                <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                                <input type="submit" value="view" name="view_schedule" class="btn btn-info" />
                            </form>
                        </td>
                        <td data-title="Edit">
                            <form action="edit_schedule.php" method="POST" style="display: inline">
                                <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                                <input type="submit" value="manage" name="manage" class="btn btn-primary" />
                            </form>
                        </td>
                        <td data-title="Delete">

                            <a href="delete_schedule.php?schedule_id=<?php echo $schedule_id; ?>" type="submit"
                                name="delete" class="btn"
                                onclick="return confirm('are you sure you want to delete this schedule')">
                                <span style=" color: Tomato;">
                                    <i class="fa-solid fa-trash-can fa-xl"></i>
                                </span>
                            </a>

                        </td>
                    </tr>

                    <?php

        }
        }
    }else{
            echo "<h1 class='text-warning'> Schedule does not found</h1>";
        }
?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/sweetalert.min.js"></script>

    <?php include 'footer.php';?>
</body>

</html>