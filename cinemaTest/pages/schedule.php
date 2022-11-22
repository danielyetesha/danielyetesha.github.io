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
    <link rel="stylesheet" href="../style/card.css">

</head>

<body>

    <?php
    include 'header_check.php';
    ?>
    <div class="container-fluid m-10">
        <!-- <nav class="navbar navbar-expand-lg" style="background-color: #cdcdcd">
            <div class="container-fluid text-white">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Type
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Comedy</a></li>
                            <li><a class="dropdown-item" href="#">Romantic</a></li>
                            <li><a class="dropdown-item" href="#">Family</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Time</a></li>
                            <li><a class="dropdown-item" href="#">Type</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">This Week</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">This month</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>

            </div>
        </nav> -->
        <div class="container row mt-2 justify-content-around">
            <a href="schedule.php?status=unexpired" class="btn btn-success col-3 p-1 text-white ">Unexpired</a>
            <a href="schedule.php?status=expired" class="btn btn-danger col-3 p-1 text-white">Expired</a>
        </div>
        <div class="movie-list-container">
            <div class="container text-white">
                <table id="datatablesSimple">
                    <tbody class="row gy-3">
                        <?php
                    $movies=  mysqli_query($connection,"SELECT Date FROM schedule ORDER BY Date DESC");
                    $num=0;
                    if(mysqli_num_rows($movies)>0){
                        while ($schedule_data=  mysqli_fetch_assoc($movies)){
                            $date=$schedule_data['Date'];
                            $s_status='';
                                $cdate=date("Y-m-d");
                                if($cdate>$date){
                                    $s_status='expired';
                                }else{
                                    $s_status='unexpired';
                                }
                                 if((isset($_GET['status']))&&(!($s_status==$_GET['status']))){continue;}
                        $schedules= mysqli_query($connection,"SELECT * FROM schedule WHERE Date='$date'");
                        if(mysqli_num_rows($schedules)>0){
                        while ($movie_data= mysqli_fetch_assoc($schedules)){
                        $schedule_id=$movie_data['Schedule_id'];
                        $date=$movie_data['Date'];
                        $movie_id=$movie_data['Movie_id'];
                        $movie_id=$movie_data['Movie_id'];
                        $movie_id=$movie_data['Movie_id'];
                        $movie_info= mysqli_query($connection,"SELECT * FROM movies WHERE Movie_id='$movie_id'");
                        if(mysqli_num_rows($movie_info)>0){
                        $movie_info_data= mysqli_fetch_assoc($movie_info);
                        $movie_title=$movie_info_data['Movie_title'];
                        $movie_type=$movie_info_data['Movie_type'];
                        $movie_length=$movie_info_data['Movie_length'];
                        $movie_posture=$movie_info_data['Movie_posture'];
                        $actors=$movie_info_data['Actors'];
                        $description=$movie_info_data['Description'];
                        // continued
                        ?>
                        <tr class="row d-flex justify-content-center">
                            <td class="col-md-9">

                                <div class="ccard row w-100">
                                    <div class="ccard-thumbnail col-md-5">
                                        <img src="../img/movie/<?php echo $movie_posture?>" alt="">
                                    </div>
                                    <div class="ccard-body col-md-7">
                                        <h2 class="text-center w-100"><?php echo $date ?></h2>
                                        <h1 class="ccard-title"><?php echo $movie_title?></h1>
                                        <span><?php echo $movie_length?> <?php echo $movie_type?></span>
                                        <h4 class="ccard-description my-3">Actors: <?php echo $actors ?></h4>
                                        <h4 class="ccard-description">Description: <?php echo $description ?></h4>
                                        <a href="schedule_detail.php?schedule_id=<?php echo $schedule_id ?>"
                                            class="ctrailer text-center"> <i class="fas fa-play"></i> Detail</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
    }
    else{
        echo "<h1 class='text-warning'> There is no movie</h1>";
    }
    }
    }
}
    }else{
        echo "<h1 class='text-warning'> There is no movie schedule</h1>";
    }
    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>

</body>

</html>