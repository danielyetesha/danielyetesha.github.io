<?php
include './Connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gondar Cinema</title>
    <script src="../style/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <style>
    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content */
    .tabcontent {
        color: white;
        display: none;
        padding: 50px;
        text-align: center;
    }
    </style>
</head>

<body>
    <!--Logo and login signup nav-area-->

    <?php
    include 'header_check.php';
    ?>
    <div class="posture">
        <div id="carousel1" class="carousel carousel-light slide bg-dark" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php
                    $movies=  mysqli_query($connection,"SELECT * FROM movies");
                    $num=0;
                    if((mysqli_num_rows($movies)>0)&&($num<3)){
                        while ($movie_data=  mysqli_fetch_assoc($movies)){
                            $num++;
                            $movie_id=$movie_data['Movie_id'];
                            $movie_title=$movie_data['Movie_title'];
                            $movie_description=$movie_data['Description'];
                            $movie_posture=$movie_data['Movie_posture'];
                          $active='';
                          if($num==1){
                            $active="active";
                          }
                                ?>


                <div class="carousel-item <?php echo $active?>" data-bs-interval="4000">
                    <img src="../img/movie/<?php echo $movie_posture?>" class="d-block w-100" alt="..." />
                    <div class="carousel-caption text-start">
                        <h1 class="posture-title"><?php echo $movie_title?></h1>
                        <p class="posture-desc">
                            <?php echo $movie_description?>
                        </p>
                        <a href="movie_detail.php?movie_id=<?php echo $movie_id ?>" type="submit" name="detail"
                            class="posture-button">Reserve</a>
                    </div>
                </div>
                <?php
             
        }
    }
    else{
        echo "<h1 class='text-warning'> There is no movie</h1>";
    }
    ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="movie-list-container">
        <!-- <div class="filter container my-3">
            <h1 class="text-white">CATAGORY</h1>
            <button class="tablink" onclick="filter('Action', this)" id="defaultOpen">Action</button>
            <button class="tablink" onclick="filter('Comedy', this)">Comedy</button>
            <button class="tablink" onclick="filter('Family', this)">Family</button>
            <button class="tablink" onclick="filter('Romantic', this)">Romantic</button>
        </div> -->
        <div class="container-fluid">
            <table id="datatablesSimple">
                <tbody class="row gy-3 text-white">
                    <?php
                    $movies=  mysqli_query($connection,"SELECT * FROM movies");
                    $num=0;
                    if(mysqli_num_rows($movies)>0){
                        while ($movie_data=  mysqli_fetch_assoc($movies)){
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
                        <td class="card">

                            <img class="card-img-top" src="../img/movie/<?php echo $movie_posture?>" height="200px"
                                alt="image" />
                            <div class="card-body text-dark">
                                <span class="card-title text-dark"><?php echo $movie_title?></span>
                                <p class="card-text">
                                    type: <?php echo $movie_type?>
                                </p>
                                <a href="movie_detail.php?movie_id=<?php echo $movie_id ?>" type="submit" name="detail"
                                    class="btn btn-primary">Watch now</a>
                            </div>

                        </td>
                    </tr>
                    <?php       
                            }
                        }
                        else{
                            echo "<h1 class='text-warning'> There is no movie</h1>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "footer.php";?>
    <!-- <script>
    function filter(type, elmnt) {
        var i, search, tablinks;
        document.getElementById("my_search").value = type;
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        elmnt.style.backgroundColor = "blue";

    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script> -->
</body>

</html>