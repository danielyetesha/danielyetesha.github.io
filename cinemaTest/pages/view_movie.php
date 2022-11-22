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
    <section class="p-2">
        <a href="manage_movies.php" class="col-3 fs-2 fw-bold mb-0 text-start"><i
                class="fa-solid fa-arrow-left"></i></a>
        <?php
    if(isset($_POST['view_movie'])){
    $movie_id=$_POST['movie_id'];
    $movie=  mysqli_query($connection,"SELECT * FROM movies Where Movie_id='$movie_id'");
    $num=0;
    if(mysqli_num_rows($movie)==1){
        $movie_data=  mysqli_fetch_assoc($movie);
        $movie_title=$movie_data['Movie_title'];
        $movie_type=$movie_data['Movie_type'];
        $movie_posture=$movie_data['Movie_posture'];
        $movie_length=$movie_data['Movie_length'];
        $movie_description=$movie_data['Description'];
        $actors=$movie_data['Actors'];
        $is_schedule=$movie_data['Is_scheduled'];
        $movie_trailer=$movie_data['Trailer'];
        $schedule=  mysqli_query($connection,"SELECT * FROM schedule Where Movie_id='$movie_id'");
    if(mysqli_num_rows($schedule)>0){
        $num++;
    }
                ?>

        <div class="container px-4 px-lg-5 my-2">
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

                    <p class="lead"><?php echo $movie_description?></p>
                    <p class="lead">Actors : <?php echo $actors?></p>
                    <div class="d-flex">
                        <?php if($num>0){ ?>
                        <form action="view_schedule.php" method="POST" style="display: inline">
                            <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                            <button class="btn btn-outline-dark flex-shrink-0 mx-1" type="submit"
                                name="view_schedule_movie">
                                <i class="bi-chart-fill me-1">view schedule</i>
                            </button>
                        </form>
                        <?php } ?>
                        <form action="add_schedule.php" method="POST" style="display: inline">
                            <input type="hidden" name="movie_id" value="<?php echo $movie_id ?>" />
                            <button class="btn btn-outline-dark flex-shrink-0 mx-1" type="submit" name="add_schedule">
                                <i class="bi-chart-fill me-1">Set schedule</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }else{
                  echo "<h3 class='text-warning'> movie does not found</h3>";
                }
              }
        ?>
    </section>
    <?php include 'footer.php';?>
</body>

</html>