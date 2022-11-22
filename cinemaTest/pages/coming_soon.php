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
    <!-- 
    <div class="filter">
        <nav class="navbar navbar-expand-lg" style="background-color: #cdcdcd">
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
            </div>
        </nav>
    </div> -->
    <div class="container-fluid">
        <table id="datatablesSimple">
            <tbody class="row gy-3 text-white">
                <?php
                    $comming_movie=  mysqli_query($connection,"SELECT * FROM movies WHERE Is_scheduled='0'");
                    $num=0;
                    if(mysqli_num_rows($comming_movie)>0){
                        while ($comming_movie_data=  mysqli_fetch_assoc($comming_movie)){
                            $num++;
                            $trailer=$comming_movie_data['Trailer'];
                            $movie_title=$comming_movie_data['Movie_title'];
                            $movie_type=$comming_movie_data['Movie_type'];
                            $movie_actors=$comming_movie_data['Actors'];
                            $movie_description=$comming_movie_data['Description'];
                                ?>
                <tr>
                    <td class="row m-4 gx-4 gx-lg-5 align-items-center shadow bg-light text-dark rounded">
                        <div class="col-md-6 m-0 p-0">
                            <video width="100%" height="250" muted controls>
                                <source src="./../video/<?php echo $trailer;?>" type="video/mp4">
                            </video>
                        </div>
                        <div class="col-md-6">
                            <h3>movie title : <?php echo $movie_title;?></h3>
                            <h3>movie type : <?php echo $movie_type;?></h3>
                            <h5>movies actors : <?php echo $movie_actors;?></h5>
                            <p><?php echo $movie_description;?></p>
                        </div>
                    </td>
                </tr>
                <?php
 }
    }
    else{
        echo "<h1 class='text-warning'> There is no comming soon movie</h1>";
    }
    ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php include 'footer.php';?>

</body>

</html>