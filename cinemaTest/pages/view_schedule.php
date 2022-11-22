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
if(!(isset($_SESSION['username'])&&($_SESSION['account_type']=='employee'))){
        echo "<script>window.location.href='page_not_allowed.php';</script>";
    }
    ?>
    <section class="p-3">
        <?php
    if(isset($_POST['view_schedule'])){
    $schedule_id=$_POST['schedule_id'];
    $schedule=  mysqli_query($connection,"SELECT * FROM schedule Where Schedule_id='$schedule_id'");
    $num=0;
    if(mysqli_num_rows($schedule)==1){
        $schedule_data=  mysqli_fetch_assoc($schedule);
        $movie_id=$schedule_data['Movie_id'];
        $date=$schedule_data['Date'];
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
        $movie_length=$movie_data['Movie_length'];
        ?>

        <a href="manage_schedule.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                class="fa-solid fa-arrow-left"></i></a>
        <div class="container px-4 px-lg-5 my-3">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="../img/movie/<?php echo $movie_posture?>" alt="..." height="450px"
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
                    <h3 class="display-7">
                        Number of available seat : <?php echo $available_seat; ?>
                    </h3>
                    <div class="d-flex">
                        <a href="delete_schedule.php?schedule_id=<?php echo $schedule_id ?>"
                            class="btn btn-outline-danger flex-shrink-0" type="submit" name="delete">
                            <i class="bi-chart-fill me-1">Delete schedule</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }else{
                  echo "<h3 class='text-warning'> movie does not found</h3>";
                }
              }else{
                  echo "<h3 class='text-warning'> schedule does not found</h3>";
                }
            }else if(isset($_POST['view_schedule_movie'])){
    $movie_id=$_POST['movie_id'];
    $movie=  mysqli_query($connection,"SELECT * FROM movies Where Movie_id='$movie_id'");
    if(mysqli_num_rows($movie)==1){
        $movie_data=  mysqli_fetch_assoc($movie);
        $movie_title=$movie_data['Movie_title'];
        $movie_type=$movie_data['Movie_type'];
        $movie_posture=$movie_data['Movie_posture'];
        $movie_length=$movie_data['Movie_length'];
    $schedule=  mysqli_query($connection,"SELECT * FROM schedule Where Movie_id='$movie_id'");
    $num=0;
        if(($count=mysqli_num_rows($schedule))>0){
            ?><a href="manage_movies.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                class="fa-solid fa-arrow-left"></i></a>
        <h3 class="text-center"><?php echo $movie_title?> have <?php echo $count?> schedule</h3><?php
            while ($schedule_data=mysqli_fetch_assoc($schedule)){
            $num++;
        $schedule_id=$schedule_data['Schedule_id'];
        $date=$schedule_data['Date'];
        $time=$schedule_data['Time'];
        $price=$schedule_data['Price'];
        $no_of_seat=$schedule_data['No_of_seat'];
        $available_seat=$schedule_data['Available_seat'];
         $active='';
                          if($num==1){
                            $active="active";
                          }
                ?>
        <div class="container px-4 px-lg-5 my-3">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="../img/movie/<?php echo $movie_posture?>" alt="..." height="450px"
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
                    <h3 class="display-7">
                        Number of available seat : <?php echo $available_seat; ?>
                    </h3>
                    <div class="d-flex">
                        <form action="manage_schedule.php" method="POST" style="display: inline">
                            <input type="hidden" name="schedule_id" value="<?php echo $schedule_id ?>" />
                            <button class="btn btn-outline-danger flex-shrink-0" type="submit" name="delete">
                                <i class="bi-chart-fill me-1">Delete schedule</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        }else{
                  echo "<h3 class='text-warning'> schedule does not found</h3>";
                }
              }else{
                  echo "<h3 class='text-warning'> movie does not found</h3>";
                }
            }
        ?>
    </section>
    <?php include 'footer.php';?>
</body>

</html>